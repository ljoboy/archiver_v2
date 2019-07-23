<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->is_connected)){
			redirect('auth/index');
		}
		$this->load->model('archives');
	}

	public function dashboard()
	{
		$this->index();
	}

	public function index()
	{
		$params['limit'] = RECORDS_PER_PAGE;
		$params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

		$config = $this->config->item('pagination');
		$config['base_url'] = site_url('archive/index?');
		$config['total_rows'] = $this->archives->get_all_archives_count();
		$this->pagination->initialize($config);

		$data['archives'] = $this->archives->get_all_archives($params);

		$this->load->model('users');
		$data['users'] = $this->users->get_all_users();

		$data['_view'] = $this->load->view('archives/index', $data, true);
		$this->load->view('layouts/main',$data);
	}

	public function add()
	{
		$config['upload_path']          = './archives/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 8 * 1024;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('img'))
		{
			$error = array('error' => $this->upload->display_errors());

			$data['_view'] = $this->load->view('archives/add', $error, true);
			$this->load->view('layouts/main', $data, false);
		}
		else
		{
			$img_infos = array('upload_data' => $this->upload->data());
			$archive = [
				'url' => $this->upload->data('file_name'),
				'archiver_par' => $this->session->id
			];
			$archive_id = $this->archives->add_archive($archive);
			if ($archive_id){
				$img_infos['archive_id'] = $archive_id;
				$img_infos['url'] = $this->upload->data('file_name');

				$data['_view'] = $this->load->view('archives/add-2', $img_infos, true);
				$this->load->view('layouts/main', $data, false);
			}else{
				redirect('archive/add');
			}

		}
	}

	public function step_2()
	{
		$this->form_validation->set_rules('archive_id', 'archive id', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('archive_url', 'archive url', 'required');
		$this->form_validation->set_rules('code', 'code', 'trim|required|alpha_dash|min_length[6]|max_length[50]|is_unique[archive.codeArchi]',
			['required' => "Le %s est un champ obligatoire", 'alpha_dash' => "Le %s contient des caractères non supportés", 'min_length' => "Le %s doit contenir au moins 6 caractères", 'max_length' => "Le %s doit contenir moins de 50 caractères", "Un %s similaire existe dans la base des données pourtant %s est un doit etre unique"]);
		$this->form_validation->set_rules('nom', 'nom', 'trim|required|alpha_numeric_spaces|min_length[4]|max_length[50]',
			['required' => "Le %s est un champ obligatoire", 'alpha_numeric_spaces' => "Le %s contient des caractères non supportés", 'min_length' => "Le %s doit contenir au moins 4 caractères", 'max_length' => "Le %s doit contenir moins de 50 caractères"]);
		$this->form_validation->set_rules('entreprise', 'entreprise', 'trim|required|alpha_numeric_spaces|min_length[4]|max_length[50]',
			['required' => "Le %s est un champ obligatoire", 'alpha_numeric_spaces' => "Le %s contient des caractères non supportés", 'min_length' => "Le %s doit contenir au moins 4 caractères", 'max_length' => "Le %s doit contenir moins de 50 caractères"]);

		if ($this->form_validation->run() == true) {
			$archive_id = $this->input->post('archive_id', true);
			$archive = [
				'nom' => $this->input->post('nom',true),
				'codeArchi' => $this->input->post('code',true),
				'entreprise' => $this->input->post('entreprise',true)
			];
			$updated = $this->archives->update_archive($archive_id, $archive);
			if ($updated){
				$this->session->set_flashdata('succes', '<h4>Archive ajoutée avec succès !</h4>');
			}else{
				$this->session->set_flashdata('error', '<h4>Erreur inattendu !</h4> veuillez réessayer plus tard svp...');
			}
			redirect('archive/index');
		} else {
			$img_infos['archive_id'] = $this->input->post('archive_id', true);
			$img_infos['url'] = $this->input->post('archive_url', true);

			if ($img_infos['archive_id']){
				$data['_view'] = $this->load->view('archives/add-2', $img_infos, true);
				$this->load->view('layouts/main', $data, false);
			}else{
				redirect('archive/add');
			}
		}
	}

	public function download($id)
	{
		$archive = $this->archives->get_archive($id);
		$path = FCPATH.'/archives/'.$archive->url;

		if(is_file($path))
		{
			if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }


			$this->load->helper('file');

			$mime = get_mime_by_extension($path);
			$name = $archive->url;

			header('Pragma: public');     // required
			header('Expires: 0');         // no cache
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
			header('Cache-Control: private',false);
			header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
			header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: '.filesize($path)); // provide file size
			header('Connection: close');
			readfile($path); // push it out
		}
		exit();
	}

	public function voir($id)
	{
		if ($id){
			$data['archive'] = $this->archives->get_archive($id);

			$this->load->model('users');
			$data['users'] = $this->users->get_all_users();

			$data['_view'] = $this->load->view('archives/voir', $data, true);
			$this->load->view('layouts/main',$data);
		}else{
			redirect('archive/index', 'refresh');
		}
	}


}
