<script>
  ob_data = new Array();
</script>

<?php 
for($i=0;$i<count($data["peminjaman"]);$i++){
  ?>
  <script>
    ob_data.push({
      tgl_pinjam : "<?php echo $data["peminjaman"][$i]["tgl_pinjam"];?>",
      tgl_kembali : "<?php echo $data["peminjaman"][$i]["tgl_kembali"];?>",
      no_tra : "<?php echo $data["peminjaman"][$i]["no_tra"];?>",
      nama : "<?php echo $data["peminjaman"][$i]["nama"];?>",
      kode_buku : "<?php echo $data["peminjaman"][$i]["kode_buku"];?>",
      nis : "<?php echo $data["peminjaman"][$i]["nis"];?>"
    });
  </script>
  <?php 
}
?>

<script>
function ubah_nis(nis){
  tgl_kembali = "";
  tgl_pinjam = "";
  nama = "";
  kode_buku = "";
  no_tra = "";

  for($i=0;$i<ob_data.length;$i++){
    if(ob_data[$i].nis == nis){
      
      tgl_pinjam = ob_data[$i]["tgl_pinjam"];
      tgl_kembali = ob_data[$i]["tgl_kembali"];
      nama = ob_data[$i]["nama"];
      kode_buku += ob_data[$i]["kode_buku"]+"-";

      no_tra = ob_data[$i]["no_tra"];
     
    }
  }

  tgl_sekarang = "<?php echo date('Y-m-d');?>";

  dendaku = cek_denda(tgl_sekarang,tgl_kembali);

  $("#nis_anggota").val(nis);
  $("#tgl_kembali").val(tgl_kembali);
  $("#tgl_pinjam").val(tgl_pinjam);
  $("#nama").val(nama);
  $("#kode_buku").val(kode_buku);
  $("#no_tra").val(no_tra);
  $("#denda").val(dendaku);
}

function pengembalian(){
  $nis = $("#nis").val();
  $tgl_kembali = $("#tgl_kembali").val();
  $tgl_pinjam = $("#tgl_pinjam").val();
  $nama = $("#nama").val();
  $kode_buku = $("#kode_buku").val();
  $no_tra = $("#no_tra").val();
  $denda = $("#denda").val();

  var data = "nis="+$nis+"&nama="+$nama+"&no_tra="+$no_tra+"&tgl_kembali="+$tgl_kembali+"&tgl_pinjam="+$tgl_pinjam+"&denda="+$denda+"&kode_buku="+$kode_buku;
  window.location = "index.php?hl=kembali_buku&"+data;
}

function cek_denda(tgl_sekarang,tgl_kembali){
  $pecah_tgl_sekarang = tgl_sekarang.split("-"); 
  $pecah_tgl_kembali = tgl_kembali.split("-");

  $tahun_kembali = $pecah_tgl_kembali[0];
  $bulan_kembali = $pecah_tgl_kembali[1];

  $tahun_sekarang = $pecah_tgl_sekarang[0];
  $bulan_sekarang = $pecah_tgl_sekarang[1];

  if($tahun_kembali < $tahun_sekarang){
    return (10000*12);
  }else{
    if($bulan_kembali < $bulan_sekarang){
      return (($bulan_sekarang-$bulan_kembali)*10000)
    }else{
      return 0;
    }
  }
 }  
</script>

<div id="content" class="col-lg-10 col-sm-10">          
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php?hl=pengembalian"><i class="glyphicon glyphicon-log-out"></i> Pengembalian</a>
            </li>       
        </ul>
     </div>

    <div class="row">
        <div class="col-md-3">
                  <h1>Nis</h1>

                    <table class="table tabl-hover">
                      <tr>
                        <td>
                          <select id="nis" onchange="ubah_nis(this.value)" class="form-control">
                            <option>Pilih</option>
                            <?php 
                              for($i=0;$i<count($data["data_nis"]);$i++){
                                echo "<option value='".$data["data_nis"][$i]["nis"]."'>".$data["data_nis"][$i]["nis"]."</option>";
                              }
                            ?>                            
                          </select>                        
                        </td>
                      </tr>
                    </table>                    
                </div>

                <div class="col-md-4">
                    <h1>Tgl</h1>

                    <table class="table table-hover">
                      <tr>
                        <td>Tgl Pinjam</td>
                        <td><input type="text" class="form-control" id="tgl_pinjam" disabled></td>
                      </tr>
                      <tr>
                        <td>Tgl Kembali</td>
                        <td><input type="text" class="form-control" id="tgl_kembali" disabled></td>
                      </tr>                      
                    </table>
                </div>

                <div class="col-md-4">
                  <h1>Data</h1>

                  <table class="table table-hover">
                    <tr>
                      <td>Nis</td>
                      <td><input type="text" class='form-control' id="nis_anggota" disabled></td>
                    </tr>
                    <tr>
                      <Td>No Tra</td>
                      <td><input type="text" class="form-control" id="no_tra" disabled></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>
                        <input type="text" class="form-control" id="nama" disabled>
                      </td>
                    </tr>
                  <tr>
                      <td>Kode Buku</td>
                      <td>
                        <input type="text" class="form-control" id="kode_buku" disabled>
                      </td>
                    </tr>
                      <tr>
                      <Td>Denda</td>
                        <td>
                          <input type="text" class="form-control" id="denda" disabled>
                        </td>
                      </tR>
                      <tr>
                        <td colspan="2">
                          <button class="btn btn-success" onclick="pengembalian()">
                            <i class="fe fe-log-in"></i> Kembali
                          </button>
                        </td>
                      </tr>
                  </table>                  
              </div>
    </div>
</div>

<script>
                          
</script>