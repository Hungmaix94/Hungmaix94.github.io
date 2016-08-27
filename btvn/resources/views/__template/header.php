<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nghia is a member of TEchasmter">
    <meta name="author" content="Nghia">

    <title>IT Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo BASE_PATH ?>/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="icon" href="<?php echo BASE_PATH;?>/public/img/favicon.png" type="image/png" sizes="16x16">
    <!-- Theme CSS -->
    <link href="<?php echo BASE_PATH ?>/public/css/clean-blog.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="<?php echo BASE_PATH ?>/public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo BASE_PATH ?>">Hung's Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <style>
                        #MBBOldSearch {
                            display: block;
                            clear: both;
                            margin: 10px 0;
                        }
                        #MBBOldSearch #MBBSinput {
                            background: url(http://4.bp.blogspot.com/-C7mh2vX4gp4/Ue6-L3iTnXI/AAAAAAAAAhI/-K6xVaVoM1g/s1600/noxdo_blogspot_com_Search-icon.png) no-repeat scroll 8px center transparent !important;
                            padding: 7px 15px 7px 35px !important;
                            color: #444;
                            font-weight: bold;
                            text-decoration: none;
                            border: 1px solid #D3D3D3 !important;
                            -webkit-border-radius: 4px;
                            -moz-border-radius: 4px;
                            border-radius: 4px;
                            -webkit-box-shadow: 1px 1px 2px #CCC inset;
                            -moz-box-shadow: 1px 1px 2px #CCC inset;
                            box-shadow: 1px 1px 2px #CCC inset;
                            width: 52%;
                        }
                        #MBBOldSearch #MBBSsubmit {
                            color: #444;
                            font-weight: bold;
                            text-decoration: none;
                            padding: 6px 15px;
                            border: 1px solid #D3D3D3;
                            cursor: pointer;
                            -webkit-border-radius: 4px;
                            -moz-border-radius: 4px;
                            border-radius: 4px;
                            background: #fbfbfb;
                            background: -moz-linear-gradient(top, #fbfbfb 0%, #f4f4f4 100%);
                            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fbfbfb), color-stop(100%,#f4f4f4));
                            background: -webkit-linear-gradient(top, #fbfbfb 0%,#f4f4f4 100%);
                            background: -o-linear-gradient(top, #fbfbfb 0%,#f4f4f4 100%);
                            background: -ms-linear-gradient(top, #fbfbfb 0%,#f4f4f4 100%);
                            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#FBFBFB', endColorstr='#F4F4F4',GradientType=0 );
                            background: linear-gradient(top, #fbfbfb 0%,#f4f4f4 100%);
                        }
                    </style>
                    <div id="MBBOldSearch">
                        <form action="<?php echo BASE_PATH;?>/search" method="get">
                            <input name="title" id="MBBSinput" type="text" />
                            <input value="Search" id="MBBSsubmit" type="submit" />
                        </form>
                    </div>
                </li>
                <li>
                    <a href="<?php echo BASE_PATH ?>">Trang chủ</a>
                </li>
                <li>
                    <a href="<?php echo BASE_PATH ?>/about">Giới Thiệu</a>
                </li>
                <li>
                    <a href="<?php echo BASE_PATH ?>/post">Bài Viết</a>
                </li>
                <li>
                    <a href="<?php echo BASE_PATH ?>/contact">Liên Hệ</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>