<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
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
			$data["productcount"] = $this->getbase->get_count('product');
			$data["productid"] = $id;
			$data["product"]=$this->getbase->getinfo('product');
			$loginname = $this->session->userdata("login");
			// $data["uinfo"] = $this->getuser->retpermission($loginname);
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/product/home');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function save()
	{
		$ids = $this->input->post("productid");
		$serviceid = $this->input->post("productid");
		$loginname = $this->session->userdata("login");

		$config['upload_path'] = 'images/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '8000';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';

		$this->load->library('upload', $config);

		$image1='productpic';

		if(!$this->upload->do_upload($image1))
		{
			$edit = 0;
			echo $this->upload->display_errors();
			$filenamestring = $this->input->post("productpicurl");
	        $filenamesmallstring = $this->input->post("productsmallpicurl");
		}
		else 
		{
			$edit = 1;

			if(!is_dir('images/product/')) {
				mkdir('images/product/');
			}
	
			if(!is_dir('images/product/w-576/')) {
				mkdir('images/product/w-576/');
			}
	
			if(!is_dir('images/product/w-768/')) {
				mkdir('images/product/w-768/');
			}

			if(!is_dir('images/product/w-992/')) {
				mkdir('images/product/w-992/');
			}
	
			if(!is_dir('images/product/w-1200/')) {
				mkdir('images/product/w-1200/');
			}
	
			$folderPath = "images/product/";
	
			$image_data = $this->upload->data();

			// 576
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => 'images/product/w-576/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/product/w-768/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/product/w-992/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/product/w-1200/'.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 1200,
				'height'            => 1200
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			$config = array(
			'source_image'      => $image_data['full_path'], //path to the uploaded image
			'new_image'         => 'images/product/small/'.$image_data["file_name"], //path to
			'maintain_ratio'    => true,
			'width'             => 400,
			'height'            => 400
			);

			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			
			$filenamestring = 'images/product/'.$image_data["file_name"];
        	$filenamesmallstring = 'images/product/w-576/'.$image_data["file_name"];

			$record = array('picurl'=>$filenamestring, 'small_picurl'=>$filenamesmallstring, 'foldername'=>'product');
			$this->getbase->insert('allpic', $record);
		}

		$productsave = array(
				'title' => $this->input->post("title"),
				'bgcolor' => $this->input->post("bgcolor"),
				'description' => $this->input->post("description"),
				'info' => $this->input->post("info"),
				'picurl' => $filenamestring,
				'small_picurl' => $filenamesmallstring,
				'created_user' => $loginname,
			);
		if($ids=="")
		{
			$inserted = $this->getbase->insert('product', $productsave);
			$insertid = $inserted['insert_id']; 

			$insert = array(
				'created_user' => $loginname,
			);

			$this->getbase->update('product', $insert, $insertid);
		}
		else 
		{
			$this->getbase->update('product', $productsave, $ids);

			$update = array(
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_user' => $loginname,
			);

			$this->getbase->update('product', $update, $ids);
		}
		redirect(base_url('apanel/product/'.$productid),'refresh');
	}

	public function add($id=0)
	{
		if($this->session->userdata("login"))
		{
			$data["productid"] = $id;
			$data["category"]=$this->getbase->getinfo('category');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/product/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function edit($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$data["product"]=$this->getbase->getinfo('product', $ids);
			$data["category"]=$this->getbase->getinfo('category');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/product/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function del($ids=0, $productid=0)
	{
		if($this->session->userdata("login"))
		{
			$this->getbase->delete('product', $ids);
			redirect(base_url('apanel/product/'.$productid),'refresh');
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