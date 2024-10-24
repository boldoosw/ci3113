<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('getservices');
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
			$data["categorycount"] = $this->getbase->get_count('category');
			$data["category"]=$this->getbase->getinfo('category');
			$loginname = $this->session->userdata("login");
			// $data["uinfo"] = $this->getuser->retpermission($loginname);
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/category/home');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function save()
	{
		$ids = $this->input->post("categoryid");
		$loginname = $this->session->userdata("login");

		$config['upload_path'] = 'images/category/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '8000';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';

		$this->load->library('upload', $config);

		$image1='categorypic';

		if(!$this->upload->do_upload($image1))
		{
			$edit = 0;
			echo $this->upload->display_errors();
			$filenamestring = $this->input->post("categorypicurl");
	        $filenamesmallstring = $this->input->post("categorysmallpicurl");
		}
		else 
		{
			$edit = 1;

			if(!is_dir('images/category/')) {
				mkdir('images/category/');
			}
	
			if(!is_dir('images/category/w-576/')) {
				mkdir('images/category/w-576/');
			}
	
			if(!is_dir('images/category/w-768/')) {
				mkdir('images/category/w-768/');
			}

			if(!is_dir('images/category/w-992/')) {
				mkdir('images/category/w-992/');
			}
	
			if(!is_dir('images/category/w-1200/')) {
				mkdir('images/category/w-1200/');
			}
	
			$folderPath = "images/category/";
	
			$image_data = $this->upload->data();

			// 576
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => 'images/category/w-576/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/category/w-768/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/category/w-992/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/category/w-1200/'.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 1200,
				'height'            => 1200
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			$config = array(
			'source_image'      => $image_data['full_path'], //path to the uploaded image
			'new_image'         => 'images/category/small/'.$image_data["file_name"], //path to
			'maintain_ratio'    => true,
			'width'             => 400,
			'height'            => 400
			);

			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			
			$filenamestring = 'images/category/'.$image_data["file_name"];
        	$filenamesmallstring = 'images/category/w-576/'.$image_data["file_name"];

			$record = array('picurl'=>$filenamestring, 'small_picurl'=>$filenamesmallstring, 'foldername'=>'category');
			$this->getbase->insert('allpic', $record);
		}

		$categorysave = array(
				'title' => $this->input->post("title"),
				'category_type_id' => $this->input->post("category_type_id"),
				'description' => $this->input->post("description"),
				'info' => $this->input->post("info"),
				'picurl' => $filenamestring,
				'small_picurl' => $filenamesmallstring,
				'created_user' => $loginname,
			);
		if($ids=="")
		{
			$inserted = $this->getbase->insert('category', $categorysave);
			$insertid = $inserted['insert_id']; 

			$insert = array(
				'created_user' => $loginname,
			);

			$this->getbase->update('category', $insert, $insertid);
		}
		else 
		{
			$this->getbase->update('category', $categorysave, $ids);

			$update = array(
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_user' => $loginname,
			);

			$this->getbase->update('category', $update, $ids);
		}
		redirect(base_url('apanel/category'),'refresh');
	}

	public function add()
	{
		if($this->session->userdata("login"))
		{
			$data["categorytype"]=$this->getbase->getinfo('category_type');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/category/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function edit($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$data["category"]=$this->getbase->getinfo('category', $ids);
			$data["categorytype"]=$this->getbase->getinfo('category_type');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/category/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function del($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$this->getbase->delete('category', $ids);
			redirect(base_url('apanel/category'),'refresh');
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