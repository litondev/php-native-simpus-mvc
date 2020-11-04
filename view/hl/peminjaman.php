<div id="content" class="col-lg-10 col-sm-10">          
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php?hl=peminjaman"><i class="glyphicon glyphicon-log-out"></i> Peminjaman</a>
            </li>       
        </ul>
     </div>

   <div class="row">

    <div class="col-md-6">                  
                  <h1 class="bg-primary" style="padding:10px;color:white">
                    <i class="fe fe-list"></i>
                    Pinjam Buku
                  </h1>

                  <table class="table table-hover">
                    <tr>
                      <td>No Tra</td>
                      <td>                    
                        <?php 
                          $rand = rand(1,10000000);
                        ?>

                        <input type="text" class="form-control" value="<?php echo $rand;?>" disabled id="no_tra">
                      </td>                    
                    </tr>
                    <tr>
                      <td>Tgl Pinjam</td>
                      <td>

                        <input type="text" class="form-control" value="<?php echo date("Y-m-d");?>" disabled id="tgl_pinjam">
                      </td>
                    </tr>
                    <tr>
                      <td>Tgl Kembali</td>
                      <td>                             
                          <input type="date" class="form-control" id="tgl_kembali">
                      </td>
                    </tr>
                  </table>
                </div>


              <div class="col-md-5">

                <h1 class="bg-primary" style="padding:10px;color:white">
                  <i class="fe fe-user"></i>
                  Siswa
                </h1>

                <table class="table table-hover">
                  <tr>
                    <td>Nama Siswa</td>
                    <td>                              
                      <select class="form-control" onchange="siswa_berubah(this.value)">
                        <?php 

                          if(count($data["data_anggota"]) == 0){
                            echo "<option >Data Kosong</option>";
                          }else{
                            echo "<option value=''>Pilih</option>";

                            for($k=0;$k<count($data["data_anggota"]);$k++){
                              echo "<option value='".$data["data_anggota"][$k]["id"]."+".$data["data_anggota"][$k]["nama"]."+".$data["data_anggota"][$k]["kelas"]."+".$data["data_anggota"][$k]["nis"]."'>".$data["data_anggota"][$k]["id"]."</option>";                          
                            }
                          }
                        ?>
                      </select>                    

                    </td>
                  </tr>

                  <tr>
                    <td>Id Anggota</td>
                    <td>
                        <input type="text" class="form-control" value="belum di isi" id="id_anggota" disabled>
                    </td>
                  </tr>

                  <tr>
                    <td>Nama</td>                    
                    <td>
                        <input type="text" class="form-control" value="Belum Di Pilih" disabled id="nama_anggota">
                    </td>
                  </tr>

                  <tr>
                    <td>Kelas</td>
                    <td>
                        <input type="text" class="form-control" value="Belum Di Pilih" disabled id="kelas_anggota">
                    </td>
                  </tr>

                  <tr>
                    <Td>Nis</td>
                    <td>
                        <input type="text" class="form-control" value="Belum Di Pilih" disabled id="nis_anggota">
                    </td>
                  </tr>

                </table>
              </div>



                <div class="col-md-12 bg-primary">
                  <h1 style="color:white;margin-top:10px"><center><i class="fe fe-book"></i> Data Buku</center></h1>
                </div>




                <div class="col-md-12">
                 <div class="col-md-12">
                  <table class="table">
                    <tr>
                      <td>Kode Buku</td>
                      <td>Nama Buku</td>
                      <td>Opsi</td>
                    </tr> 
                    <tr>
                      <td>                  
                      <select class="form-control" onchange="buku_ubah(this.value)">
                        <?php 
                          if(count($data["data_buku"]) == 0){
                            echo "<option >Data Kosong</option>";
                          }else{
                            echo "<option value=''>Pilih</option>";
                            for($k=0;$k<count($data["data_buku"]);$k++){
                              echo "<option value='".$data["data_buku"][$k]["id"]."+".$data["data_buku"][$k]["kode_buku"]."+".$data["data_buku"][$k]["judul"]."+".$data["data_buku"][$k]["pengarang"]."+".$data["data_buku"][$k]["des"]."'>".$data["data_buku"][$k]["id"]."</option>";                          
                            }
                          }
                        ?>
                      </select>

                      </td>

                      <td>
                        Id Buku : <input type="text" value="Belum Di Pilih" class="form-control" disabled id="id_buku">
                        <br>

                        Judul Buku : <input type="text" value="Belum Di Pilih" class="form-control" disabled id="judul_buku">
                        <br>

                        Pengarang Buku : <input type="text" value="Belum Di Pilih" class="form-control" disabled id="pengarang_buku">
                        <br>

                        Kode Buku : <input type="text" value="Belum Di Pilih" class="form-control" disabled id="kode_buku">
                        <br>

                        Des Buku : <input type="text" value="Belum Di Pilih" class="form-control" disabled id="des_buku">
                      </td>                      

                      <td>
                        <button class="btn btn-primary" onclick="tambah_ke_table_detail()" id="tombol_tambah" style="display:none"><i class="fe fe-plus"></i> Tambah</button>
                      </td>
                    </tr>
                  </table>
                </div>
              
                <div class="col-md-12">
                  <table class="table table-hover" id="table_detail">
                    <tr>
                      <td>Kode Buku</td>
                      <td>Opsi</td>
                    </tr>

                    <tbody id="body_table_detail">
                    </tbody>

                    <tr>                      
                      <td colspan="2">
                        <button class="btn btn-success" id="tombol_kirim_data" onclick="pinjam_buku()" style="display:none">
                          <i class="fe fe-log-in"></i>
                          Kirm
                        </button>
                      </td>
                    </tr>
                  </table>
                </div>


   </div>
</div>
<script>

function siswa_berubah(nilai){
  if(nilai.length == 0){

  }else{
    $pecah = nilai.split("+");

    $("#id_anggota").val($pecah[0]);
    $("#nama_anggota").val($pecah[1]);
    $("#kelas_anggota").val($pecah[2]);
    $("#nis_anggota").val($pecah[3]);
  }
}

function buku_ubah(nilai){
  if(nilai.length == 0){

  }else{
    var pecah = nilai.split("+");

    $("#id_buku").val(pecah[0]);
    $("#kode_buku").val(pecah[1]);
    $("#judul_buku").val(pecah[2]);
    $("#pengarang_buku").val(pecah[3]);
    $("#des_buku").val(pecah[4]);

    $("#tombol_tambah").show();
  }
}


$data_buku = new Array();

function tambah_ke_table_detail(){                              

  $id_buku = $("#id_buku").val();
  $kode_buku = $("#kode_buku").val();

  if(document.getElementsByName("buku_"+$id_buku).length == 1){
    swal({
      title : "Sudah Ada Gan",
      icon : "warning",
    });
  }else{
    $data_buku.push($kode_buku);

    $html  = `
      <tr name="buku_${$id_buku}">
        <td>${$kode_buku}</td>
        <td>
          <button class="btn btn-danger" onclick="hapus_buku('${$id_buku}','${$kode_buku}')"><i class="fe fe-trash"></i> Hapus</button>
        </td>
      </tr>
    `;   

  $("#body_table_detail").append($html);
  $("#tombol_kirim_data").css({"display" : "block"});
}
}

function hapus_buku(id,kode_buku){
  $("[name=buku_"+id+"]").remove();

  var data_sementara = new Array();

  for($i=0;$i<$data_buku.length;$i++){
    if($data_buku[$i] == kode_buku){

    }else{
      data_sementara.push($data_buku[$i]);
    }
  }

  
  $data_buku = new Array();

  for($a=0;$a<data_sementara.length;$a++){
    $data_buku.push(data_sementara[$a]);
  }

  if($data_buku.length == 0){                                     
    $("#tombol_kirim_data").css({"display" : "none"});
  }                  
}

function pinjam_buku(){
  $no_tra = $("#no_tra").val();
  $tgl_pinjam = $("#tgl_pinjam").val();
  $tgl_kembali = $("#tgl_kembali").val();
  $nis = $("#nis_anggota").val();
  $nama = $("#nama_anggota").val();
  $kode_buku = $data_buku;


  pesan = "";

  if($tgl_kembali.length == 0){
    pesan += "Tgl Kembali Tidak Kosong\n"
  }

  if($nis == "Belum Di Pilih"){
    pesan += "Siswa Belum Di Pilih\n";
  }

  if(pesan.length != 0){
    swal({
      title : "Ada Kesalahan",
      icon : "warning",
      text : pesan
    })
  }else{
    var data = "no_tra="+$no_tra+"&tgl_pinjam="+$tgl_pinjam+"&tgl_kembali="+$tgl_kembali+"&nis="+$nis+"&nama="+$nama+"&kode_buku="+$kode_buku;

    window.location = "index.php?hl=pinjam_buku&"+data;
  }
}
</script>