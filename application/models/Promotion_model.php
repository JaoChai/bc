<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getall()
	{
		$this->db->select('*');
		$this->db->from('category');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getcate($id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('cate_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
	}

	public function insert_cate($data = array())
	{
		$this->db->insert('category', $data);
	}

	public function update_cate($id, $data = array())
	{
		$this->db->where('cate_id', $id)->update('category', $data);
	}

	public function insert($data = array())
	{
		$this->db->insert('promotion', $data);
	}

	public function getall_promotion()
	{
		$this->db->select('*');
		$this->db->from('promotion p');
		$this->db->join('category c', 'p.cate_id = c.cate_id');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getpromotion($id)
	{
		$this->db->select('*');
		$this->db->from('promotion p');
		$this->db->join('category c', 'p.cate_id = c.cate_id');
		$this->db->where('pro_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
	}

	public function update($id, $data)
	{
		$this->db->where('pro_id', $id)->update('promotion', $data);
	}

	public function updatetext($id, $data)
	{
		$this->db->where('pro_id', $id)->update('promotion', $data);
	}

	public function delete($id, $path)
	{
		$this->db->where("pro_id", $id)->delete("promotion");
		if($this->db->affected_rows() >= 1){
			if(unlink($path))
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
