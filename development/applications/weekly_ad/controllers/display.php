<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display extends CI_Controller {

	public function index()
	{
	
		require_once '../src/facebook.php';
		
		// Create our Application instance.
		$facebook = new Facebook(array(
		  'appId' => '130207057078827',
		  'secret' => '865697969ce11aca9f66449d5bdcf728',
		  'cookie' => true
		));
		
		$signed_request = $facebook->getSignedRequest();
		
		$pageid = $signed_request['page']['id'];
		
		$this->load->model('display_model');
		$data = $this->display_model->checkPage($pageid);
		
		if($data)
		{
			//$this->load->view('display', $data);
			$this->getAd($data);
		}
		else
		{
			$this->load->view('error');
		}
		
	}
	
	function getAd($data)
	{
		$this->load->helper('file');
		
		$location = "ads/".$data->location;
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