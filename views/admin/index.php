<?php
$page='Адмінка';
adminhead($page);
?>
<div class="page-header">
	<h1>Головна адмінська сторінка</h1>
	<h4 class="text-muted"> Тут редагується основний контент сайту </h4>
</div>
    <form method="post">
		<ul class="nav nav-tabs">
        <li class="active"><a href="#ua" data-toggle="tab">Українська</a></li>
        <li class=""><a href="#ru" data-toggle="tab">Російська</a></li>        
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="ua">
				<div class="form-group">
					<label for="maintext">Текст головної сторінки</label>
					<textarea class="form-control" id="maintext" name="maintext" placeholder="Текст головної сторінки" type="text">
						<?=$maintext['maintext']?>
					</textarea>
				</div>
			</div>
			<div class="tab-pane fade" id="ru">
				<div class="form-group">
					<label for="maintext_ru">Текст головної сторінки</label>
					<textarea class="form-control" id="maintext_ru" name="maintext_ru" placeholder="Текст головної сторінки на русскам" type="text" >
						<?=$maintext['maintext_ru']?>
					</textarea>
				</div>
			</div>
		</div>	
        <button type="submit" name="submit" class="btn btn-primary">
            <i class="fa fa-check"></i>
            Зберегти
        </button>
    </form>

<?php
adminscripts();
?>
<script>
    CKEDITOR.replace('maintext');
    CKEDITOR.replace('maintext_ru');
</script>
<?php
adminend();
?>