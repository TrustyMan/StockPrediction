<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewDetail extends CI_Controller {
	public function index()
	{
		$this->load->view('Home/Chart');
	}
}
