<?php
$contacts = Contacts::getContactsList();
$socials = Socials::getSocialsList();
$categories = Category::getCategoriesList();
?>
<div class="pre-footer mg-tp-50">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1 kolonka col-sm-4 col-xs-12">
                <h4>MiK</h4>
                <p class="">
					<?php foreach($categories as $category) :?>
											
						<a href="<?=Url::langPart()?>/category/<?=($_SESSION['lang'] == 'ua') ? $category['url'] : $category['url_ru']?>">
							<?php 
								$name = ($_SESSION['lang'] == 'ua') ? $category['name'] : $category['name_ru'];
								if ($category === reset($categories))
								{
									echo ucfirst($name) . ',';
								}
								elseif ($category === end($categories))
								{
									echo mb_strtolower($name, 'utf8');
								}
								else
								{
									echo mb_strtolower($name, 'UTF-8') . ',';
								}
							?>							
						</a>					
					<?php endforeach?>
                    <?=Dict::_('SAD')?>
                </p>
                <h4><?=Dict::_('SOCIALS')?></h4>
                <?php if ($socials['vk'] != '') :?>
                    <a class="social-icons" href="<?=$socials['vk']?>"><i class="fa fa-vk"></i></a>
                <?php endif;?>
                <?php if ($socials['facebook'] != '') :?>
                    <a class="social-icons" href="<?=$socials['facebook']?>"><i class="fa fa-facebook"></i></a>
                <?php endif;?>
                <?php if ($socials['youtube'] != '') :?>
                    <a class="social-icons" href="<?=$socials['youtube']?>"><i class="fa fa-youtube-play"></i></a>
                <?php endif;?>

            </div>
            <div class="col-md-3 col-md-offset-1 kolonka col-sm-4 col-xs-12">
                <h4><?=Dict::_('SNAVIG')?></h4>
                <ul>
                    <!--<li><a href="<?=$_SESSION['lang']?>/"><?=Dict::_('SMAIN')?></a></li>-->
                    <li><a href="<?=Url::langPart()?>/photos/"><?=Dict::_('SPHOTO')?></a></li>
                    <li><a href="<?=Url::langPart()?>/contacts/"><?=Dict::_('SCONTACTS')?></a></li>
                </ul>
            </div>
            <div class="col-md-3 col-md-offset-1 kolonka col-sm-4 col-xs-12">
                <h4><?=Dict::_('SADDRESS')?></h4>
                <p>
                    <?php if ($contacts['address'] != '')
                    {
                        echo substr(($_SESSION['lang'] == 'ua') ? $contacts['address'] : $contacts['address_ru'], 0 ,14);
                    }
                    ?>
                </p>
                <p>
                    <?php if ($contacts['address'] != '')
                    {
                        echo substr(($_SESSION['lang'] == 'ua') ? $contacts['address'] : $contacts['address_ru'] , 16);
                    }
                    ?>
                </p>
                <p>
                    <?php if ($contacts['tel2'] != '')
                    {
                        echo $contacts['tel2'];
                    }
                    ?>
                    <br>
                    <?php if ($contacts['tel3'] != '')
                    {
                        echo $contacts['tel3'];
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <?php echo date("Y");?> &copy; <span style="color: #E3E3E3">MiK.</span> <?=Dict::_('SDISCLAIMER')?>
</div>
</div>
