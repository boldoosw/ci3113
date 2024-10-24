<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		echo "test";
		// $this->load->view('amazon-ses-sample');
	}

	function send()
	{
		// Load PHPMailer library
	}
}
