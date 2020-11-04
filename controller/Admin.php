<?php 
include "model/mysql.php";
include "model/DiagramUploadHari.php";
include "model/DiagramUploadTahun.php";

class Admin{
	use Config;

	public $view;
	public $mysql;
	public $library;

	function __construct(){
		$this->view = new View();
		$this->mysql = new Mysql();
		$this->library = new library();		
	}

	public function index(){
		include "view/masuk.php";		
	}

	public function home(){		
		$data["jumlah_buku"] = count($this->mysql->select("select *from buku"));
		$data["jumlah_anggota"] = count($this->mysql->select("select *from anggota"));
		$data["jumlah_data_pengembalian"] = count($this->mysql->select("select *from pengembalian"));
		$data["jumlah_data_peminjaman"] = count($this->mysql->select("select *from peminjaman"));

		
		$di_hari = new DiagramUploadHari();
		$data["diagram_hari"] =  $di_hari->hari();

		$di_tahun = new DiagramUploadTahun();
		$data["diagram_tahun"] = $di_tahun->tahun();

		$this->view->lihat("home",$data);
	}

	public function redirect($halaman){
		header("location:".$this->base_url."?hl=".$halaman);
	}

	public function proses_masuk(){	
		$hasil = $this->mysql->select("select *from admin where username='".$_POST['nama']."' and password='".md5($_POST["password"])."'");
		
		if(count($hasil) > 0){
			$_SESSION["admin_simpus"] = "online";
			$_SESSION["admin_nama"] = "admin";
			$_SESSION["admin_id"] = 1;

			$this->mysql->insert("insert into log_admin set kegiatan='masuk',waktu='".date("Y-m-d")."'");

			$this->redirect("home");
		}else{
			$pesan = array(
				"status" => "Gagal",
				"pesan" => "Nama Atau Sandi Salah"
			);

			$_SESSION["pesan"] = $pesan;

			$this->redirect("masuk");
		}
		
	}

	public function keluar(){
		session_destroy();
		$this->redirect("masuk");

		$this->mysql->insert("insert into log_admin set kegiatan='keluar',waktu='".date("Y-m-d")."'");
	}

	public function data_peminjaman(){
		$data["data_peminjaman"] = $this->mysql->select("select *from peminjaman");

		$this->view->lihat("data_peminjaman",$data);
	}
	public function data_pengembalian(){
		$data["data_pengembalian"] = $this->mysql->select("select *From pengembalian");
		$this->view->lihat("data_pengembalian",$data);
	}

	public function pengembalian(){
		$data["peminjaman"] = $this->mysql->select("select *from peminjaman");
		$data["data_nis"] = $this->mysql->select("select *from anggota");
		$this->view->lihat("pengembalian",$data);
	}

	public function peminjaman(){	
		$data["data_anggota"] = $this->mysql->select("select *from anggota");
		$data["data_buku"] = $this->mysql->select("select *from buku");

		$this->view->lihat("peminjaman",$data);
	}

	public function log_admin(){
		$data["data_log_admin"] = $this->mysql->select("select *from log_admin");
		$this->view->lihat("log_admin",$data);
	}	

	public function buku(){
		$data["data_buku"] = $this->mysql->select("select *from buku");
		$this->view->lihat("buku",$data);
	}

	public function anggota(){
		$data["data_anggota"] = $this->mysql->select("select *from anggota");
		$this->view->lihat("anggota",$data);
	}

	public function tambah_buku(){
		$hasil = $this->mysql->insert("insert into buku set judul='".$_POST['judul']."',pengarang='".$_POST['pengarang']."',des='".$_POST['des']."',kode_buku='".$_POST['kode_buku']."'");
		if($hasil == 1){
			$this->redirect("buku");
		}
	}

	public function hapus_buku(){
		$hasil = $this->mysql->delete("delete from buku where id='".$_GET['id']."'");
		if($hasil == 1){
			$this->redirect("buku");
		}
	}

	public function edit_buku(){
		$hasil = $this->mysql->update("update buku set judul='".$_POST['judul']."',pengarang='".$_POST['pengarang']."',des='".$_POST['des']."',kode_buku='".$_POST['kode_buku']."' where id='".$_POST['id']."'");
		if($hasil == 1){
			$this->redirect("buku");
		}
	}

	public function tambah_anggota(){
		$hasil =  $this->mysql->insert("insert into anggota set nis='".$_POST['nis']."',nama='".$_POST['nama']."',jenis='".$_POST['jenis']."',kelas='".$_POST['kelas']."'");
		if($hasil == 1){
			$this->redirect("anggota");
		}
	}

	public function hapus_anggota(){
		$hasil = $this->mysql->delete("delete from anggota where id='".$_GET['id']."'");
		if($hasil == 1){
			$this->redirect("anggota");
		}
	}

	public function edit_anggota(){
		$hasil = $this->mysql->update("update anggota set nama='".$_POST['nama']."',nis='".$_POST['nis']."',kelas='".$_POST['kelas']."' where id='".$_POST['id']."'");
		if($hasil == 1){
			$this->redirect("anggota");
		}
	}

	public function pinjam_buku(){		
		$hasil = $this->mysql->insert("insert into peminjaman set no_tra='".$_GET['no_tra']."',tgl_pinjam='".$_GET['tgl_pinjam']."',tgl_kembali='".$_GET['tgl_kembali']."',nis='".$_GET['nis']."',nama='".$_GET['nama']."',kode_buku='".$_GET['kode_buku']."'");
		if($hasil == 1){
			$this->redirect("data_peminjaman");
		}
	}

	public function kembali_buku(){
		$hasil = $this->mysql->insert("insert into pengembalian set no_tra='".$_GET['no_tra']."',tgl_pinjam='".$_GET['tgl_pinjam']."',tgl_kembali='".$_GET['tgl_kembali']."',nis='".$_GET['nis']."',nama='".$_GET['nama']."',kode_buku='".$_GET['kode_buku']."',denda='".$_GET['denda']."'");
		if($hasil == 1){
			$this->mysql->delete("delete from peminjaman where no_tra='".$_GET['no_tra']."'");
			$this->redirect("data_pengembalian");
		}
	}
}
?>