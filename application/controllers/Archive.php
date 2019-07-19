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
		//TODO Implement this
		$data = [];
		$data['_view'] = $this->load->view('archives/add', $data, TRUE);
		$this->load->view('layouts/main', $data, FALSE);
	}
}
