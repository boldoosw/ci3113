<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function mn()
	{
		$this->session->set_userdata("lang",'mn');
		redirect(base_url("apanel/news"),'refresh');
	}

	public function en()
	{
		$this->session->set_userdata("lang",'en');
		redirect(base_url("apanel/news"),'refresh');
	}

	public function ru()
	{
		$this->session->set_userdata("lang",'ru');
		redirect(base_url("apanel/news"),'refresh');
	}

	public function logout()
	{
		$this->session->unset_userdata('lang');
		$this->session->unset_userdata('login');	
		redirect(base_url("apanel/login"),"refresh");
	}
}