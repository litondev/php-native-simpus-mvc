<?php
session_start();

include "config/config.php";
include "library/library.php";
include "controller/view.php";
include "controller/admin.php";

$hl = new Admin();

if(isset($_GET['hl'])){
	$halaman = $_GET["hl"];

	/*
		mengambil seluruh method dari class user
	*/
	$method = get_class_methods($hl);

	if(!array_search($_GET["hl"], $method)){
		/*
			cari apakah halaman yang di inginkan user ada di method user
		*/

		$hl->index();
		return false;
	}else if(!preg_match("/^[a-z_]{0,}([a-z_]{0,}){0,}[a-z_]$/",$halaman)){
		/*
			cari apakah halaman valid
		*/

		$hl->index();
		return false;
	}else if(!isset($_SESSION['admin_simpus'])){
		if($halaman == "proses_masuk"){
			$hl->proses_masuk();
			return false;
		}else{
			$hl->index();
			return false;
		}
	}

	$hl->$halaman();
}else{
	/*
	 jike tidak ada hl maka langsung arahkan ke index
	*/
	$hl->index();	
}
?>