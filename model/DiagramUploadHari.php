<?php 
class DiagramUploadHari{
	public $mysql;

	function __construct(){
		$this->mysql = new Mysql();
	}

	public function hari(){
		$data  = array();
		for($i=1;$i<5;$i++){

			$tgl = (date("d")-$i);
			if($tgl < 1){

			}else{		
				if($tgl < 10){
					$date = date("Y-m")."-0".$tgl;					
				}else{
					$date = date("Y-m")."-".$tgl;			
				}		

				array_push($data,
					array(
						"jumlah" => count($this->mysql->select("select * from pengembalian where tgl_pinjam='".$date."'")),
						"tgl" => $date
				));
			}
		}	

		return $data;
	}
}
?>