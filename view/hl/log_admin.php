<div id="content" class="col-lg-10 col-sm-10">          
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php?hl=log_admin"><i class="glyphicon glyphicon-list-alt"></i> Log Admin</a>
            </li>       
        </ul>
     </div>

<div class="row">

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Log Admin</h2>       
            </div>
        <div class="box-content">
                <table class="table table-striped table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>Id</th>           
                        <th>Kegiatan</th>
                        <th>Waktu</th>
                    </tr>   
                </thead>    
                <tbody>
                    <?php 
                        foreach ($data["data_log_admin"] as $key => $value) {                                                
                    ?>
                    <tr>
                        <td><?php echo $value["id"];?></td>      
                        <td><?php echo $value["kegiatan"];?></td>
                        <td><?php echo $value["waktu"];?></td>  
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