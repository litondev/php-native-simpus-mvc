<div id="content" class="col-lg-10 col-sm-10">          
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php?hl=buku"><i class="glyphicon glyphicon-book"></i> Buku</a>
            </li>       
        </ul>
     </div>

   
<div class="row">

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-book"></i> Buku</h2>       
            </div>

        <div class="box-content">
                <button class="btn btn-primary" onclick="tambah()"><i class="fa fa-plus"></i> Tambah</button>                
                <hr>
                <table class="table table-striped table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>Id</th>           
                        <th>Judul</th>
                        <th>Kode Buku</th>
                        <th>Pengarang</th>
                        <th>Des</th>
                        <th>Opsi</th>
                    </tr>   
                </thead>    
                <tbody>
                    <?php 
                        foreach ($data["data_buku"] as $key => $value) {                                                
                    ?>
                    <tr>
                        <td><?php echo $value["id"];?></td>      
                        <td><?php echo $value["judul"];?></td>
                        <td><?php echo $value["kode_buku"];?></td>  
                        <td><?php echo $value["pengarang"];?></td>
                        <td><?php echo $value["des"];?></td>
                        <td>
                            <a href="index.php?hl=hapus_buku&id=<?php echo $value['id'];?>"  class="btn btn-danger">Hapus</a>
                            <button onclick="edit('<?php echo $value['id'];?>','<?php echo $value['judul'];?>','<?php echo $value['kode_buku'];?>','<?php echo $value['pengarang'];?>','<?php echo $value['des'];?>')" class="btn btn-success">Edit</button>
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
function edit(id,judul,kode_buku,pengarang,des){
    html = document.createElement("div");

    div = `
        <div class="col-md-12">
         <form action="index.php?hl=edit_buku" method="post">
            <h1><center>Tambah</center></h1>
            <input type="hidden" name="id" value="${id}">
            <input type="text" name="judul" class="form-control" value="${judul}"> <br>
            <input type="text" name="kode_buku" class="form-control" value="${kode_buku}"> <br>
            <input type="text" name="pengarang" class="form-control" value="${pengarang}"> <br>
            <textarea name="des" class="form-control">${des}</textarea> <br>
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
         <form action="index.php?hl=tambah_buku" method="post">
            <h1><center>Tambah</center></h1>
            <input type="text" name="judul" class="form-control" placeholder="Judul . . ."> <br>
            <input type="text" name="kode_buku" class="form-control" placeholder="Kode Buku . . ."> <br>
            <input type="text" name="pengarang" class="form-control" placeholder="Pengarang . . ."> <br>
            <textarea name="des" class="form-control" placeholder="Des . . ."></textarea> <br>
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