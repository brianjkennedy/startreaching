<?php /*if ( ! defined('BASEPATH')) exit('No direct script access allowed');*/

class Dashboard extends CI_Controller {

	function index() 
	{
		$data['main_content'] = 'dashboard';
		$this->load->view('includes/s_template', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */