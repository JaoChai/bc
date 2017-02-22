<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

  public function index()
  {
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar');
    $this->load->view('dashboard/promotion');
    $this->load->view('layout/footer');
    $this->load->view('layout/javascript');
	}

  public function createpromotion(){
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar');
    $this->load->view('dashboard/createpromotion');
    $this->load->view('layout/footer');
    $this->load->view('layout/javascript');
  }

  public function categorypromotion(){
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar');
    $this->load->view('layout/navbar');
    $this->load->view('dashboard/categorypromotion');
    $this->load->view('layout/footer');
    $this->load->view('layout/javascript');
  }

}
