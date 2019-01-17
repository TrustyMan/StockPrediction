<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracker extends CI_Controller {
	public function index()
	{
		$this->load->view('Tracker/index.php');
	}
}
