<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class browserfile extends CI_Controller {
	function __construct()
	{
	   parent::__construct();
	   $this->load->model('getfiles','',TRUE);
	}

	public function index()
	{
		$data["infopic"] = $this->getfiles->getinfo();
		$this->load->view("apanel/browserfile",$data);
	}
	
}