<?php 
class View{
	use Config;
	public $library;

	function __construct(){
		$this->library = new Library();
	}

	public function lihat($hl,$data = ""){
		include "view/header.php";
		include "view/menu.php";
		include "view/hl/".$hl.".php";
		include "view/footer.php";
	}	
}
?>