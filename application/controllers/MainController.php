<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {
	public function index()
	{
		$this->load->view('Home/index');
	}
	public function reload(){
		$_SESSION['username'] = "";
		$this->load->view('Home/index');
	}
}
