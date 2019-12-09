<?php
if (!empty($category['title']) or !empty($category['title_ru']))
{
    $title = ($_SESSION['lang'] == 'ua') ?  $category['title'] :  $category['title_ru'];
}
else
{
    $title = ($_SESSION['lang'] == 'ua') ?  $category['name'] :  $category['name_ru'];
}
head(
    $title,
    '<link rel="stylesheet" href="/template/plugins/lightbox/simplelightbox.css" />',
    null,
    ($_SESSION['lang'] == 'ua') ?  $category['keywords'] :  $category['keywords_ru'],
    ($_SESSION['lang'] == 'ua') ?  $category['description'] :  $category['description_ru']
);
?>

<div class="main-content-block">
    <div class="pg-header mg-bt-50">
        <h1 class="text-center">
            <?=($_SESSION['lang'] == 'ua') ? $category['name'] : $category['name_ru']?>
        </h1>
    </div>
	<div class="container">
		<div class="photo-container gallery">
			<?php if(count($photos) === 0) :?>

			<h4 class="text-center">
				<?=Dict::_('NOPHOTOS')?>
			</h4>
			<?php endif; ?>

			<?php foreach ($photos as $photo) :?>
			<div class="photo-item">
				<a class="photo-link" href="/upload/photos/<?=$category['folder']?>/<?=$photo['file']?>">
					<img class="img-responsive" src="/upload/photos/<?=$category['folder']?>/thumbs/<?=$photo['file']?>" alt="" />
					<table class="table table-bordered">
						<tr>
							<th><?=Dict::_('NAME')?></th>
							<td><?=$photo['name']?></td>
						</tr>
						<!--<tr>
							<th><?=Dict::_('MODEL')?></th>
							<td><?=$photo['model']?></td>
						</tr>-->
						<tr>
							<th><?=Dict::_('DIMS')?></th>
							<td><?=$photo['dimension']?></td>
						</tr>
					</table>
				</a>
			</div>
			<?php endforeach; ?>
		</div>

        <div class="photo-action text-center">
            <a href="<?=Url::langPart()?>/photos" class="main-btn" >
                <span class="text-btn">
                    <i class="fa fa-long-arrow-left"></i>
                    Назад
                </span>
            </a>
            <a href="#" class="main-btn button-more" id="load-anchor">
                <span class="text-btn">
                    <?=Dict::_('SLOADMORE')?>
                </span>
            </a>
        </div>
        <div id="imgLoad"><i class="fa fa-spinner fa-spin"></i></div>
    </div>
</div>
<?php
footer();

scripts();
?>
<script src ="/template/plugins/lightbox/simple-lightbox.js"></script>
    <script>
        $(function(){
            $('.photo-link').simpleLightbox();
        });

        $(document).ready(function() {
          $('#imgLoad').hide();  //Никаєм значок завантаження
        });
        var num = 8; //з якоого рядка ми таскаєм дані
        var count = <?=$count?> - 8;
        checkData(count);

        function checkData(count) {
          if (count <= 0) {
            $('.button-more').remove();
          }
        }

        $(function() {
          $('.button-more').click(function(e) {
            $('#imgLoad').show(); //показуєм значок завантаження
            $.ajax({
              url: "/photos/showmore/<?=intval($category['id'])?>/" + num,
              type: 'post',
              success: function(data) {
                if (data == 0) {
                  $('.button-more').hide();
                  console.log('Більш нема фоток');
                } else {
                  $('.gallery').append(data);
                  num = num + 10;
                  count = count - 10;
                  checkData(count);
                  $('#imgLoad').hide();
                  $('.photo-link').simpleLightbox();
                }
              }
            });
            e.preventDefault();
          });
        });

    </script>

<?php
endpage();
?>