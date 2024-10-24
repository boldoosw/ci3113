<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Serviceprice extends REST_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->database();
       $this->load->model('getbase');
    }

	public function index_get($id = -1)
	{
        $data = $this->getbase->getinfo('serviceprice', $id);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function list_get($id = -1)
	{
        $data = $this->getbase->getarray('serviceprice', array('serviceid'=>$id));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_post()
    {
        $inpt = $this->post();
        try 
        {
            $retmsg = $this->getbase->insert('serviceprice', $inpt);
            if($retmsg['code']=='0') {
                $text = "Амжилттай хадгаллаа.";
                $status = 1;
                $data = array("msg"=>$text, "status"=>$status, "insert_id"=>$retmsg['insert_id']);
            } else {
                $text = $retmsg['msg'];
                $status = 0;
                $data = array("msg"=>$text, "status"=>$status);
            }
        }
        catch (Exception $e)  
        {
            $text = "Алдаа гарлаа";
            $status = 0;
            $data = array("msg"=>$text, "status"=>$status);
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_put($id)
    {
        $inpt = $this->put();
        try 
        {
            $retmsg = $this->getbase->update('serviceprice', $inpt, $id);
            if($retmsg=='0') {
                $text = "Амжилттай заслаа.";
                $status = 1;
                $data = array("msg"=>$text, "status"=>$status);
            } else {
                $text = $retmsg;
                $status = 0;
                $data = array("msg"=>$text, "status"=>$status);
            }
        }
        catch (Exception $e)  
        {
            $text = "Алдаа гарлаа";
            $status = 0;
            $data = array("msg"=>$text, "status"=>$status);
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function index_delete($id)
    {
        try 
        {
            $this->getbase->delete('serviceprice', $id);
            $text = "Амжилттай устгалаа.";
            $status = 1;
            $data = array("msg"=>$text, "status"=>$status);
        }
        catch (Exception $e)  
        {
            $text = "Алдаа гарлаа";
            $status = 0;
            $data = array("msg"=>$text, "status"=>$status);
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }
    	
}