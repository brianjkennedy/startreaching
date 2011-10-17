<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display extends CI_Controller {

	public function index()
	{	
		$appid = '1'; //weekly ad is setup as '1' in db
	
		require_once 'applications/weekly_ad/src/facebook.php';
		
		// Create our Application instance.
		$facebook = new Facebook(array(
		  'appId' => '130207057078827',
		  'secret' => '865697969ce11aca9f66449d5bdcf728',
		  'cookie' => true
		));
		
		$signed_request = $facebook->getSignedRequest();
		
		//$pageid = $signed_request['page']['id'];
		$pageid = '169433343107625';
		
		/*SETUP SESSION FOR APP AND PAGE ID*/
		$sesh = array (
			'app_id' => $appid,
			'page_id' => $pageid
		);
		
		$this->session->set_userdata($sesh);
		
		$this->checkPage();
		
	}
	
	function checkPage()
	{	
		$pageid = $this->session->userdata('page_id');
		$this->load->model('display_model');

		$data = $this->display_model->checkPage($pageid);
		
		if($data)
		{
			$this->getUserAppInfo($data);
		}
		else
		{
			$this->load->view('error');
		}
		
	}
	
	function getUserAppInfo($data)
	{
		$userinfo = $this->display_model->getUserInfo($data);
		
		if($userinfo)
		{
			
		}
		else
		{
			$this->load->view('error');
		}
		
	}
	
	function getAd()
	{
		$this->load->helper('file');
		
		$data = $this->session->userdata();
		
		$location = "ads/".$data->ad_location;
		$files = get_filenames($location);
		sort($files);

		$info = array(
			'location' => $location,
			'files' => $files,
			'data' => $data
		);
		
		$this->load->view('display', $info);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/display_model.php */