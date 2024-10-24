k<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('getuser');
		$this->load->model('getuser');
		$this->load->helper("form");
	}

	public function index()
	{
		$data["user"]=$this->getuser->getinfo();
		$this->load->view("apanel/top",$data);
		$this->load->view('apanel/user/home');
	}

	public function changepass()
	{
		$loginname = $this->session->userdata("login");
		$data["uinfo"] = $this->getuser->retpermission($loginname);
		$this->load->view("apanel/top",$data);
		$this->load->view('apanel/user/changepass');
	}

	public function changepasssave()
	{
		if($this->getuser->loginpasscheck($this->session->userdata("login"),$this->input->post("oldloginpass"))<1)
		{
			$data["error"] = "Хуучин нууц үг буруу байна.";
			$loginname = $this->session->userdata("login");
        	$data["uinfo"] = $this->getuser->retpermission($loginname);
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/user/changepass');
		}
		else {
			if(($this->input->post("loginpass")<>$this->input->post("loginpass1")) or (strlen($this->input->post("loginpass"))<=4))
			{
				$loginname = $this->session->userdata("login");
        		$data["uinfo"] = $this->getuser->retpermission($loginname);
				$data["error1"] = "Нууц үг буруу байна";
				$this->load->view("apanel/top",$data);
				$this->load->view('apanel/user/changepass');
			}
			else 
			{
				$this->getuser->newpass($this->session->userdata("login"),$this->input->post("loginpass"));
				redirect(base_url('apanel/home/logout'),'refresh');
				//echo "<script>alert('Nuuts ug soligdloo. Ta shine nuuts ugeeree dahiad nevterne uu!!!');</script>";
			}
		}
	}

	public function save()
	{
		if($this->getuser->loginnamecheck($this->input->post("loginname"))>=1)
			{
				$loginname = $this->session->userdata("login");
        		$data["uinfo"] = $this->getuser->retpermission($loginname);
				$data["loginname"] = $this->input->post("loginname");
				$data["error"] = "Давхардаж байна";
				$this->load->view("apanel/top",$data);
				$this->load->view('apanel/user/add');
			}
		else {
			if(($this->input->post("loginpass")<>$this->input->post("loginpass1")) or (strlen($this->input->post("loginpass"))<=4))
			{
				$loginname = $this->session->userdata("login");
        		$data["uinfo"] = $this->getuser->retpermission($loginname);
				$data["lastname"] = $this->input->post("lastname");
				$data["firstname"] = $this->input->post("firstname");
				$data["lastname"] = $this->input->post("lastname");
				$data["error1"] = "Нууц үг буруу байна";
				$this->load->view("apanel/top",$data);
				$this->load->view('apanel/user/add');
			}
			else {
				$usersave = array(
						'loginname' => $this->input->post("loginname"),
						'loginpass' => sha1(md5($this->input->post("loginpass"))),
						'level' => $this->input->post("level")
						);
				$this->getuser->usersave($usersave);
				redirect(base_url('apanel/user'),'refresh');
			}
		}
	}

	public function add()
	{
		$loginname = $this->session->userdata("login");
		$data["uinfo"] = $this->getuser->retpermission($loginname);
		$this->load->view("apanel/top", $data);
		$this->load->view('apanel/user/add');

		// if($this->session->userdata("login"))
		// {
		// 	if($this->getuser->loginpermission($this->session->userdata("login"))<1)
		// 	{
		// 		echo "<script>alert('Хандах эрхгүй байна');</script>";redirect(base_url('apanel/event'),'refresh');
		// 	}
		// 	else 
		// 	{
				
		// 	}	
		// }
		// else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function del($ids=0)
	{
		if($this->session->userdata("login"))
		{
			if($this->getuser->loginpermission($this->session->userdata("login"))<1)
			{
				echo "<script>alert('Хандах эрхгүй байна');</script>";redirect(base_url('apanel/event'),'refresh');
			}
			else 
			{
				$this->getuser->deluser($ids);
				redirect(base_url('apanel/user'),'refresh');
			}
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}
}