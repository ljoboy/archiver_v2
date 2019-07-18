<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive extends CI_Controller {

	public function index()
	{
		//TODO Implement this
		$data = [];
		$data['_view'] = $this->load->view('archives/index', $data, TRUE);
		$this->load->view('layouts/main', $data, FALSE);
	}

}
