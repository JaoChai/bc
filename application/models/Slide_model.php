<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function getall()
  {
    $this->db->select('*');
    $this->db->from('slide');
    $query = $this->db->get();
    if($query->num_rows() > 0){
      return $query->result();
    }
  }

  public function insert($img_data = array(), $original_name, $url)
  {
    $data = array(
      'img_name' => $original_name,
      'img_newname' => $img_data['file_name'],
      'img_path' => $img_data['full_path'],
      'url' => $url
    );
    $this->db->insert('slide', $data);
  }

  public function delete($id, $path)
  {
    $this->db->where("img_id", $id)->delete("slide");
    if($this->db->affected_rows() >= 1){
      if(unlink($path))
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
