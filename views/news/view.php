<?php
if (!empty($new->title) or !empty($new->title_ru))
{
    $title = ($_SESSION['lang'] == 'ua') ?  $new->title :  $new->title_ru;
}
Head(
    $title
);
?>
    <div class="main-content-block">
        <div class="pg-header mg-bt-50">
            <h1 class="text-center">
                <?= ($_SESSION['lang'] == 'ua') ? $new->title : $new->title_ru ?>
            </h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <main>
                        <article>
                            <div class="feature-image mg-bt-50" style="background-image: url('/upload/images/news/<?=$new->pic?>')">
                            </div>
                          <div class="publish-time mg-bt-30">
                            <i class="fa fa-clock-o"></i>
                              <?php
                              $new->date = new DateTime($new->date);
                              ?>
                              <?=$new->date->format('Y-m-d H:i:s')?>
                        </div>
                            <div class="mg-tp-30 news-full-content">
                                <?= ($_SESSION['lang'] == 'ua') ? $new->content : $new->content_ru ?>
                            </div>
                        </article>
                        <a class="pull-right btn btn-default" href="<?=Url::langPart()?>/news">
                            <i class="fa fa-long-arrow-left"></i>
                            Назад
                        </a>
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