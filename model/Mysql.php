<?php
class Mysql{
	use Config;
	private $koneksi = "";

	function __construct(){
		try{
			if(!mysqli_connect($this->host,$this->user,$this->pass,$this->db)){				
				throw new Exception("Ada Kesalahan");			
			}else{
				$this->koneksi = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
			}
		}catch(Exception $e){
			die("<hr><center>Ada Kesalahan Pada Koneksi Priksa Config</center>");
		}
	}

	function query($query_user = ""){
		if($query_user == ""){
			return false;
		}

		return mysqli_query($this->koneksi,$query_user);
	}

	function select($query_user = ""){
		if($query_user == ""){
			return false;
		}

		$filed  = array();

		$query = $this->query($query_user);
		
		if(mysqli_num_rows($query) > 0){
			foreach(mysqli_fetch_array($query) as $key => $value){			
				if(preg_match("/^[a-z_]{0,}([a-z_]{0,}){0,}[a-z_]$/", $key)){
					array_push($filed,$key);
				}
			}

			$data = array();
			$query = $this->query($query_user);
			while($k = mysqli_fetch_array($query)){
				$data_ku = array();
				 for($i=0;$i<count($filed);$i++){
				 	$data_ku[$filed[$i]] = $k[$filed[$i]];
			 	}
			 	array_push($data,$data_ku);
			}
			return $data;
		}else{
			$data = array();
			return $data;
		}

	}

	function insert($query_user = ""){
		if($query_user == ""){
			return false;
		}

		$query = $this->query($query_user);
		if($query){
			return 1;
		}else{
			return 0;
		}
	}

	function delete($query_user = ""){
		if($query_user == ""){
			return false;
		}

		$query = $this->query($query_user);
		if($query){
			return 1;
		}else{
			return 0;
		}
	}

	function update($query_user = ""){
		if($query_user == ""){
			return false;
		}

		$query = $this->query($query_user);
		if($query){
			return 1;
		}else{
			return 0;
		}
	}	
}
?>