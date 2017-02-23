<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Promotion_model', 'promotion');
		$this->load->model('Home_model', 'home');
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
		$data['getcate'] = $this->promotion->getall();
		$data['special'] = $this->home->getspecial();
		$data['lotto'] = $this->home->getlotto();
		$data['member'] = $this->home->getmember();
		$data['current'] = $this->home->getcurr();
	  $this->load->view('home/promotion', $data);
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
