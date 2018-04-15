<?php
$page='Редагувати посилання на соціальні мережі';
adminhead($page);
?>
<div class="page-header">
	<h1>Редагувати соціальні мережі</h1>
	<h4 class="text-muted"> Тут можна змінити лінки на соцмережі у разі чого</h4>
</div>
<form method="post">
	<div class="form-group">
		<label for="vk">Посилання на спільноту ВК</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-vk"></i>
			</span>
			<input class="form-control" id="vk" name="vk" placeholder="vk" type="text" value="<?=$socials['vk']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="vk">Посилання на спільноту Facebook</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-facebook"></i>
			</span>
			<input class="form-control" id="facebook" name="facebook" placeholder="facebook" type="text" value="<?=$socials['facebook']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="youtube">Посилання на канал YouTube</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-youtube"></i>
			</span>
			<input class="form-control" id="youtube" name="youtube" placeholder="youtube" type="text" value="<?=$socials['youtube']; ?>">
		</div>
	</div>
	
	
		
		<button type="submit" name="submit" class="btn btn-primary">
		<i class="fa fa-check"></i>
			Зберегти
		</button>
	</div>
</form>
<?php
adminscripts();
adminend();
?>