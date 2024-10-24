<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class getFiles extends CI_Model {
	function getinfo()
	{
		$this->db->from('allpic');
		$this->db->order_by("foldername","desc");
		$this->db->order_by("created_at","desc");
		$query = $this->db->get();

		return $query->result();
	}

	function insertinfo($info)
	{	
		$this->db->insert("allpic",$info);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */