<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function login($username, $password)
  {
    //$condition = "mem_email =" . "'" . $data['email'] . "' AND " . "mem_pass =" . "'" . $data['password'] . "' AND " . "mem_verify = 1";
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('admin_username', $username);
    $this->db->where('admin_password', $password);
    $this->db->limit(1);
    $query = $this->db->get();

    if($query->num_rows() == 1){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function get_data($username)
  {
    //$condition = "mem_email =" . "'" . $email . "'";
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('admin_username', $username);
    $this->db->limit(1);
    $query = $this->db->get();

    if($query->num_rows() == 1){
      return $query->result();
    }else{
      return FALSE;
    }
  }
}
