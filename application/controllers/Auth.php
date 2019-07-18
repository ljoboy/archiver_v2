<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (isset($this->session->is_connected)){
			redirect('archive/index');
		}
		$this->load->model('users');
	}

	public function index()
	{
		$data['title'] = "page d'authentification";
		$this->load->view('layouts/login', $data, FALSE);
	}

	public function login()
	{
		$this->form_validation->set_rules('pseudo', 'pseudo', 'trim|required', ['required' => 'Le %s est obligatoire']);
		$this->form_validation->set_rules('mdp', 'mot de passe', 'required', ['required' => 'Le %s est obligatoire']);
		if ($this->form_validation->run() == TRUE) {
			$pseudo = $this->input->post('pseudo', true);
			$mdp = sha1($this->input->post('mdp'));
			$user = $this->users->connectUser($pseudo, $mdp);
			$type = ['utilisateur', 'archiviste', 'administrateur'];
			if ($user != null) {
				$array = array(
					'id' => $user->id,
					'login' => $user->pseudo,
					'level' => $user->level,
					'cree_le' => $user->creer_le,
					'nom_complet' => $user->nom_complet,
					'type' => $type[$user->level],
					'is_connected' => true
				);

				$this->session->set_userdata($array);
				redirect('archive');
			} else {
				$this->session->set_flashdata('error', "<h3>Echec d'authentification !</h3> Combinaison <strong>Pseudo / Mot de passe</strong> Incorrecte !");
				redirect();
			}
		} else {
			$this->index();
		}
	}

}
