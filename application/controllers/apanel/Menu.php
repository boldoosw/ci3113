<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('getmenu');
		$this->load->model('getuser');
		$this->load->model('getbase');
		date_default_timezone_set('Asia/Ulaanbaatar');
	}

	public function index()
	{
		if($this->session->userdata("login"))
		{
			$data["menu"]=$this->getmenu->getinfo1();
			$data["menu1"]=$this->getmenu->getinfo2();
			$data["menu2"]=$this->getmenu->getinfo3();
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/menu/home');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function save()
	{
		$ids = $this->input->post("menuid");
		
		$config['upload_path'] = 'images/menu/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '8000';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';

		$this->load->library('upload', $config);

		$image1='menupic';

		if(!$this->upload->do_upload($image1))
		{
			$edit = 0;
			echo $this->upload->display_errors();
			$filenamestring = $this->input->post("menupicurl");
	        $filenamesmallstring = $this->input->post("menusmallpicurl");
		}
		else 
		{
			$edit = 1;

			if(!is_dir('images/menu/')) {
				mkdir('images/menu/');
			}
	
			if(!is_dir('images/menu/w-576/')) {
				mkdir('images/menu/w-576/');
			}
	
			if(!is_dir('images/menu/w-768/')) {
				mkdir('images/menu/w-768/');
			}

			if(!is_dir('images/menu/w-992/')) {
				mkdir('images/menu/w-992/');
			}
	
			if(!is_dir('images/menu/w-1200/')) {
				mkdir('images/menu/w-1200/');
			}
	
			$folderPath = "images/menu/";
	
			$image_data = $this->upload->data();

			// 576
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => 'images/menu/w-576/'.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 576,
				'height'            => 576
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			// 768
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => 'images/menu/w-768/'.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 768,
				'height'            => 768
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			// 992
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => 'images/menu/w-992/'.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 992,
				'height'            => 992
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			// 1200
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => 'images/menu/w-1200/'.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 1200,
				'height'            => 1200
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			$config = array(
			'source_image'      => $image_data['full_path'], //path to the uploaded image
			'new_image'         => 'images/menu/small/'.$image_data["file_name"], //path to
			'maintain_ratio'    => true,
			'width'             => 400,
			'height'            => 400
			);

			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$filenamestring = 'images/menu/'.$image_data["file_name"];
        	$filenamesmallstring = 'images/menu/w-576/'.$image_data["file_name"];

			$record = array('picurl'=>$filenamestring, 'small_picurl'=>$filenamesmallstring, 'foldername'=>'menu');
			$this->getbase->insert('allpic', $record);
		}

		$menusave = array(
				'menuname' => $this->input->post("menuname"),
				'location' => $this->input->post("location"),
				'status' => $this->input->post("status"),
				'link' => $this->input->post("link"),
				'picurl' => $filenamestring,
				'small_picurl' => $filenamesmallstring,
				'parentid' => $this->input->post("parentid"));
		if($ids=="")
		{
			$retmsg = $this->getbase->insert('menu',$menusave);
			$this->getbase->update('menu', array('sort'=>$retmsg['insert_id']), $retmsg['insert_id']);
		}
		else 
		{
			$this->getmenu->menuupdate($menusave, $ids);
		}

		redirect(base_url('apanel/menu'),'refresh');
	}

	public function add()
	{
		$this->load->helper("form");
		if($this->session->userdata("login"))
		{
			$data["menulist"]=$this->getmenu->getinfo();
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/menu/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function edit($ids=0)
	{
		$this->load->helper("form");
		if($this->session->userdata("login"))
		{
			$data["menu"]=$this->getmenu->getinfo($ids);
			$data["menulist"]=$this->getmenu->getinfo();
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/menu/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function del($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$this->getmenu->delmenu($ids);
				redirect(base_url('apanel/menu'),'refresh');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function sort($ids1,$ids2)
	{
		$this->getmenu->changesort($ids1,$ids2);
		redirect(base_url('apanel/menu'),'refresh');
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