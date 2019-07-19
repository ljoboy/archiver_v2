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


}
