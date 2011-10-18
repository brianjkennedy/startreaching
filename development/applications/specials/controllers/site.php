<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		$data['content'] = 'home';
		$this->load->view('includes/template', $data);
	}
}

