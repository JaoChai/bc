<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Silder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

  public function index()
  {
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar');
    $this->load->view('dashboard/silder');
    $this->load->view('layout/footer');
    $this->load->view('layout/javascript');
	}

}
