<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo ucwords(join(" ",explode("_",$hl)));?></title>
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

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-inner">           
            <a class="navbar-brand" href="index.php?hl=home"> 
                <span>Charisma</span>
            </a>

            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="index.php?hl=keluar">Keluar</a></li>
                </ul>
            </div>        
        </div>
    </div>