<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignController extends CI_Controller {
	public function Index()
	{
		//$this->load->view('Landing/index');
	}
	public function register(){
		$arr = array(
			"username" => $this->input->post('username'),
			"password" => $this->input->post('password'),
			"email" => $this->input->post('email')
        );
		$this->load->model('SignModel');
		$result = $this->SignModel->register($arr);
		echo $result;
		//echo $this->input->post('username');
	}

	public function checkuser(){
		$arr = array(
			"username" => $this->input->post('username'),
			"password" => $this->input->post('password'),
        );
        $this->load->model('SignModel');
        $result = $this->SignModel->checkuser($arr);
        if($result == 1){
        	$_SESSION['username'] = $arr['username'];
        }
        echo $result;
	}
}
?>