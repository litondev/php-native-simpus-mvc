<div id="content" class="col-lg-10 col-sm-10">          
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php?hl=data_peminjaman"><i class="glyphicon glyphicon-list"></i> Data Peminjaman</a>
            </li>       
        </ul>
     </div>

    
<div class="row">

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list"></i> Data Peminjaman</h2>       
            </div>

        <div class="box-content">
                <a class="btn btn-primary" href="index.php?hl=peminjaman"><i class="fa fa-plus"></i> Tambah</a>                
                <hr>
                <table class="table table-striped table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>Id</th>           
                        <th>No Tra</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Nis</th>
                        <th>Kode Buku</th>
                    </tr>   
                </thead>    
                <tbody>
                    <?php 
                        foreach ($data["data_peminjaman"] as $key => $value) {                                                
                    ?>
                    <tr>
                        <td><?php echo $value["id"];?></td>      
                        <td><?php echo $value["no_tra"];?></td>
                        <td><?php echo $value["tgl_pinjam"];?></td>  
                        <td><?php echo $value["tgl_kembali"];?></td>
                        <td><?php echo $value["nis"];?></td>
                        <td><?php echo $value["kode_buku"];?></td>                       
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>