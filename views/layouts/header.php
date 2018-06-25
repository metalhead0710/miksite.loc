<?php
$contacts = Contacts::getContactsList();
?>
<!DOCTYPE html>
<html lang="<?= ($_SESSION['lang'] === 'ua') ? 'uk' : 'ru' ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $page ?> - <?= Dict::_('SMIK') ?></title>

  <meta name="keywords" content="<?= $meta_keys ?>"/>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118580709-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-118580709-1');
  </script>

  <meta name="description" content="<?= $meta_description ?>"/>
  <link href="/template/images/favicon.png" rel="shortcut icon" type="image/png"/>
  <link href="/template/css/bootstrap.min.css" rel="stylesheet">
  <link href="/template/css/font-awesome.min.css" rel="stylesheet">
  <link href="/template/css/site.css" rel="stylesheet">
  <link href="/template/plugins/lightbox/simplelightbox.css" rel="stylesheet">
    <?php
    if ($style) {
        echo $style;
    }
    ?>

</head>
<body>
<div id="wrapper">
  <div class="top-contacts">
    <div class="container top-contacts-mid">
      <div class="language-selector pull-left">
        <ul class="lang-menu">
          <li <?php if ($_SESSION['lang'] === 'ua') {
              echo 'class="active"';
          } ?>>
            <a href="<?= Url::getCurrentUrlUA() ?>">
              <img src="/template/images/flags/ua.png" alt="">
            </a>
          </li>
          <li <?php if ($_SESSION['lang'] === 'ru') {
              echo 'class="active"';
          } ?>>
            <a href="<?= Url::getCurrentUrlRU() ?>">
              <img src="/template/images/flags/ru.png" alt="">
            </a>
          </li>
        </ul>
      </div>
      <div class="pull-right">
        <ul>
          <li>

              <?php
              if (!empty($contacts['tel1']) || !empty($contacts['tel2']) || !empty($contacts['tel3'])) {
                  echo '<i class="fa fa-phone"></i>';
              }
              if (!empty($contacts['tel1'])) {
                  echo ' ' . '<a href="tel:' . $contacts['tel1'] . '">' . $contacts['tel1'] . "</a>";
              }
              if (!empty($contacts['tel2'])) {
                  echo ';  ' . '<a href="tel:' . $contacts['tel2'] . '">' . $contacts['tel2'] . "</a>";
              }
              if (!empty($contacts['tel3'])) {
                  echo ';  ' . '<a href="tel:' . $contacts['tel3'] . '">' . $contacts['tel3'] . "</a>";
              }

              ?>
          </li>
          <li>
              <?php if (!empty($contacts['email'])) : ?>
                <i class="fa fa-envelope-o"></i>
                <a href="mailto:<?= $contacts['email'] ?>"><?= $contacts['email'] ?></a>
              <?php endif; ?>
          </li>
          <li>
              <?php if (!empty($contacts['address'])) : ?>
                <i class="fa fa-location-arrow"></i>
                  <?= ($_SESSION['lang'] == 'ua') ? $contacts['address'] : $contacts['address_ru'] ?>
              <?php endif; ?>
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
          <a href="<?= Url::langPart() ?>/" class="navbar-brand">
            <img src="/template/images/logo_mik.png"/>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="mainMenu">
          <ul class="nav navbar-nav">
            <li>
              <a href="<?= Url::langPart() ?>/" class=""><?= Dict::_('SMAIN') ?></a>
            </li>
            <li>
              <a href="<?= Url::langPart() ?>/news" class=""><?= Dict::_('NEWS') ?></a>
            </li>
            <li>
              <a href="<?= Url::langPart() ?>/photos" class=""><?= Dict::_('SPHOTO') ?></a>
            </li>
            <li>
              <a href="<?= Url::langPart() ?>/contacts" class=""><?= Dict::_('SCONTACTS') ?></a>
            </li>
            <li>
              <a href="<?= Url::langPart() ?>/hits" class=""><?= Dict::_('SHIT') ?></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
