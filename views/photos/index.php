<?php

head(Dict::_('SPHOTO'));
?>

<div class="main-content-block">
    <div class="pg-header mg-bt-50">
        <h1 class="text-center">
            <?=Dict::_('SPHOTO')?>
        </h1>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach ($photoCats as $photoCat) :?>
            <div class="col-sm-4 photocat-item">
                <div class="thumbnail">
                    <a href="<?=Url::langPart()?>/photos/<?=($_SESSION['lang'] == 'ua') ? $photoCat['url'] : $photoCat['url_ru']?>" class="">
                        <div class="caption">
                            <h4 class="category-name"><?=($_SESSION['lang'] == 'ua') ? $photoCat['name'] : $photoCat['name_ru']?></h4>
                        </div>
                        <?php if ($photoCat['pic'] != '') :?>
                        <img src="/upload/photos/<?=$photoCat['folder']?>/thumbs/<?=$photoCat['pic']?>" alt="..." class=""> </a>
                        <?php else :?>
                        <img src="http://www.placehold.it/350x250?text=:(" alt="..." class=""> </a>
                        <?php endif ; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

</div>
<?php
footer();

scripts();
?>
<script>
    $(document).ready(function() {
        $("[rel='tooltip']").tooltip();

        $('.thumbnail').hover(
            function(){
                $(this).find('.caption').slideDown(250);
            },
            function(){
                $(this).find('.caption').slideUp(250);
            }
        );
    });
</script>
<?php
endpage();
?>
