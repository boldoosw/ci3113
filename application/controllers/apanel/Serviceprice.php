<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Serviceprice extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('getbase');

		$this->load->helper("form");
	}

	public function index($id=0)
	{
		if($this->session->userdata("login"))
		{
			$data["servicepricecount"] = $this->getbase->get_count('serviceprice');
			$data["serviceid"] = $id;
			$data["serviceprice"]=$this->getbase->getarray('serviceprice',array('serviceid'=>$id));
			$loginname = $this->session->userdata("login");
			// $data["uinfo"] = $this->getuser->retpermission($loginname);
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/serviceprice/home');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function save()
	{
		$ids = $this->input->post("servicepriceid");
		$serviceid = $this->input->post("serviceid");
		$loginname = $this->session->userdata("login");

		$servicepricesave = array(
				'serviceid' => $serviceid,
				'title' => $this->input->post("title"),
				'description' => $this->input->post("description"),
				'package1' => $this->input->post("package1"),
				'package2' => $this->input->post("package2"),
				'package3' => $this->input->post("package3"),
				'package4' => $this->input->post("package4"),
				'package5' => $this->input->post("package5"),
				'created_user' => $loginname,
			);
		if($ids=="")
		{
			$inserted = $this->getbase->insert('serviceprice', $servicepricesave);
			$insertid = $inserted['insert_id']; 

			$insert = array(
				'created_user' => $loginname,
			);

			$this->getbase->update('serviceprice', $insert, $insertid);
		}
		else 
		{
			$this->getbase->update('serviceprice', $servicepricesave, $ids);

			$update = array(
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_user' => $loginname,
			);

			$this->getbase->update('serviceprice', $update, $ids);
		}
		redirect(base_url('apanel/serviceprice/'.$serviceid),'refresh');
	}

	public function add($id=0)
	{
		if($this->session->userdata("login"))
		{
			$data["serviceid"] = $id;
			$data["menulist"]=$this->getbase->getinfo('menu');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/serviceprice/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function edit($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$data["serviceprice"]=$this->getbase->getinfo('serviceprice', $ids);
			$data["menulist"]=$this->getbase->getinfo('menu');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/serviceprice/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function del($ids=0, $serviceid=0)
	{
		if($this->session->userdata("login"))
		{
			$this->getbase->delete('serviceprice', $ids);
			redirect(base_url('apanel/serviceprice/'.$serviceid),'refresh');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
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