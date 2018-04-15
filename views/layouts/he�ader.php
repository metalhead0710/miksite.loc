<?php
$contacts = Contacts::getContactsList();
$dict = dict();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$page?></title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/css/site.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="/template/plugins/lightbox/simplelightbox.css" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
    <div class="top-contacts">
        <div class="container top-contacts-mid">
			<div class="language-selector pull-left">
				<ul class="lang-menu">
					<li <?php if($_SESSION['lang'] === 'ua') echo 'class="active"'; ?>><a href="?lang=ua"><img src="/template/images/flags/ua.png" alt=""></a></li>
					<li <?php if($_SESSION['lang'] === 'ru') echo 'class="active"'; ?>><a href="?lang=ru"><img src="/template/images/flags/ru.png" alt=""></a></li>
				</ul>
			</div>
            <div class="pull-right">
                <ul>
                    <li>

                        <?php
                            if ($contacts['tel1'] != '' || $contacts['tel2'] != '' || $contacts['tel3'] != '')
                            {
                                echo '<i class="fa fa-phone"></i>';
                            }

                            if ($contacts['tel1'] != '')
                                echo ' ' . $contacts['tel1'] . '; ';
                            if ($contacts['tel2'] != '')
                                echo $contacts['tel2'] . '; ';
                            if ($contacts['tel3'] != '')
                                echo $contacts['tel3'] . '; ';
                        ?>
                    </li>
                    <li>
                        <?php if (!empty($contacts['email'])) :?>
                        <i class="fa fa-envelope-o"></i>
                        <?=$contacts['email']?>
                        <?php endif;?>
                    </li>
                    <li>
                        <?php if (!empty($contacts['address'])) :?>
                        <i class="fa fa-location-arrow"></i>
                        <?=$contacts['address']?>
                        <?php endif;?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-navigation">
        <div class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle bordered" data-toggle="collapse" data-target="#mainMenu">
                        <i class="fa fa-bars mobbutton"></i>
                    </button>
                    <a href="/" class="navbar-brand">
                        <img src="/template/images/logo_mik.png" />
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="nav navbar-nav">
                        <li> 
                            <a href="/" ><?=$dict['SMAIN']?></a>
                        </li>
                        <li>
                            <a href="/photos/" class=""><?=$dict['SPHOTO']?></a>
                        </li>
                        <li>
                            <a href="/contacts/" class=""><?=$dict['SCONTACTS']?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
