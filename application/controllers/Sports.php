<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sports extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function sbobet()
  {
    $this->load->view('contentsport/sbobet');
  }

  public function ibcbet()
  {
    $this->load->view('contentsport/ibcbet');
  }

  public function m8bet()
  {
    $this->load->view('contentsport/m8bet');
  }


}
