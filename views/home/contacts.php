<?php

head(Dict::_('SCONTACTS'));
?>

<div class="main-content-block">
    <div class="pg-header mg-bt-50">
        <h1 class="text-center">
            <?=Dict::_('SCONTACTS')?>
        </h1>
    </div>
    <div class="container contacts-container">
        <div class="row">
            <div class="col-md-6 contacts">
                <?php if ($contact['address'] !='') :?>
                <p>
                        <span class="contact-icon">
                            <i class="fa fa-location-arrow"></i>
                        </span>
                    <?=($_SESSION['lang'] == 'ua') ? $contact['address'] : $contact['address_ru'] ?>
                </p>
                <?php endif;?>
                <?php if ($contact['email'] !='') :?>
                <p>
                        <span class="contact-icon">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                    <?=$contact['email']?>
                </p>
                <?php endif;?>
                <?php if ($contact['tel1'] !='') :?>
                <p>
                        <span class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </span>
                    <?=$contact['tel1']?>

                </p>
                <?php endif;?>
                <?php if ($contact['tel2'] !='') :?>
                <p>
                        <span class="contact-icon">
                            <i class="fa fa-mobile"></i>
                        </span>
                    <?=$contact['tel2']?>
                </p>
                <?php endif;?>
                <?php if ($contact['tel3'] !='') :?>
                <p>
                        <span class="contact-icon">
                            <i class="fa fa-mobile"></i>
                        </span>
                    <?=$contact['tel3']?>
                </p>
                <?php endif;?>
            </div>
            <div class="col-md-6">
            	<h3 class="text-center hidden-md hidden-lg"><?=Dict::_('SEMAILUS')?></h3>
                <div class="results"></div>
                <form  id="contact-form" class = "contacts-form" action="javascript:void(null);" onsubmit="send()">
                    <div class="form-group">
                        <input class="" name="username" placeholder="<?=Dict::_('SUSERNAME')?>"  type="text" value="" required>

                    </div>
                    <div class="form-group">
                        <input class="" name="email" placeholder="<?=Dict::_('SUSERMAIL')?>" type="text" required >

                    </div>

                    <div class="form-group">
                        <textarea class="" cols="20" name="content"  required placeholder="<?=Dict::_('SMSG')?>"></textarea>

                    </div>
                    <div>
                        <button type="submit" class="main-btn pull-right" style="width: 30%;">
                            <span class="text-btn"><?=Dict::_('SSEND')?></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container mg-tp-50 map">
        <?=$contact['map']?>
    </div>
</div>


<?php
footer();

scripts();
?>
<script>
function send() {
  var msg   = $('#contact-form').serialize();
	$.ajax({
	  type: 'POST',
	  url: '/emailus',
	  data: msg,
	  success: function(data) {
		$('.results').html(data);
		setTimeout();
		$('#contact-form')[0].reset();
	  },
	  error:  function(xhr, str){
		alert('Помилка: ' + xhr.responseCode);
	  }
	});
};

function setTimeout(){
  $('.alert').fadeOut(8000)
  };

</script>



<?php
endpage();
?>