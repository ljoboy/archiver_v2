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
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

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
				'url' => $this->upload->data('full_path')
			];
			$archive_id = $this->archives->add_archive($archive);
			if ($archive_id){
				$img_infos['archive_id'] = $archive_id;

				$data['_view'] = $this->load->view('archives/add2', $img_infos, true);
				$this->load->view('layouts/main', $data, false);
			}else{
				redirect('archive/add');
			}

		}
	}
}
