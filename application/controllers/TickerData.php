<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TickerData extends CI_Controller {
	public function Index()
	{
		//$this->load->view('Landing/index');
	}
	public function getData(){
		$this->load->model('TickerModel');
		$result = $this->TickerModel->getData();
		echo json_encode($result);
	}

	public function GetTopStock(){
		$this->load->model('TickerModel');
		$result = $this->TickerModel->GetTopStock();
		echo json_encode($result);
	}

	public function GetStock(){
		$this->load->model('TickerModel');
		$result = $this->TickerModel->GetStock();
		echo json_encode($result);
	}
}
?>