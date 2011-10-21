<?php

class Dashboard_model extends CI_Model {
	
	function add_employee($post)
	{
		$count = count($post)/4;
		
		for($i = 1; $i < $count+1; $i++)
		{
			$data = array(
				'fname' => $post['e_fname'.$i],
				'lname' => $post['e_lname'.$i],
				'rate' => $post['rate'.$i],
				'department' => $this->session->userdata('department')
			);
			
			$query = $this->db->insert('employees', $data);
		}
		
		if ($query)
		{
			return true;
		}
		
		else
		{
			return false;
		}
	}
	
	function build_employee_list()
	{
		//grab al the employees matching the current dept # and throw them in a list BIH
		$this->db->where('department', $this->session->userdata('department'));
		$query = $this->db->get('employees');
		
		$list = $query->result();

		return $list;
	}
}