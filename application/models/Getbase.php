<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class getBase extends CI_Model {

	function getinfo($tablename, $ids=-1, $page = 1, $limit = 50, $columnname="0", $whereval="0",  $orderbycol="id", $desc="asc")
	{
		if($ids!=-1) {$this->db->where('id',$ids);}
		if($columnname!="0") {$this->db->where($columnname,$whereval);}
		$this->db->from($tablename);
		$this->db->order_by($orderbycol,$desc);
		$this->db->limit($limit, (($page-1)*$limit));
		$query = $this->db->get();
		// echo $this->db->last_query();

		return $query->result();
	}

	function getarray($tablename, $searcharray, $page = 1, $limit = 50, $like='0', $orderbycol="id", $desc="asc")
	{
		// print_r($searcharray);
		if($like=='1') { $this->db->like($searcharray); } else { $this->db->where($searcharray); }
		// if(isset($searcharray['courses_id'])) {$this->db->where($searcharray['courses_id']);}
		$this->db->from($tablename);
		$this->db->order_by($orderbycol,$desc);
		// $this->db->limit($limit, (($page-1)*$limit));
		$query = $this->db->get();
		// echo $this->db->last_query();

		return $query->result();
	}

	function getjoin($tablename, $tablename1, $key, $key1, $page = 0, $limit = 50, $columnname="0", $whereval="0", $orderbycol="id", $desc="asc", $joincolumn='')
	{
		if($joincolumn!='') { $joincolumn = ','.$joincolumn; }
		if($whereval!="0") {$this->db->where($columnname,$whereval);}
		$this->db->select('t1.*'.$joincolumn);
		$this->db->from($tablename.' t1');
		$this->db->join($tablename1.' t2', 't1.'.$key.'=t2.'.$key1, 'left');
		$this->db->order_by($orderbycol,$desc);
		// $$this->db->limit($limit, (($page-1)*$limit)+1);
		$query = $this->db->get();

		// echo $this->db->last_query();
		return $query->result();
	}

	function insert($tablename, $table)
	{
		$this->db->insert($tablename,$table);
		$insert_id = $this->db->insert_id();
		// echo $this->db->last_query();
		$error = $this->db->error();
		if($error['code']==0) {
			return array("code"=>'0',"msg"=>"", "insert_id"=>$insert_id);
		}
		else {
			return array("code"=>'1',"msg"=>$error['message']);
		}
	}

	function update($tablename,$updateval, $ids, $columnname='id')
	{	
		$this->db->where($columnname, $ids);
		$this->db->update($tablename,$updateval);
		// echo $this->db->last_query();
		$error = $this->db->error();

		if($error['code']==0) {
			return  '0';
		}
		else {
			return $error['message'];
		}
		
	}

	function update_array($tablename,$item,$filter)
	{
		$this->db->where($filter);
		$this->db->update($tablename,$item);
		// echo $this->db->last_query();
	}

	function delete($tablename, $ids, $columnname='id', $customwhere=null)
	{
		if($ids!=-1) { $this->db->where($columnname,$ids); };
		if($customwhere!=null) {$this->db->where($customwhere);}
		$this->db->delete($tablename);
		// echo $this->db->last_query();
	}

	function delete_array($tablename, $del_array)
	{
		$this->db->where($del_array);
		$this->db->delete($tablename);
		// echo $this->db->last_query();
	}

	public function get_count($tablename) {
        return $this->db->count_all($tablename);
    }
}