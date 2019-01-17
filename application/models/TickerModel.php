<?php
class TickerModel extends CI_Model{
	

	public function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default',true);
	}

	public function getData(){
		$ticker_table_name = ['ticker_usa', 'ticker_europe', 'ticker_asia', 'ticker_fx', 'ticker_crypto'];
		$res = array();

		for($i = 0;$i < 5;$i ++){
			while(1){
				$sql = "SELECT * FROM ".$ticker_table_name[$i];
				$result = $this->db->query($sql);
				if($result->num_rows() == 6){
					break;
				}
			}
			$res[$i] = $result->result_array();
		}
		
		return $res;
	}

	public function GetTopStock(){
		$res = array();
		// return 1;

		while(1){
			$sql = "SELECT * FROM tbl_topStock";
			$result = $this->db->query($sql);
			if($result->num_rows() == 8){
				break;
			}	
		}
		$res = $result->result_array();
		return $res;
	}

	public function GetStock(){
		$stock_table_name = ['tbl_align', 'tbl_aal', 'tbl_ibm', 'tbl_poly', 'tbl_rrs'];
		$res = array();

		for($i = 0;$i < 5;$i ++){
			while(1){
				$sql = "SELECT * FROM ".$stock_table_name[$i];
				$result = $this->db->query($sql);
				if($result->num_rows() > 0){
					array_push($res, $result->result_array());
					break;
				}	
			}
		}

		return $res;
	}
}