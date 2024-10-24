<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Upload extends REST_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->load->model('getbase');
    }

    public function set_post($folder='')
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT, GET, POST");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

        if(!is_dir("images/".$folder.'/')) {
            mkdir("images/".$folder.'/');
        }
        if(!is_dir("images/".$folder.'/w-576')) {
            mkdir("images/".$folder.'/w-576');
        }
        if(!is_dir("images/".$folder.'/w-768')) {
            mkdir("images/".$folder.'/w-768');
        }
        if(!is_dir("images/".$folder.'/w-992')) {
            mkdir("images/".$folder.'/w-992');
        }
        if(!is_dir("images/".$folder.'/w-1200')) {
            mkdir("images/".$folder.'/w-1200');
        }
        if(!is_dir("images/".$folder.'/small')) {
            mkdir("images/".$folder.'/small');
        }

        $folderPath = "images/".$folder.'/';
        
        $ori_fname=$_FILES['file']['name'];
        $ext = pathinfo($ori_fname, PATHINFO_EXTENSION);

        //$modified_fname=rand(1000,1000000);
        //$target_path = $folderPath . basename($modified_fname).".".$ext;
        
        $response=array();

        $config['upload_path'] = 'images/'.$folder.'/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '8000';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';

		$this->load->library('upload', $config);

		$image1=$ori_fname;

		if(!$this->upload->do_upload($image1))
		{
			$response[] = array('sts'=>true, 'dbPath'=>'', 'msg'=>'Error uploaded');
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
		}
		else 
		{
			$image_data = $this->upload->data();

			// 576
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => $folderPath.'w-576/'.$image_data["file_name"], //path to
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
				'new_image'         => $folderPath.'w-768/'.$image_data["file_name"], //path to
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
				'new_image'         => $folderPath.'w-992/'.$image_data["file_name"], //path to
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
				'new_image'         => $folderPath.'w-1200/'.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 1200,
				'height'            => 1200
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

            // 1200
			$config = array(
				'source_image'      => $image_data['full_path'], //path to the uploaded image
				'new_image'         => $folderPath.$image_data["file_name"], //path to
				'maintain_ratio'    => true,
				'width'             => 1920,
				'height'            => 1920
				);
		
			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			$config = array(
			'source_image'      => $image_data['full_path'], //path to the uploaded image
			'new_image'         => $folderPath.'small/'.$image_data["file_name"], //path to
			'maintain_ratio'    => true,
			'width'             => 400,
			'height'            => 400
			);

			$this->load->library('image_lib');
			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			$filenamestring = $folderPath.$image_data["file_name"];
        	$filenamesmallstring = $folderPath.'small/'.$image_data["file_name"];

            $record = array('picurl'=>$filenamestring, 'small_picurl'=>$filenamesmallstring, 'foldername'=>$folderPath);
            $this->getbase->insert('allpic', $record);

            $response[] = array('sts'=>true, 'dbPath'=>$filenamestring, 'msg'=>'Successfully uploaded');
        }
        // if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
        // {
        //     $response[] = array('sts'=>true, 'dbPath'=>$target_path, 'msg'=>'Successfully uploaded');
        // }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    
}