<?php
class DataModel extends CI_Model{
	public function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default',true);
		
	 }
	public function index(){

	}
	public function getData($model, $stock){
		// $query = "SELECT * FROM news";
		// $result = $this->db->query($query);
		// return $result;

		$company = $model?$model:'ALGN';
		$stock_types = $stock?$stock:'ALGN,IBM,AAL,POLY.L,RRS.L';
		// return "aa";
		// $company = 'ALGN';
		//$stock_types = 'ALGN,IBM,AAL,POLY.L,RRS.L';
		//include_once('db.php');
		$chartData = [];
		// $i = 0;
		// $condition = "";
		// switch ($company) {
		// 	case 'ALGN':
		// 		$condition = "NASDAQ-ALGN";
		// 	break;
		// 	case 'IBM':
		// 		$condition = "NYSE-IBM";
		// 	break;
		// 	case 'AAL':
		// 		$condition = "LSE-AAL";
		// 	break;
		// 	case 'POLY.L':
		// 		$condition = "LSE-Poly";
		// 	break;
		// 	case 'RRS.L':
		// 		$condition = "LSE-RRS";
		// 	break;
		// }
		// Perform queries 
		//$result = mysqli_query($con,"SELECT `price`, `schange`, `percent`, `updatetime`, `sopen`, `previousclose`, `high`, `low`, `volume` FROM stocksdata where company='".$company."'");
		

		//$this->db = $this->load->database('DataAnalysis', true);
		//$query = "SELECT * FROM RealTimeData where TickerName='".$condition."'";
		$query = "SELECT * FROM stocksdata where company='".$company."'";
		$result = $this->db->query($query);
		// while ($row = $result->fetch_assoc())
		// foreach ($result->result_array() as $row)
		// {
		// 	$item = array();
		// 	$item['price'] = floatval(str_replace(",",'', $row['CurrentValue']));
		// 	$item['high'] = floatval(str_replace(",",'', $row['HighValue']));
		// 	$item['low'] = floatval(str_replace(",",'', $row['LowValue']));
		// 	$item['volume'] = floatval(str_replace(",",'', $row['Volume']));
		// $volume = str_replace(",",'', $row['Volume']);
		// if(substr($volume, -1) == "M"){
		// 	$volume = floatval(substr_replace($volume, "", -1)) * 1000000;
		// }
		// else if(substr($volume, -1) == "K"){
		// 	$volume = floatval(substr_replace($volume, "", -1)) * 1000;
		// }
		// 	//$item['date'] =  date("Y-m-d\TH:i:s.000\Z", strtotime($row['updatetime']));
		//     array_push($chartData, $item);
		// }


		foreach ($result->result_array() as $row)
		{
			$item = array();
			$item['price'] = floatval(str_replace(",",'', $row['price']));
			$item['open'] = floatval(str_replace(",",'', $row['sopen']));
			$item['close'] = floatval(str_replace(",",'', $row['price']));
			$item['high'] = floatval(str_replace(",",'', $row['high']));
			$item['low'] = floatval(str_replace(",",'', $row['low']));
			$item['volume'] = floatval(str_replace(",",'', $row['volume']));
			$item['date'] =  date("Y-m-d\TH:i:s.000\Z", strtotime($row['updatetime']));
		    array_push($chartData, $item);
		}
		//var_dump($chartData);

		//$this->db = $this->load->database('default',true);

		$stock_type = array();
		$current_stock_data = array();
		$stock_type_arr = explode(",", $stock_types);
		for($i=0; $i<count($stock_type_arr); $i++) {
			$model = $stock_type_arr[$i];
			$sql = "SELECT * FROM stocksdata WHERE company='".$model."' order by id desc";
			if ($result = $this->db->query($sql)) {
				if ($row = $result->row()) {
					array_push($stock_type, $model);
					array_push($current_stock_data, array_values((array)$row));
				}
			}
		}

		$res = array();
		$res['stock_type'] = $stock_type;
		$res['current_stock_data'] = $current_stock_data;
		$res['historyData'] = $chartData;

		return $res;
	}

	public function getTableData($model){
		//$sql = "SELECT * FROM stocksdata WHERE company='".$model."'";
		$this->db = $this->load->database('default',true);
		$sql = "SELECT * FROM (SELECT * FROM stocksdata WHERE company='".$model."'ORDER BY id DESC LIMIT 100) sub ORDER BY id ASC";
		$result = $this->db->query($sql);
		$res = array();
		foreach ($result->result_array() as $row) {
			$item = array();
			$item['price'] = floatval(str_replace(",",'', $row['price']));
			$item['open'] = floatval(str_replace(",",'', $row['sopen']));
			$item['close'] = floatval(str_replace(",",'', $row['previousclose']));
			$item['high'] = floatval(str_replace(",",'', $row['high']));
			$item['low'] = floatval(str_replace(",",'', $row['low']));
			$item['volume'] = floatval(str_replace(",",'', $row['volume']));
			// $item['date'] =  date("Y-m-d\TH:i:s.000\Z", strtotime($row['updatetime']));
			$item['date'] =  $row['updatetime'];
			$item['change'] = floatval(str_replace(",",'', $row['schange']));
			$item['percent'] = floatval(str_replace(",",'', $row['percent']));
			$item['company'] = $row['company'];
			array_push($res, $item);
		}
		return $res;
	}
}