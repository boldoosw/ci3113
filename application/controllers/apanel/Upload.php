<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upload extends CI_Controller {

	public function index($picurl='',$smallpicurl='')
	{
		$data['picurl'] = $picurl;
		$data['smallpicurl'] = $smallpicurl;
		$this->load->view("apanel/upload", $data);
	}
	
}