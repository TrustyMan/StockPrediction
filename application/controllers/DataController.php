<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataController extends CI_Controller {
	public function Index()
	{
		//$this->load->view('Landing/index');
	}
	public function getData(){
		$model = $this->input->post('model');
		$stock = $this->input->post('types');
		$this->load->model('DataModel');
		$result = $this->DataModel->getData($model, $stock);
		echo json_encode($result);
	}

	public function getRealTimeData(){
		$this->load->model('DataModel');
		$result = $this->DataModel->getRealTimeData();
		echo json_encode($result);
	}

	public function getChartData(){
		$this->load->model('DataModel');
		$result = $this->DataModel->getChartData();
		echo json_encode($result);
	}

	public function getRealChartData(){
		$this->load->model('DataModel');
		$result = $this->DataModel->getRealTimeData();
		echo json_encode($result);
	}
}
?>