<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model', 'member');
	}

  public function index()
  {
		$data['pixel'] = $this->member->getpixel();
    $this->load->view('layouthome/header', $data);
		$this->load->view('layouthome/navbar');
		$this->load->view('home/index');
	  $this->load->view('layouthome/footer');
	}

}
