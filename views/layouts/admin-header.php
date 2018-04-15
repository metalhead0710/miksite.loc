<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$page?></title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/fa/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/css/sb-admin.css" rel="stylesheet">
    <script src="/template/plugins/ckeditor/ckeditor.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 <div id="wrapper">
        <!-- Навігація -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="/template/images/logo_mik.png" />
                </a>
            </div>
            <!-- Верхнє меню -->
            <ul class="nav navbar-right top-nav">
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> Верховний Адмін <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/user/logout"><i class="fa fa-fw fa-sign-out"></i> Вийти </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Бокове меню -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/admin/"><i class="fa fa-fw fa-dashboard"></i> Головна</a>
                    </li>
                    <li>
                        <a href="/admin/banners"><i class="fa fa-fw fa-photo"></i> Банери</a>
                    </li>
                    <li>
                        <a href="/admin/hits"><i class="fa fa-fw fa-shopping-cart"></i> Хіти продаж</a>
                    </li>
                    <li>
                        <a href="/admin/category"><i class="fa fa-fw fa-folder-open-o"></i> Категорії</a>
                    </li>
                    <li>
                        <a href="/admin/photocat"><i class="fa fa-fw fa-file-image-o"></i> Фото</a>
                    </li>
                    <li>
                        <a href="/admin/contacts"><i class="fa fa-fw fa-vcard-o"></i> Контакти</a>
                    </li>
					<li>
                        <a href="/admin/socials"><i class="fa fa-fw fa-link"></i> Соцмережі</a>
                    </li>
                </ul>
            </div>
            
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid main-content">
                <!-- Сторінка -->
                <div class="row">
                    <div class="col-lg-12">
						<div class="vmist">