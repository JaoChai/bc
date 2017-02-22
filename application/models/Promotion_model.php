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
}
