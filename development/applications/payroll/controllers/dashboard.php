<?php /*if ( ! defined('BASEPATH')) exit('No direct script access allowed');*/

class Dashboard extends CI_Controller {

	function index() 
	{
		$this->load->model('dashboard_model');
		$this->load->library('calendar');
		
		$employee_list = $this->dashboard_model->build_employee_list();
		
		$data['main_content'] = 'dashboard';
		$data['employee_list'] = $employee_list;
		
		$this->load->view('includes/s_template', $data);
		
	}
	
	function add_employee()
	{
		$post = $this->input->post();
	
		$q = $this->dashboard_model->add_employee($post);
		
		if($q)
		{
			echo "success!";
		}
		else
		{
			echo "fail";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */