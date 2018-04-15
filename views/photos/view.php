<?php
head(($_SESSION['lang'] == 'ua') ? $category['name'] : $category['name_ru'], '<link rel="stylesheet" href="/template/plugins/lightbox/simplelightbox.css" />');
?>

<div class="main-content-block">
    <div class="pg-header mg-bt-50">
        <h1 class="text-center">
            <?=($_SESSION['lang'] == 'ua') ? $category['name'] : $category['name_ru']?>
        </h1>
    </div>
	<div class="container" style="width:62%">
		<div class="photo-container gallery">
			<?php if(count($photos) === 0) :?>
			
			<h4 class="text-center">
				<?=Dict::_('NOPHOTOS')?>
			</h4>
			<?php endif; ?>
			
			<?php foreach ($photos as $photo) :?>
			<a class="photo-item" href="/upload/photos/<?=$category['folder']?>/<?=$photo['file']?>">
				<figure>
					<img class="img-responsive" src="/upload/photos/<?=$category['folder']?>/thumbs/<?=$photo['file']?>" alt="" />
					<!--<?=Url::Img( '/upload/photos/' . $category['folder'] . '/thumbs/' . $photo['file'])?>-->
				</figure>
			</a>
			<?php endforeach; ?>
			
		</div>

        <div class="photo-action text-center">
            <a href="<?=Url::langPart()?>/photos" class="main-btn" >
                <span class="text-btn">
                    <i class="fa fa-long-arrow-left"></i>
                    Назад
                </span>
            </a>
            <a href="#" class="main-btn button-more" >
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
            $('.photo-item').simpleLightbox();

        });

        $(document).ready(function(){
            $("#imgLoad").hide();  //Никаєм значок завантаження
        });
        var num = 8; //з якоого рядка ми таскаєм дані
        var count = <?=$count?> - 8;
        checkData(count);
        function checkData(count) {
            if (count <= 0 ){
                $('.button-more').hide();
            }
        }
        $(function() {
            $(".button-more").click(function(e){
                $("#imgLoad").show(); //показуєм значок завантаження
                $.ajax({
                    url: "/photos/showmore/<?=intval($category['id'])?>/"+num,
                    type: "post",
                    success: function(data){
                        if(data == 0){
                            $(".button-more").hide();
                            console.log("Більш нема фоток");
                            }else{
                            $(".gallery").append(data);
                            num = num + 8;
                            count = count - 8;
                            checkData(count);
                            $("#imgLoad").hide();
							$('.photo-item').simpleLightbox();

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