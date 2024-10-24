<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('getbase');

		$this->load->helper("form");
	}

	public function index()
	{
		if($this->session->userdata("login"))
		{
			$data["contact"]=$this->getbase->getinfo('contact',-1, 1, 100, "0", "0", "created_at", "desc");
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/contact/home');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function del($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$this->getbase->delete('contact', $ids);
			redirect(base_url('apanel/contact'),'refresh');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}
}