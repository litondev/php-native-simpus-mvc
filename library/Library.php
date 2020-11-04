<?php
class Library{
	public function cek_session_pesan(){
		if(isset($_SESSION["pesan"])){
			if($_SESSION["pesan"]["status"] == "Berhasil"){				
			?>
			<script>
				swal({
					title : "<?php echo $_SESSION['pesan']['status'];?>",
					text : "<?php echo $_SESSION['pesan']['pesan'];?>",
					icon : "success"
				});
			</script>			
			<?php
		   }else{
		   	?>
			<script>
				swal({
					title : "<?php echo $_SESSION['pesan']['status'];?>",
					text : "<?php echo $_SESSION['pesan']['pesan'];?>",
					icon : "warning"
				});
			</script>			
			<?php
		   }

		   unset($_SESSION["pesan"]);
		}
	}
}
?>