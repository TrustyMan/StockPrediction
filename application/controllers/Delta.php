<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delta extends CI_Controller {
	public function index()
	{
		$this->load->view('Delta/index.php');
	}
}
