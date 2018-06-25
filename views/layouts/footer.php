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
                <?php if ($socials['instagram'] != '') :?>
                    <a class="social-icons" href="<?=$socials['instagram']?>"><i class="fa fa-instagram"></i></a>
                <?php endif;?>
                <?php if ($socials['g_plus'] != '') :?>
                    <a class="social-icons" href="<?=$socials['g_plus']?>"><i class="fa fa-google-plus-square"></i></a>
                <?php endif;?>

            </div>
            <div class="col-md-3 col-md-offset-1 kolonka col-sm-4 col-xs-12">
                <h4><?=Dict::_('SNAVIG')?></h4>
                <ul>
                    <li><a href="<?=Url::langPart()?>/news"><?=Dict::_('NEWS')?></a></li>
                    <li><a href="<?=Url::langPart()?>/photos/"><?=Dict::_('SPHOTO')?></a></li>
                    <li><a href="<?=Url::langPart()?>/contacts/"><?=Dict::_('SCONTACTS')?></a></li>
                    <li><a href="<?=Url::langPart()?>/hits/"><?=Dict::_('SHIT')?></a></li>
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
                    <?php if ($contacts['tel1'] != '') :?>
                        <a href="tel:<?=$contacts['tel1']?>"><?=$contacts['tel1'];?></a>
                    <?php endif;?>
                    <br>
                    <?php if ($contacts['tel2'] != '') :?>
                        <a href="tel:<?=$contacts['tel2']?>"><?=$contacts['tel2'];?></a>
                    <?php endif;?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="feedback">
  <a class="handle" href="#">
    <i class="fa fa-phone"></i>
    <i class="fa fa-envelope-o"></i>
  </a>
  <div class="content">
    <form action="" class="form">
      <p class="text-info">
        <?=Dict::_('FEEDBACKTEXT')?>
      </p>
      <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="<?=Dict::_('SUSERNAME')?>">
        <span id="name"></span>
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="<?=Dict::_('SUSERMAIL')?>">
        <span id="email"></span>
      </div>
      <div class="form-group">
        <input type="text" required name="phone" class="form-control" placeholder="<?=Dict::_('SUSERPHONE')?>">
        <span id="phone"></span>
      </div>
      <div class="form-group">
        <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="<?=Dict::_('SMSG')?>"></textarea>
      </div>
      <button class="btn btn-default" type="submit">
        <i class="fa fa-check"></i>
        <?=Dict::_('SSEND')?>
      </button>
    </form>
  </div>
</div>
<div class="flash-message"></div>
<div class="footer">
    <?php echo date("Y");?> &copy; <span style="color: #E3E3E3">MiK.</span> <?=Dict::_('SDISCLAIMER')?>
</div>
</div>
