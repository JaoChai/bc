<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

  public function getspecial()
  {
    $this->db->select('*');
    $this->db->from('promotion p');
    $this->db->join('category c', 'p.cate_id = c.cate_id');
    $this->db->where('c.cate_link', 'SPECIAL');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }
  }

  public function getlotto()
  {
    $this->db->select('*');
    $this->db->from('promotion p');
    $this->db->join('category c', 'p.cate_id = c.cate_id');
    $this->db->where('c.cate_link', 'LOTTO');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }
  }

  public function getmember()
  {
    $this->db->select('*');
    $this->db->from('promotion p');
    $this->db->join('category c', 'p.cate_id = c.cate_id');
    $this->db->where('c.cate_link', 'NEW_MEMBER');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }
  }

  public function getcurr()
  {
    $this->db->select('*');
    $this->db->from('promotion p');
    $this->db->join('category c', 'p.cate_id = c.cate_id');
    $this->db->where('c.cate_link', 'CURRENT');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }
  }
}
