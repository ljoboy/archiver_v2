<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->is_connected)){
			redirect('auth/index');
		}
		if ($this->session->level != ADMIN_LEVEL){
			redirect('archive');
		}
		$this->load->model('users');
	}

	public function index()
	{
		$params['limit'] = RECORDS_PER_PAGE;
		$params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

		$config = $this->config->item('pagination');
		$config['base_url'] = site_url('user/index?');
		$config['total_rows'] = $this->users->get_all_users_count();
		$this->pagination->initialize($config);

		$data['users'] = $this->users->get_all_users($params);

		$data['_view'] = $this->load->view('users/index', $data, true);
		$this->load->view('layouts/main',$data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nom_complet', 'nom complet', 'trim|required|min_length[3]|max_length[150]',
		['required' => "Le %s est un champ obligatoire", 'min_length' => 'Le %s doit contenir plus de 3 caractères',
			'max_length' => 'Le %s doit contenir moins de 50 caractères']);
		$this->form_validation->set_rules('login', "nom d'utilisateur", 'trim|required|min_length[3]|max_length[50]',
			['required' => "Le %s est un champ obligatoire", 'min_length' => 'Le %s doit contenir plus de 3 caractères',
				'max_length' => 'Le %s doit contenir moins de 50 caractères']);
		$this->form_validation->set_rules('level', 'type de compte', 'trim|required|in_list[0,1,2]',
			['required' => "Le %s est un champ obligatoire", 'in_list' => 'Action interdite opérée sur %s']);
		$this->form_validation->set_rules('mdp', 'mot de passe', 'required|min_length[6]|max_length[50]',
		['required' => "Le %s est un champ obligatoire", 'min_length' => 'Le %s doit contenir plus de 6 caractères',
			'max_length' => 'Le %s doit contenir moins de 50 caractères']);
		$this->form_validation->set_rules('mdp2', 'confirmer le mot de passe', 'matches[mdp]',
			['matches' => 'Les deux mot de passes ne correspondent pas']);

//		var_dump($this->form_validation->run());
//		echo validation_errors('<span class="error">', '</span>');
//		die;

		if ($this->form_validation->run() == TRUE) {
			$user = [
				'nom_complet' => $this->input->post('nom_complet', true),
				'login' => $this->input->post('login', true),
				'level' => $this->input->post('level', true),
				'mdp' => sha1($this->input->post('mdp'))
			];
			$user_id = $this->users->add_user($user);
			if ($user_id){
				$this->session->set_flashdata('success', '<h4>Utilisateur ajouté avec succès</h4>');
			}else{
				$this->session->set_flashdata('error', '<h4>Erreur inconnu !</h4> veuillez réessayer plus tard');
			}
			redirect('user/index', 'refresh');
		} else {
			$user_info = [
				'nom_complet' => $this->input->post('nom_complet', true),
				'login' => $this->input->post('login', true),
				'level' => $this->input->post('level', true)
			];

			$data['title'] = 'ajouter un utilisateur';
			$data['_view'] = $this->load->view('users/add', $user_info, true);
			$this->load->view('layouts/main', $data, FALSE);

		}
	}

	public function remove($id)
	{
		$user  = $this->users->delete_user($id);
		if ($user){
			$this->session->set_flashdata('success', 'Utilisateur supprimer avec succès');
		}else{
			$this->session->set_flashdata('error', 'Utilisateur non-existant');
		}
		redirect('user/index');
	}
}
