<?php
head(Dict::_('SMAIN'), null, $banner);
?>
<div id="hits"
     style="background: url('/upload/images/banners/<?= ($banner['file']) ? $banner['file'] : 'fallback.jpg' ?>') center center no-repeat">
  <div class="container-fluid main-banner-overlay" style="background: rgba(0, 0, 0, 0.3);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="phones">
            <p style="color: #ffea3f;"><?=Dict::_('MODERN_TECH')?></p>
            <p style="text-transform: uppercase;"><?=Dict::_('BUD')?></p>
            <p class="">
              за телефоном
              <a href="tel:<?= $contacts['tel1'] ?>"><?= $contacts['tel1'] ?></a>
            </p>
            <p class="">
              <?=Dict::_('OR')?>
              <a href="tel:<?= $contacts['tel2'] ?>"><?= $contacts['tel2'] ?></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main-content-block">
  <div class="container">
    <div class="home-photos-wrapper">
      <div class="pg-header mg-bt-50">
        <h1 class="text-center">
            <?=Dict::_('HOME_PHOTO')?>
        </h1>
      </div>
      <div class="homepage-photos">
          <?php foreach ($photoCats as $photoCat) : ?>
            <div class="col-md-2 col-sm-3 col-xs-6 photo-catalog">
              <a href="<?= Url::langPart() ?>/photos/<?= ($_SESSION['lang'] == 'ua') ? $photoCat['url'] : $photoCat['url_ru'] ?>"
                 class="">
                  <?php if ($photoCat['pic'] != '') : ?>
                    <img src="/upload/photos/<?= $photoCat['folder'] ?>/thumbs/<?= $photoCat['pic'] ?>" alt="..." class="">
                  <?php else : ?>
                    <img src="http://www.placehold.it/350x250?text=:(" alt="..." class="">
                  <?php endif; ?>

                <p class="name"><?= ($_SESSION['lang'] == 'ua') ? $photoCat['name'] : $photoCat['name_ru'] ?></p>
              </a>
            </div>
          <?php endforeach; ?>
      </div>

    </div>

    <div class="main-block">
      <div class="row">
        <div class="col-md-3 left-sidebar">
          <aside>
            <ul class="side-navigation">
                <?php foreach ($categories as $key => $value) : ?>
                  <li>
                    <a href="<?= Url::langPart() ?>/category/<?= ($_SESSION['lang'] == 'ua') ? $value['url'] : $value['url_ru'] ?>"
                       title="<?= ($_SESSION['lang'] == 'ua') ? $value['name'] : $value['name_ru'] ?>">
                      <img src="/upload/images/categories/thumbs/<?= $value['pic'] ?>" class="hidden-xs hidden-sm" />
                      <span>
                                        <?= ($_SESSION['lang'] == 'ua') ? $value['name'] : $value['name_ru'] ?>
                                    </span>
                    </a>
                  </li>
                <?php endforeach; ?>
            </ul>
          </aside>
        </div>
        <div class="col-md-9">
          <main>
            <?php if (count($news) > 0) :?>
            <div class="news">
              <h2 class="text-center mg-bt-30"><?=Dict::_('NEWS')?></h2>
              <div class="container">
                  <?php foreach ($news as $new) : ?>
                    <div class="col-md-3">
                      <article>
                        <div class="new-pic" style="background-image: url('/upload/images/news/thumbs/<?= $new->pic ?>')">
                        </div>
                        <h3><?= ($_SESSION['lang'] == 'ua') ? $new->title : $new->title_ru ?></h3>
                        <span class="publish-time">
                            <i class="fa fa-clock-o"></i>
                            <?php
                            $new->date = new DateTime($new->date);
                            ?>
                            <?=$new->date->format('Y-m-d H:i:s')?>
                        </span>
                        <div class="content">
                            <?= ($_SESSION['lang'] == 'ua') ? $new->content : $new->content_ru ?>
                        </div>
                        <a href="<?=Url::langPart()?>/news/<?=($_SESSION['lang'] == 'ua') ? $new->url : $new->url_ru?>" class="btn btn-default mg-tp-20">
                          <i class="fa fa-eye"></i>
                          <?=Dict::_('READMORE')?>
                        </a>
                      </article>
                    </div>
                  <?php endforeach; ?>
              </div>
            </div>
            <div class="mg-tp-50">
              <a href="/news" class="main-btn pull-right" style="width: 150px;">
                <span class="text-btn">
                  <?=Dict::_('READALL')?>
                </span>
              </a>
            </div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <div class="text-justify main-text">
                <?= ($_SESSION['lang'] == 'ua') ? $maintext['maintext'] : $maintext['maintext_ru'] ?>
            </div>
          </main>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
footer();

scripts();
?>

<?php
endpage();
?>
