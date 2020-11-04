<div id="content" class="col-lg-10 col-sm-10">          
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php?hl=anggota"><i class="glyphicon glyphicon-user"></i> Anggota</a>
            </li>       
        </ul>
     </div>

   
<div class="row">

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Anggota</h2>       
            </div>

        <div class="box-content">
                <button class="btn btn-primary" onclick="tambah()"><i class="fa fa-plus"></i> Tambah</button>                
                <hr>
                <table class="table table-striped table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>Id</th>           
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Kelas</th>
                        <th>Opsi</th>
                    </tr>   
                </thead>    
                <tbody>
                    <?php 
                        foreach ($data["data_anggota"] as $key => $value) {                                                
                    ?>
                    <tr>
                        <td><?php echo $value["id"];?></td>      
                        <td><?php echo $value["nis"];?></td>
                        <td><?php echo $value["nama"];?></td>  
                        <td><?php echo $value["jenis"];?></td>
                        <td><?php echo $value["kelas"];?></td>
                        <td>
                            <a href="index.php?hl=hapus_anggota&id=<?php echo $value['id'];?>"  class="btn btn-danger">Hapus</a>
                            <button onclick="edit('<?php echo $value['id'];?>','<?php echo $value['nis'];?>','<?php echo $value['nama'];?>','<?php echo $value['kelas'];?>')" class="btn btn-success">Edit</button>
                        </td>
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
<script>
function edit(id,nis,nama,kelas){
    html = document.createElement("div");

    div = `
        <div class="col-md-12">
         <form action="index.php?hl=edit_anggota" method="post">
            <h1><center>Tambah</center></h1>
            <input type="hidden" name="id" value="${id}">
            <input type="text" name="nis" class="form-control" value="${nis}"> <br>
            <input type="text" name="nama" class="form-control" value="${nama}"> <br>
            <input type="text" name="kelas" class="form-control" value="${kelas}"> <br>
            <button class="btn btn-primary" type="submit">Update</button>
            <button class="btn btn-warning" type="reset">Ulangi</button>
         </form>
        </div>
    `;

    html.innerHTML = div;

    swal({
        content : html
    });
}

function tambah(){
    html = document.createElement("div");

    div = `
        <div class="col-md-12">
         <form action="index.php?hl=tambah_anggota" method="post">
            <h1><center>Tambah</center></h1>
            <input type="text" name="nis" class="form-control" placeholder="Nis . . ."> <br>
            <input type="text" name="nama" class="form-control" placeholder="Nama . . ."> <br>
            <input type="text" name="jenis" class="form-control" placeholder="Jenis . . ."> <br>
            <input type="text" name="kelas" class="form-control" placeholder="Kelas . . ."> <br>

            <button class="btn btn-primary" type="submit">Tambah</button>
            <button class="btn btn-warning" type="reset">Ulangi</button>
         </form>
        </div>
    `;

    html.innerHTML = div;

    swal({
        content : html
    });
}
</script>