<?php

class Login_model extends CI_Model {
	
	function validate_user() 
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$q = $this->db->get('users');
		
		$count = $q->num_rows();

		if($count > 0) 
		{
			$row = $q->row();
			$data = array(
				'uid' => $row->uid,
				'fname' => $row->fname,
				'lname' => $row->lname,
				'email' => $row->email,
				'department' => $row->department
			);
			
			return $data;
		}
		else
		{
			echo "yo";
		}
	}
	
	function create_user() 
	{
		$new_user_insert_data = array (
			"fname" => $this->input->post('fname'),
			"lname" => $this->input->post('lname'),
			"email" => $this->input->post('email'),
			"username" => $this->input->post('username'),
			"password" => md5($this->input->post('password'))
		);
		
		$insert = $this->db->insert('user', $new_user_insert_data);
		return $insert;
	}
}