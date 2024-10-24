<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class socialmedia extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('getbase');
		$this->load->model('getuser');
		$this->load->helper("form");
	}
	public function index()
	{
		if($this->session->userdata("login"))
		{
			$data["socialmedia"]=$this->getbase->getinfo('socialmedia');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/socialmedia/home');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function save()
	{
		$ids = $this->input->post("socialmediaid");

		$socialmediasave = array(
				'type' => $this->input->post("type"),
				'link' => $this->input->post("link"));

		if($ids=="")
		{
			$this->getbase->insert('socialmedia', $socialmediasave);
		}
		else 
		{
			$this->getbase->update('socialmedia', $socialmediasave, $ids);
		}
		redirect(base_url('apanel/socialmedia'),'refresh');	
	}

	public function add()
	{
		if($this->session->userdata("login"))
		{
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top");
			$this->load->view('apanel/socialmedia/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function edit($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$data["socialmedia"]=$this->getbase->getinfo('socialmedia', $ids);
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/socialmedia/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}
	public function del($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$this->getbase->delete('socialmedia', $ids);
			redirect(base_url('apanel/socialmedia'),'refresh');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}
}