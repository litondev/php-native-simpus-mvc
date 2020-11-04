<div id="content" class="col-lg-10 col-sm-10">          
     <div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php?hl=home"><i class="glyphicon glyphicon-home"></i> Home</a>
            </li>       
        </ul>
     </div>

  <div class="col-md-3 col-sm-3 col-xs-6">

    <a data-toggle="tooltip" title="6 new members." class="well top-block" >
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Total Anggota</div>
            <div><?php echo $data["jumlah_anggota"];?></div>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="4 new pro members." class="well top-block" >
            <i class="glyphicon glyphicon-book green"></i>

            <div>Total Buku</div>
            <div><?php echo $data["jumlah_buku"];?></div>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="$34 new sales." class="well top-block">
            <i class="glyphicon glyphicon-list yellow"></i>

            <div>Data Pengembalian</div>
            <div><?php echo $data["jumlah_data_pengembalian"];?></div>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="$34 new sales." class="well top-block">
            <i class="glyphicon glyphicon-list purple"></i>

            <div>Data Peminjaman</div>
            <div><?php echo $data["jumlah_data_peminjaman"];?></div>
        </a>
    </div>

    <div class="row">        

<div class="row">
    <div class="box col-md-8">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Peminjaman Diagram Pertahun</h2>                
            </div>
            <div class="box-content">
                <div id="donutchart" class="center" style="height:300px"></div>
            </div>
        </div>
    </div>

    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Peminjaman Diagram Perhari </h2>
            </div>
            <div class="box-content">
                <div id="piechart" style="height:300px"></div>
            </div>
        </div>
    </div>




<script src="<?php echo $this->asset;?>bower_components/flot/excanvas.min.js"></script>
<script src="<?php echo $this->asset;?>bower_components/flot/jquery.flot.js"></script>
<script src="<?php echo $this->asset;?>bower_components/flot/jquery.flot.pie.js"></script>
<script src="<?php echo $this->asset;?>bower_components/flot/jquery.flot.stack.js"></script>
<script src="<?php echo $this->asset;?>bower_components/flot/jquery.flot.resize.js"></script>
<script src="<?php echo $this->asset;?>js/init-chart.js"></script>

<script>

var data = [
   <?php 
        for($i=0;$i<count($data["diagram_hari"]);$i++){
    ?>
        {data : <?php echo $data["diagram_hari"][$i]['jumlah'];?>,label : '<?php echo $data["diagram_hari"][$i]['tgl'];?>'},
    <?php
        }
    ?>  
];

if ($("#piechart").length) {
    $.plot($("#piechart"), data,
        {
            series: {
                pie: {
                    show: true
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            legend: {
                show: false
            }
        });

    function pieHover(event, pos, obj) {
        if (!obj)
            return;
        percent = parseFloat(obj.series.percent).toFixed(2);
        $("#hover").html('<span style="font-weight: bold; color: ' + obj.series.color + '">' + obj.series.label + ' (' + percent + '%)</span>');
    }

    $("#piechart").bind("plothover", pieHover);
}


var dataku = [
 <?php 
    for($i=0;$i<count($data["diagram_tahun"]);$i++){
 ?>
  {data : <?php echo $data["diagram_tahun"][$i]['jumlah'];?>,label : '<?php echo $data["diagram_tahun"][$i]['tgl'];?>'},
<?php
    }
?>  
]

if ($("#donutchart").length) {
    $.plot($("#donutchart"), dataku,
        {
            series: {
                pie: {
                    innerRadius: 0.5,
                    show: true
                }
            },
            legend: {
                show: false
            }
        });
}

</script>

    </div>
</div>