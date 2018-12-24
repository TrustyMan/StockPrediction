<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SessionControl extends CI_Controller {
	public function Index()
	{
		//$this->load->view('Landing/index');
	}
	public function destroy(){
		$_SESSION['username'] = '';
		echo "success";
	}
}
?>