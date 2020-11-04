<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Masuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <link id="bs-css" href="<?php echo $this->asset;?>css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="<?php echo $this->asset;?>css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo $this->asset;?>bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo $this->asset;?>bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo $this->asset;?>css/animate.min.css' rel='stylesheet'>
    
    <script src="<?php echo $this->asset;?>bower_components/jquery/jquery.min.js"></script>
    <link rel="shortcut icon" href="<?php echo $this->asset;?>img/favicon.ico">
    <script src="<?php echo $this->asset;?>js/alert.js"></script>
</head>

<body>
    <?php 
        $this->library->cek_session_pesan();
    ?>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Sipus</h2>
        </div>
    </div>

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" action="index.php?hl=proses_masuk" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="nama">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>    
    </div>
</div>
</div>
</body>
</html>