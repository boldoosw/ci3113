<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class getMenu extends CI_Model {

	function getinfo0()
	{
		$query = $this->db->query('SELECT a.*, ifnull(s.Count,0) Count FROM `ub_menu` a  LEFT OUTER JOIN (SELECT parentid, COUNT(*) AS Count FROM `ub_menu` GROUP BY parentid) s ON a.id = s.parentid WHERE a.menuvisible=1 and a.menuloc=1 ORDER BY parentid,sort');

		return $query->result();
	}

	function getleft()
	{
		$query = $this->db->query('SELECT a.*, ifnull(s.Count,0) Count FROM `ub_menu` a  LEFT OUTER JOIN (SELECT parentid, COUNT(*) AS Count FROM `ub_menu` GROUP BY parentid) s ON a.id = s.parentid WHERE a.menuvisible=1 and a.menuloc=2 ORDER BY parentid,sort');

		return $query->result();
	}


	function getinfo($ids=0, $page=0)
	{
		if($ids!=0) {$this->db->where('id',$ids);}
		if($page!=0) {$this->db->where('menuvisible','1');}
		$this->db->from('menu');
		$this->db->order_by("parentid");
		$this->db->order_by("sort");
		$query = $this->db->get();

		return $query->result();
	}

	function getinfo1()
	{
		$this->db->where('parentid','0');
		$this->db->from('menu');
		$this->db->order_by("parentid");
		$this->db->order_by("sort");
		$query = $this->db->get();

		return $query->result();
	}

	function getinfo2()
	{
		if(count($this->menuids1())>0) {$this->db->where_in("id",$this->menuids());}
		$this->db->select("*");
		$this->db->from("menu");
		$this->db->order_by("parentid");
		$this->db->order_by("sort");
		$query = $this->db->get();

		return $query->result();
	}

	function getinfo3()
	{
		if(count($this->menuids1())>0) {$this->db->where_in("id",$this->menuids1());}
		$this->db->select("*");
		$this->db->from("menu");
		$this->db->order_by("parentid");
		$this->db->order_by("sort");
		$query = $this->db->get();

		return $query->result();
	}

	function getinfo4($menuid=0)
	{
		if($menuid>0) $this->db->where('parentid',$menuid);
		$this->db->from('menu');
		$this->db->order_by("sort");
		$query = $this->db->get();

		return $query->result();
	}

	function menuid($menualias='0',$menutid='0')
	{
		$this->db->select("ifnull(ifnull(m3.id, m2.id ), m1.id ) id");
		$this->db->from('menu as m1');
		$this->db->join('menu as m2','m1.parentid=m2.id','left');
		$this->db->join('menu as m3','m2.parentid=m3.id','left');
		if($menualias<>'0') {$this->db->where('m1.menualias',urldecode($menualias));}
		if($menutid<>'0') {$this->db->where("m1.menutid",$menutid);}

		$query = $this->db->get()->row();

		return isset($query->IDs)?$query->IDs:"0";
	}

	function menuids()
	{
		$this->db->where('parentid > ','0');
		$this->db->select("id");
		$this->db->from("menu");
		$query1 = $this->db->get()->result();

		$ids = array();
		foreach ($query1 as $row) {
			array_push($ids, $row->id);
		}

		if(empty($ids)==false) {$this->db->where_nub_in('parentid',$ids);}
		$this->db->select("id");
		$query2 = $this->db->get("menu")->result();
		
		$ids1 = array();

		foreach ($query2 as $row) {
			array_push($ids1, $row->id);
		}

		return $ids1;
	}

	function menuids1()
	{
		$this->db->where('parentid > ','0');
		$this->db->select("id");
		$this->db->from("menu");
		$query1 = $this->db->get()->result();

		$ids = array();
		foreach ($query1 as $row) {
			array_push($ids, $row->id);
		}

		if(empty($ids)==false) {$this->db->where_in('parentid',$ids);}
		$this->db->select("id");
		$query2 = $this->db->get("menu")->result();
		
		$ids1 = array();

		foreach ($query2 as $row) {
			array_push($ids1, $row->id);
		}

		return $ids1;
	}

	function changesort($ids1,$ids2)
	{
		$this->db->where("id",$ids1);
		$this->db->select("sort");
		$query1 = $this->db->get("menu")->row();

		$sort1 = $query1->sort;

		$this->db->where("id",$ids2);
		$this->db->select("sort");
		$query2 = $this->db->get("menu")->row();

		$sort2 = $query2->sort;

		$this->db->where("id",$ids2);
		$this->db->update('menu',array("sort"=>$sort1));
		$this->db->where("id",$ids1);
		$this->db->update('menu',array("sort"=>$sort2));


	}

	function getsubmenu($menualias=''){
		$query = $this->db->query('SELECT *FROM ub_menu where parentid in (SELECT id FROM `ub_menu` where menualias="'.urldecode($menualias).'") order by sort');
		// echo $this->db->last_query();
		return $query->result();
	}

	function pagecount()
	{
		$this->db->where("curdate",date("Y-m-d"));
		$this->db->select("viewcount");
		$query = $this->db->get("pageview");

		if($query->num_rows()==0)
		{
			$this->db->insert("pageview",array("curdate" => date("Y-m-d"),"viewcount" => 1));
		}
		else 
		{
			$this->db->where("curdate",date("Y-m-d"));
			$this->db->set("viewcount","viewcount+1",false);
			$this->db->update("pageview");
		}
	}

	function delmenu($ids)
	{
		$this->db->where('id',$ids);
		$this->db->delete('menu');
	}

	function menusave($menuinfo)
	{
		$this->db->insert('menu',$menuinfo);
	}

	function menuupdate($menuinfo, $ids)
	{
		$this->db->where('id',$ids);
		$this->db->update('menu',$menuinfo);

		// echo $this->db->last_query();
	}

	function checkalias($str, $ids="")
	{
		if($ids!="") {$this->db->where('id !=', $ids);}
		$this->db->where('menualias',urldecode($str));
		$query = $this->db->get('menu');
		if($query->num_rows()==0)
			 {return true;}
		else {return false;}
	}
}