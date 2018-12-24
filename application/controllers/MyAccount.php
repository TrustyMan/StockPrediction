<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyAccount extends CI_Controller {
	public function Index()
	{
		//$this->load->view('Landing/index');
		if ( !isset($_SESSION['username']) || ($_SESSION['username'] == ''))
		{
			$this->load->view('errors');
		}
		else{
			$this->load->view('MyAccount/index.php');
		}
	}
	
}
?>