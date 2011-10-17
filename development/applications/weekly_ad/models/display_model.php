<?php 
/*Model signup_model.php*/

class Display_model extends CI_Model {

	function __construct()    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	function checkPage($pageid) //is this pageid in the db?
	{
		$query = $this->db->query("SELECT * FROM social WHERE social_pageid = '$pageid'");
		$count = $query->num_rows();
		if($count > 0)
		{
			$results = $query->row();
			$uid = $results->user_id;
			return $uid;
		}
	}
	
	function getUserInfo($uid) //if so, get user info
	{
		$query = $this->db->query("SELECT * FROM user WHERE user_id = '$uid'");
		$rows = $query->row();
		$user_info = array(
			'fname' => $rows->user_firstname,
			'lname' => $rows->user_lastname,
			'email' => $rows->user_email
		);
		
		$this->session->set_userdata($user_info);
		
		return $uid;
	}
	
	function canUseApp($uid) //can this user use this app?
	{
		$query = $this->db->query("SELECT * FROM social WHERE user_id = '$uid'");
		$count = $query->num_rows();
		if($count > 0)
		{
			$row = $query->row();
			$app_id = $this->session->userdata('app_id');
			if($app_id == $row->app_id)
			{
				$data = array(
					'uid' => $uid,
					'appid' => $app_id
				);
				
				return $data;
				
				//$this->getAppInfo($uid, $app_id);
			}
			else
			{
				$this->load->view('signup');
			}
		}
		
	
	}
	
	function getAppInfo($data) //get info necessary to run app
	{	
		$app_id = $data['appid'];
		$query = $this->db->query("SELECT * FROM app WHERE app_id = '$app_id'");
		$count = $query->num_rows();
		if($count > 0)
		{
			$row = $query->row();
			
			/*
$app_data = array(
				'app_id' =>$app_id,
				'app_name' => $row->app_name,
				'app_location' => $row->app_location,
				'content_id' => $row->content_id
			);
*/
			$app_data = $row->content_id;
			
//			$this->session->set_userdata($app_data);

			return $app_data;
		}
	}
	
	function getContent($data)
	{
		$cid = $data['content_id'];

		$query = $this->db->query("SELECT * FROM content WHERE content_id = '$cid'");
		$count = $query->num_rows();
		
		if($count > 0)
		{
			$row = $query->row();
			
			$content = array(
				'text' => $row->content_text,
				'images' => $row->content_images
			);
			
			return $content;
		}
	
	}
	
}

/*End Model display_model.php*/
