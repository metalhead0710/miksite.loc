<?php
if (!empty($category_view['title']) or !empty($category_view['title_ru']))
{
	$title = ($_SESSION['lang'] == 'ua') ?  $category_view['title'] :  $category_view['title_ru'];
}
else
{
	$title = ($_SESSION['lang'] == 'ua') ?  $category_view['name'] :  $category_view['name_ru'];
}
Head(
$title, 
null,
'<link rel="stylesheet" href="/template/plugins/lightbox/simplelightbox.css" />',
($_SESSION['lang'] == 'ua') ?  $category_view['meta_keywords'] :  $category_view['meta_keywords_ru'],
($_SESSION['lang'] == 'ua') ?  $category_view['meta_description'] :  $category_view['meta_description_ru']

);
?>
<div class="main-content-block">
    <div class="pg-header mg-bt-50">
        <h1 class="text-center">
            <?=($_SESSION['lang'] == 'ua') ?  $category_view['name'] :  $category_view['name_ru']?>
        </h1>
    </div>
    <div class="container" style="width:80%">
        <div class="row">
            <div class="col-md-3">
                <ul class="left-sidebar">
                    <?php foreach($categories as $category) :?>
                        <li>
                            <a href="<?=Url::langPart()?>/category/<?=($_SESSION['lang'] == 'ua') ?  $category['url'] :  $category['url_ru']?>" class="main-btn <?php if ($category_view['id'] == $category['id']) echo 'active'; ?> "><span class="text-btn"><?=($_SESSION['lang'] == 'ua') ?  $category['name'] :  $category['name_ru']; ?></span></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="cat-text gallery">
                    <?=($_SESSION['lang'] == 'ua') ? $category_view['text'] : $category_view['text_ru']?><br>
                </div>
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