<?php 
class DiagramUploadTahun{
	public $mysql;

	function __construct(){
		$this->mysql = new Mysql();
	}

	public function tahun(){
		$data  = array();
		for($i=1;$i<5;$i++){
			if($i == 1){
				$date = date("Y");
			}else{
				$date = (date("Y")+(+1-$i));
			}

			array_push($data,
				array(
					"jumlah" => count($this->mysql->select("select *from pengembalian where tgl_pinjam like '%".$date."%'")),
					"tgl" => $date
			));			
		}		
		return $data;
	}
}
?>