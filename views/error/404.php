<?php

head(Dict::_('SERROR404'));
?>

<div class="main-content-block">
    <div class="pg-header mg-bt-50">
        <h1 class="text-center">
            <?=Dict::_('SERROR404')?>
        </h1>
    </div>
    <div class="container text-center">
	<p><?=Dict::_('SERROR404DESC')?></p>
	<a class="main-btn" href="/" style="width:150px">
		<span class="text-btn">
			<?=Dict::_('SMAIN')?>
		</span>
	</a>
      
    </div>

</div>


<?php
footer();
scripts();
?>
<?php
endpage();
?>