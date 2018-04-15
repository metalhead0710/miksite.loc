	<style>
	
	   <?php foreach($banners as $key=>$value) :?>
	     .hits-bg-<?=$key?> {
	     background: url(/upload/images/banners/<?=$value['file']?>) center center no-repeat;
	     }
	    <?php endforeach;?>
	 
	</style>
