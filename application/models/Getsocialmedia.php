<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class getSocialMedia extends CI_Model {

	function getinfo($ids=0)
	{
		if($ids!=0) {$this->db->where('IDs',$ids);}
		$this->db->from('socialmedia');
		$query = $this->db->get();
		return $query->result();
	}
      
	function socialmediasave($socialmedia)
	{
		$this->load->model('getlanguage');
		$this->getlanguage->language();
		$this->db->insert('socialmedia',$socialmedia);
	}

	function socialmediaupdate($socialmedia, $ids)
	{
		$this->load->model('getlanguage');
		$this->getlanguage->language();
		
		$this->db->where('IDs',$ids);
		$this->db->update('socialmedia',$socialmedia);
	}
	function socialmediadelete($socialmedia, $ids)
	{
		$this->load->model('getlanguage');
		$this->getlanguage->language();
		
		$this->db->where('IDs',$ids);
		$this->db->delete('socialmedia',$socialmedia);
	}
}