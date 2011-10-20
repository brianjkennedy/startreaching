<?php /*if ( ! defined('BASEPATH')) exit('No direct script access allowed');*/

class Login extends CI_Controller {

	function index() 
	{
		$data['main_content'] = 'login';
		$this->load->view('includes/s_template', $data);
		//$this->load->view('login');
	}
	
	
	function validate_user() 
	{
		$this->load->model('login_model');
		$q = $this->login_model->validate_user();
		
		if($q) //if user creds were validated
		{
			
			$this->session->set_userdata($q);
			
			redirect('dashboard');
			
		}//end if
		
		else
		{
			$this->index();
		
		}//end else
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */