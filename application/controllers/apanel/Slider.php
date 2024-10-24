<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends CI_Controller {
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
			$data["slider"]=$this->getbase->getinfo('slider');
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/slider/home');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function save()
	{
		$ids = $this->input->post("sliderid");
		$loginname = $this->session->userdata("login");
		$config['upload_path'] = 'images/slider/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '8000';
		$config['max_width']  = '6000';
		$config['max_height']  = '3000';

		$this->load->library('upload', $config);

		$image1='sliderpic';

		if(!$this->upload->do_upload($image1))
		{
			$edit = 0;
			echo $this->upload->display_errors();
			$filenamestring = $this->input->post("sliderpicurl");
	        $filenamesmallstring = $this->input->post("slidersmallpicurl");
		}
		else 
		{
			$edit = 1;
	
			$image_data = $this->upload->data();

			if(!is_dir('images/slider/')) {
				mkdir('images/slider/');
			}
	
			if(!is_dir('images/slider/w-576/')) {
				mkdir('images/slider/w-576/');
			}
	
			if(!is_dir('images/slider/w-768/')) {
				mkdir('images/slider/w-768/');
			}

			if(!is_dir('images/slider/w-992/')) {
				mkdir('images/slider/w-992/');
			}
	
			if(!is_dir('images/slider/w-1200/')) {
				mkdir('images/slider/w-1200/');
			}
	
			$folderPath = "images/slider/";

			// 576
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => 'images/slider/w-576/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/slider/w-768/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/slider/w-992/'.$image_data["file_name"], //path to
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
				'new_image'         => 'images/slider/w-1200/'.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 1200,
				'height'            => 1200
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			$filenamestring = 'images/slider/'.$image_data["file_name"];
        	$filenamesmallstring = 'images/slider/w-576/'.$image_data["file_name"];

			$record = array('picurl'=>$filenamestring, 'small_picurl'=>$filenamesmallstring, 'foldername'=>'slider');
			$this->getbase->insert('allpic', $record);

		}
		
		$ids = $this->input->post("sliderid");

		$sliderpic = $filenamestring;
		$slidersmallpic = $filenamesmallstring;
		
		$slider = array(
				'title' => $this->input->post("title"),
				'info' => $this->input->post("info"),
				'link' => urldecode($this->input->post("link")),
				'position' => $this->input->post("position"),
				'picurl' => $sliderpic,
				'small_picurl' => $slidersmallpic);

		if($ids=="")
		{
			$inserted = $this->getbase->insert('slider', $slider);
			$insertid = $inserted['insert_id']; 

			$insert = array(
				'created_user' => $loginname,
			);

			$this->getbase->update('slider', $insert, $insertid);
		}
		else 
		{
			$this->getbase->update('slider', $slider, $ids);

			$update = array(
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_user' => $loginname,
			);
			$this->getbase->update('slider', $update, $ids);
		}
		redirect(base_url('apanel/slider'),'refresh');
	}

	public function add()
	{
		if($this->session->userdata("login"))
		{
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top");
			$this->load->view('apanel/slider/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function edit($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$data["slider"]=$this->getbase->getinfo('slider', $ids);
			$loginname = $this->session->userdata("login");
			$this->load->view("apanel/top",$data);
			$this->load->view('apanel/slider/edit');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}

	public function del($ids=0)
	{
		if($this->session->userdata("login"))
		{
			$this->getbase->delete('slider',$ids);
			redirect(base_url('apanel/slider'),'refresh');
		}
		else { redirect(base_url('apanel/login'),'refresh');}
	}
}