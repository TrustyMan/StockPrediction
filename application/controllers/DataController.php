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

	public function getTableData(){
		$model = $this->input->post('model');
		$this->load->model('DataModel');
		$result = $this->DataModel->getTableData($model);
		echo json_encode($result);
	}
}
?>