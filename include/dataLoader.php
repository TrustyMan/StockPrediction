<?php
	$company = isset($_POST['model'])?$_POST['model']:'ALGN';
	$stock_types = isset($_POST['types'])?$_POST['types']:'ALGN,IBM,AAL,POLY.L,RRS.L';
	// $company = 'ALGN';
	// $stock_types = 'ALGN,IBM,AAL,POLY.L,RRS.L';
	include_once('db.php');
	$chartData = [];
	$i = 0;
	// Perform queries 
	$result = mysqli_query($con,"SELECT `price`, `schange`, `percent`, `updatetime`, `sopen`, `previousclose`, `high`, `low`, `volume` FROM stocksdata where company='".$company."'");

	while ($row = $result->fetch_assoc())
	{
		$item = array();
		$item['price'] = floatval(str_replace(",",'', $row['price']));
		$item['open'] = floatval(str_replace(",",'', $row['sopen']));
		$item['close'] = floatval(str_replace(",",'', $row['previousclose']));
		$item['high'] = floatval(str_replace(",",'', $row['high']));
		$item['low'] = floatval(str_replace(",",'', $row['low']));
		$item['volume'] = floatval(str_replace(",",'', $row['volume']));
		$item['date'] =  date("Y-m-d\TH:i:s.000\Z", strtotime($row['updatetime']));
	    array_push($chartData, $item);
	}
	// var_dump($chartData);

	$stock_type = array();
	$current_stock_data = array();
	$stock_type_arr = explode(",", $stock_types);
	for($i=0; $i<count($stock_type_arr); $i++) {
		$model = $stock_type_arr[$i];
		$sql = "select * from stocksdata where company='".$model."' order by id desc";
		if ($result = mysqli_query($con, $sql)) {
			if ($row = mysqli_fetch_row($result) ) {
				array_push($stock_type, $model);
				array_push($current_stock_data, $row);
			}
		}
	}

	$res = array();
	$res['stock_type'] = $stock_type;
	$res['current_stock_data'] = $current_stock_data;
	$res['historyData'] = $chartData;

	echo json_encode($res);
?>