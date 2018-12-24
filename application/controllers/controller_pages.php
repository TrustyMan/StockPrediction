<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller_pages extends CI_Controller {
	public function index()
	{
		}
	public function reload(){
		$_SESSION['username'] = "";
		$this->load->view('Home/index');
	}

	public function display_page($page_name, $page){
		echo $page_name.$page;
	}
}
