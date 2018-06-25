<?php

Head(Dict::_('NEWS'));
?>
<div class="main-content-block">
    <div class="pg-header mg-bt-50">
        <h1 class="text-center">
            <?= Dict::_('NEWS') ?>
        </h1>
    </div>
    <div class="container news-all">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <main>
                    <?php if(count($news) === 0) :?>

                      <h4 class="text-center">
                          <?=Dict::_('NONEWS')?>
                      </h4>
                    <?php endif; ?>
                    <?php foreach($news as $new) :?>
                    <article class="mg-bt-50">
                        <div class="feature-image" style="background-image: url('/upload/images/news/<?=$new->pic?>')">
                        </div>
                        <h3><?= ($_SESSION['lang'] == 'ua') ? $new->title : $new->title_ru ?></h3>
                        <div class="publish-time mg-bt-15">
                            <i class="fa fa-clock-o"></i>
                            <?php
                            $new->date = new DateTime($new->date);
                            ?>
                            <?=$new->date->format('Y-m-d H:i:s')?>
                        </div>
                        <div class="content">
                            <?= ($_SESSION['lang'] == 'ua') ? $new->content : $new->content_ru ?>
                        </div>
                        <a href="<?=Url::langPart()?>/news/<?=($_SESSION['lang'] == 'ua') ? $new->url : $new->url_ru?>" class="btn btn-default mg-tp-20">
                            <i class="fa fa-eye"></i>
                            <?=Dict::_('READMORE')?>
                        </a>
                    </article>
                        <hr>
                    <?php endforeach;?>
                </main>
            </div>
        </div>
    </div>
</div>
<?php
footer();

scripts();
?>
<script src ="/template/plugins/lightbox/simple-lightbox.js"></script>
<script>
  $(function(){
    $('.gallery a').simpleLightbox();
  });
</script>

<?php
endpage();
?>