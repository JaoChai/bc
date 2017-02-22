<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

  public function getall($limit, $start)
  {
		$this->db->select('*');
		$this->db->from('members');
		$this->db->limit($limit, $start);
		$this->db->order_by('mem_id');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
  }

	public function record_count()
	{
		return $this->db->count_all('members');
	}

	public function getpixel()
	{
		$this->db->select('*');
		$this->db->from('pixel');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}
	}

	public function update_pixel($id, $data = array())
	{
		$this->db->where('pixel_id', $id)->update('pixel', $data);
	}

	public function insert($data = array())
	{
		$this->db->insert('members', $data);
	}
}
