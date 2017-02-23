<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function gclub()
  {
    $this->load->view('content/gclub');
  }
  public function holidaypalace()
  {
    $this->load->view('content/holidaypalace');
  }

  public function royal1688()
  {
    $this->load->view('content/royal1688');
  }

  public function ruby888()
  {
    $this->load->view('content/ruby888');
  }

  public function genting()
  {
    $this->load->view('content/genting');
  }

  public function reddragon()
  {
    $this->load->view('content/reddragon');
  }

  public function savan()
  {
    $this->load->view('content/savan');
  }

  public function one()
  {
    $this->load->view('content/one');
  }

  public function princess()
  {
    $this->load->view('content/princess');
  }

  public function htv()
  {
    $this->load->view('content/htv');
  }

  public function goldclub()
  {
    $this->load->view('content/goldclub');
  }

  public function gclubmobile()
  {
    $this->load->view('content/gclubmobile');
  }


}
