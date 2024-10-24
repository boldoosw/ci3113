<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
	   parent::__construct();
	   $this->load->model('getuser','',TRUE);
	}

	public function index()
	{
		$this->session->unset_userdata('lang');
		$this->session->unset_userdata('login');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('lname', 'lname', 'required');
		$this->form_validation->set_rules('lpass', 'lpass', 'trim|required|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('apanel/login');
		}
		else
		{
		  	redirect(base_url('apanel/news'), 'refresh');
		}
	}

	function check_database($password)
	{
		$username = $this->input->post('lname');
		$result = $this->getuser->loginpasscheck($username, $password);
		if($result)
		{
			 $this->session->set_userdata('login', $username);
			//  $this->session->set_userdata('permit', $this->getuser->retpermission($username));
			return true;
		}
		else 
		{
			$this->session->unset_userdata('login');
			return false;
		}
	}

	public function checklogin()
	{

		if($this->session->userdata("login"))
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
}