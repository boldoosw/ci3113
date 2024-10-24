<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('getnews');
		// $this->load->model('getmenu');
		// $this->load->model('getfiles');
		// $this->load->model('getuser');
		$this->load->model('getbase');

		$this->load->helper("form");
	}

	public function index()
	{
		if($this->session->userdata("login"))
		{
			$data["newscount"] = $this->getbase->get_count('content');
			$data["menulist"]=$this->getbase->getinfo('menu');
			$data["news"]=$this->getbase->getjoin('content', 'menu', 'menuid', 'id', 0, 50, '0', '0', 'id', 'desc', 'menuname' );
			$loginname = $this->session->userdata("login");
			// $data["uinfo"] = $this->getuser->retpermission($loginname);
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/news/home');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function save()
	{
		$ids = $this->input->post("newsid");
		$loginname = $this->session->userdata("login");

		$config['upload_path'] = 'images/news/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '8000';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';

		$this->load->library('upload', $config);

		$image1='newspic';

		if(!$this->upload->do_upload($image1))
		{
			$edit = 0;
			echo $this->upload->display_errors();
			$filenamestring = $this->input->post("newspicurl");
	        $filenamesmallstring = $this->input->post("newssmallpicurl");
		}
		else 
		{
			$edit = 1;

			if(!is_dir('images/news/')) {
				mkdir('images/news/');
			}
	
			if(!is_dir('images/news/w-576/')) {
				mkdir('images/news/w-576/');
			}
	
			if(!is_dir('images/news/w-768/')) {
				mkdir('images/news/w-768/');
			}

			if(!is_dir('images/news/w-992/')) {
				mkdir('images/news/w-992/');
			}
	
			if(!is_dir('images/news/w-1200/')) {
				mkdir('images/news/w-1200/');
			}
	
			$folderPath = "images/news/";
	
			$image_data = $this->upload->data();

			// 576
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => 'images/news/w-576/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/news/w-768/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/news/w-992/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/news/w-1200/'.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 1200,
				'height'            => 1200
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			$config = array(
			'source_image'      => $image_data['full_path'], //path to the uploaded image
			'new_image'         => 'images/news/small/'.$image_data["file_name"], //path to
			'maintain_ratio'    => true,
			'width'             => 400,
			'height'            => 400
			);

			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			
			$filenamestring = 'images/news/'.$image_data["file_name"];
        	$filenamesmallstring = 'images/news/w-576/'.$image_data["file_name"];

			$record = array('picurl'=>$filenamestring, 'small_picurl'=>$filenamesmallstring, 'foldername'=>'slider');
			$this->getbase->insert('allpic', $record);
		}

		// $filenamestring = $filenamestring;
		// $filenamesmallstring = $filenamesmallstring;

		$newssave = array(
				'title' => $this->input->post("title"),
				'description' => $this->input->post("description"),
				'highlight' => $this->input->post("highlight"),
				'info' => $this->input->post("info"),
				'menuid' => $this->input->post("menuid"),
				'picurl' => $filenamestring,
				'small_picurl' => $filenamesmallstring,
				'created_user' => $loginname,
			);
		if($ids=="")
		{
			$inserted = $this->getbase->insert('content', $newssave);
			$insertid = $inserted['insert_id']; 

			$insert = array(
				'created_user' => $loginname,
			);

			$this->getbase->update('content', $insert, $insertid);
		}
		else 
		{
			$this->getbase->update('content', $newssave, $ids);

			$update = array(
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_user' => $loginname,
			);

			$this->getbase->update('content', $update, $ids);
		}
		redirect(base_url('apanel/news'),'refresh');
	}

	public function add()
	{
		if($this->session->userdata("login"))
		{
			$data["menulist"]=$this->getbase->getinfo('menu');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/news/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function edit($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$data["news"]=$this->getbase->getinfo('content', $ids);
			$data["menulist"]=$this->getbase->getinfo('menu');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/news/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function del($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$this->getbase->delete('content', $ids);
			redirect(base_url('apanel/news'),'refresh');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	// public function search()
	// {
	// 	if($this->session->userdata("login"))
	// 	{
	// 		if($this->getuser->loginpermission($this->session->userdata("login"))<1)
	// 		{
	// 			echo "<script>alert('Хандах эрхгүй байна');</script>";redirect(base_url('apanel/event'),'refresh');
	// 		}
	// 		else 
	// 		{
	// 			$menuid = $this->input->post("searchmenuid");
	// 			$title = $this->input->post("searchsubject");

	// 			$data["menuid"] = $menuid;
	// 			$data["subject"] = $title;
	// 			$data["newscount"] = $this->getnews->newscount();
	// 			$data["menulist"]=$this->getmenu->getinfo();
	// 			$data["news"] = $this->getnews->newssearch($menuid,$title);
	// 			$loginname = $this->session->userdata("login");
	// 			$data["uinfo"] = $this->getuser->retpermission($loginname);
	// 			$this->load->view("apanel/top",$data);
	// 			$this->load->view('apanel/news/home');
	// 		}
	// 	}
	// 	else {redirect(base_url("apanel/login"), 'refresh');}
	// }

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