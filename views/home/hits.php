<?php
Head(Dict::_('SHIT'), '<link href="/template/css/bootstrap-responsive.css" rel="stylesheet"><link href="/template/css/hits.css" rel="stylesheet">');
?>
<div class="main-content-block">
    <div class="pg-header mg-bt-50">
        <h1 class="text-center">
            <?=Dict::_('SHIT')?>
        </h1>
    </div>
    <div class="container" style="width:80%">
    	<div class="results"></div>
		<div class="row">
			<?php foreach($hits as $hit) :?>
				<div class="span4 PlanPricing template4" data-id="<?=$hit['id']?>"> 
			      <div class="planName"> 
				      <? if (!empty($hit['price'])) : ?>
				     	 <span class="price"><?=$hit['price']?></span>
				      <? endif; ?>
			        <h3><?=($_SESSION['lang'] == 'ua') ? $hit['title'] : $hit['title_ru'] ?></h3>
			        <p><?=($_SESSION['lang'] == 'ua') ? Category::getCategoryById($hit['categoryId'])['name'] : Category::getCategoryById($hit['categoryId'])['name_ru']?></p>
			      </div>
			      <div class="planFeatures">
			        <ul>
			          <li><img src="/upload/images/hits/thumbs/<?=$hit['picture'] ?>"></li>
			          <li><div class="specs"><?=($_SESSION['lang'] == 'ua') ? $hit['specs'] : $hit['specs_ru'] ?></div></li>
			          
			        </ul>
			      </div>
			      <p class="text-center"> <a href="#modal" role="button" data-toggle="modal" data-id = "<?=$hit['id']?>" class="btn btn-success btn-large order"><?=Dict::_('SORDER')?> </a> </p>
			    </div>	
		    <?php endforeach;?>	     
		</div>
    </div>
</div>
<div style="display: none;" class="modal fade" id="modal" role="dialog" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header borderless">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h4 class="modal-title"><?=Dict::_('SORDERDESC')?></h4>
			</div>
			<div class="modal-body">
				<form method="post" id = "order-hit" action="javascript:void(null);" onsubmit="send()">
					<input type="hidden" name="id" class="id-modal" />
					<div class="form-group">
						<input type="text" class="form-control" required name="name" placeholder="<?=Dict::_('SUSERNAME')?>" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" required name="phone" placeholder="Ваш телефон" />
					</div>
					<button type="submit" name ="submit" class="btn btn-primary">
						<i class="fa fa-shopping-cart"></i> 
						<?=Dict::_('SORDER')?>
					</button>					
				</form>
			</div>
		</div>
	</div>
</div>


<?php
footer();

scripts();
?>
<!--<script src ="/template/plugins/lightbox/simple-lightbox.js"></script>-->
<script>
	$(function(){
		//$('.gallery a').simpleLightbox();
		$('.template4').on('mouseenter', function(){
			var id = $(this).data("id");
        	$('div[data-id='+id+'] div.specs').css('height', 'auto');
			
		});
		$('.template4').on('mouseleave', function(){
			var id = $(this).data("id");
			$('div[data-id='+id+'] div.specs').css('height', '200px');
		});		
		$('.order').on("click", function () {
			var	id = $(this).data("id");
			$('.id-modal').attr("value", id);
		});
	});
	
	function send() {
	  var msg   = $('#order-hit').serialize();
		$.ajax({
		  type: 'POST',
		  url: '/order',
		  data: msg,
		  success: function(data) {
			$('.results').html(data);
			setTimeout();
			$('#modal').modal('hide');
		  },
		  error:  function(xhr, str){
			alert('Помилка: ' + xhr.responseCode);
		  }
		}); 
	};

	function setTimeout(){
	  $('.alert').fadeOut(7000)
	  };
	
</script>

<?php
endpage();
?>