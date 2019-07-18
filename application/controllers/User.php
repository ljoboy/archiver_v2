<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->is_connected)){
			redirect('auth/index');
		}

		$this->load->model('users');
	}

	public function index()
	{
		if ($this->session->level != 2){
			redirect('archive');
		}

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
		//TODO Implement this
	}
	
	function logout()
	{
		$this->session->unset_userdata('is_connected');
		redirect();
	}
}
