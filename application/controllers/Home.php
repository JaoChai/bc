<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

  public function index()
  {
		$this->load->view('layouthome/header');
		$this->load->view('home/index');
	  $this->load->view('layouthome/footer');
	}

	public function casino(){
		$this->load->view('home/casino');
	}

	public function sports(){
		$this->load->view('home/sports');
	}

	public function slots(){
		$this->load->view('home/slots');
	}

	public function lotto(){
		$this->load->view('home/lotto');
	}

	public function promotion(){
	  $this->load->view('home/promotion');
	}

	public function deposit(){

	}

	public function livefootball(){
  	$this->load->view('home/livefootball');
	}

	public function contact(){
		$this->load->view('home/contact');
	}


}
