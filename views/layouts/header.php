<?php
$contacts = Contacts::getContactsList();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$page?> - <?=Dict::_('SMIK')?></title>
    
    <meta name="keywords" content="<?=$meta_keys?>"/>
    
    <meta name="description" content="<?=$meta_description?>"/>
    <link href="/template/images/favicon.png" rel="shortcut icon" type="image/png" />
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/css/site.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css' />
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter46394694 = new Ya.Metrika({
						id:46394694,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true
					});
				} catch(e) { }
			});
			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () { n.parentNode.insertBefore(s, n); };
			s.type = "text/javascript";
			s.async = true;
			s.src = "https://d31j93rd8oukbv.cloudfront.net/metrika/watch_ua.js";
			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else { f(); }
		})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/46394694" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
		
	<?php
	if ($style)
	{
		echo $style;
	}
	if (is_array($banners))
	{
		include_once ROOT. '/views/layouts/banners.php';
	}
	?>
	
</head>
<body>
<div id="wrapper">
    <div class="top-contacts">
        <div class="container top-contacts-mid">
			<div class="language-selector pull-left">
				<ul class="lang-menu">
					<li <?php if($_SESSION['lang'] === 'ua') echo 'class="active"'; ?>>
						<a href="<?=Url::getCurrentUrlUA()?>">
							<img src="/template/images/flags/ua.png" alt="">								
						</a>
					</li>
					<li <?php if($_SESSION['lang'] === 'ru') echo 'class="active"'; ?>>
						<a href="<?=Url::getCurrentUrlRU()?>">
							<img src="/template/images/flags/ru.png" alt="">
						</a>
					</li>
				</ul>
			</div>
            <div class="pull-right">
                <ul>
                    <li>

                        <?php
                        if (!empty($contacts['tel1']) && !empty($contacts['tel2']) && !empty($contacts['tel3']) )
                        {
                            echo '<i class="fa fa-phone"></i>';
                        }

                        if (!empty($contacts['tel1']))
                            echo ' ' . $contacts['tel1'];
                        if (!empty($contacts['tel2']))
                            echo ';  ' . $contacts['tel2'];
                        if (!empty($contacts['tel3']))
                            echo ';  ' . $contacts['tel3'];

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
                            <?=($_SESSION['lang'] == 'ua') ? $contacts['address'] : $contacts['address_ru'] ?>
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
                    <a href="<?=Url::langPart()?>/" class="navbar-brand">
                        <img src="/template/images/logo_mik.png" />
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="mainMenu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?=Url::langPart()?>/" class=""><?=Dict::_('SMAIN')?></a>
                        </li>
                        <li>
                            <a href="<?=Url::langPart()?>/photos" class=""><?=Dict::_('SPHOTO')?></a>
                        </li>
                        <li>
                            <a href="<?=Url::langPart()?>/contacts" class=""><?=Dict::_('SCONTACTS')?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>