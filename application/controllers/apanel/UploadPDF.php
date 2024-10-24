<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uploadPDF extends CI_Controller {

	public function index()
	{
		$this->load->view("apanel/uploadPDF");
	}

	public function choosefile()
	{
		$this->load->helper("form");
		$this->load->view("apanel/choosefile");
	}
	
}