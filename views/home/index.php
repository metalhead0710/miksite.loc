<?php
head(Dict::_('SMAIN'), null, $banners);
?>

<div id="hits" class="hits-bg-0">
    <div class="container-fluid" style="background: rgba(0,0,0,0.6)">
    	<div class="container hitulki">
	        <div class="row">
	            <div class="col-md-3">
	                <div class="hits-msg">
	                    <p>
	                        <?=Dict::_('SHIT')?>
	                    </p>
	                    <span class="hits-desc">
	                        <?=Dict::_('SHITDESC')?>
	                    </span>

	                    <a  href="<?=Url::langPart()?>/hits" class="button-moar">
	                    	<div class="text-moar">
	                    		<?=Dict::_('SHITMORE')?>
	                    	</div>
	                        <div class="arrow-moar">
	                        	<i class="fa fa-long-arrow-right"></i>
	                        </div>
	                    </a>
	                </div>
	            </div>
	        </div>
        </div>

    </div>
</div>
<div class="main-content-block">
    <div class="container">
        <div class="lilbitupper">
            <div class="row">
                <div class="span12">
                    <div id="myCarousel" class="carousel fdi-Carousel slide">
                        <!-- Carousel items -->
                        <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
                            <div class="carousel-inner onebyone-carosel">
                                <?php foreach($categories as $key=>$value) :?>
                                <div class="item <?php if  ($key == 0) echo "active"?>">
                                    <div class="col-md-4">
                                        <a href="<?=Url::langPart()?>/category/<?=($_SESSION['lang'] == 'ua') ? $value['url'] : $value['url_ru']?>"><img src="/upload/images/categories/thumbs/<?=$value['pic'] ?>" class="center-block"></a>
                                        <a href="<?=Url::langPart()?>/category/<?=($_SESSION['lang'] == 'ua') ? $value['url'] : $value['url_ru']?>" title = "<?=($_SESSION['lang'] == 'ua') ? $value['name'] : $value['name_ru'] ?>"  class="main-btn">
                                                    <span class="text-btn">
                                                        <?=($_SESSION['lang'] == 'ua') ? $value['name'] : $value['name_ru'] ?>
                                                   </span>
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                            <a class="left carousel-control" href="#eventCarousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right carousel-control" href="#eventCarousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                        <!--/carousel-inner-->


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <p class="text-justify main-text">
                            <?=($_SESSION['lang'] == 'ua') ? $maintext['maintext'] : $maintext['maintext_ru'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
footer();

scripts();
?>
<script>
    $(document).ready(function () {
        (function(){

            var cls = [
                    <?php foreach($banners as $key=>$value) :?>
                    'hits-bg-<?=$key?>',
                    <?php endforeach;?>
                    ],
                block = $('#hits')[0],
                i = 1,
                clsLen = cls.length - 1;

            function bgSlider() {
                setInterval(function(){
                    block.className = cls[i];
                    i = i == clsLen ? 0 : i + 1;
                },6000);
            }

            window.onload = bgSlider;

        })();
		$('.button-moar').on('mouseenter', function () {
			$('.arrow-moar').addClass('move-it');
		});
		$('.button-moar').on('mouseleave', function () {
			$('.arrow-moar').removeClass('move-it');
		});

        $('#myCarousel').carousel({
            interval: 5000
            //interval: 156000
        })
        $('.fdi-Carousel .item').each(function () {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            if (next.next().length > 0) {
                next.next().children(':first-child').clone().appendTo($(this));
            }
            else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });
    });
</script>
<?php
endpage();
?>
