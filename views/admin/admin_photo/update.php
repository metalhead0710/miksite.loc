<?php
$page='Редагувати каталог ' . $photocat['name'];
adminhead($page);
?>
<div class="page-header">
	<h1>Управління каталогами</h1>
	<h4 class="text-muted">Ви редагуєте категорію <?=$photocat['name']; ?></h4>
</div>	
	
	<form method="post" enctype="multipart/form-data">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#ua" data-toggle="tab">Українська</a></li>
			<li class=""><a href="#ru" data-toggle="tab">Російська</a></li>        
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active in" id="ua">
				<div class="form-group">
					<label> Назва категорії </label>
					<input class="form-control" required name="name" placeholder="Назва категорії" type="text" value="<?=$photocat['name']; ?>">
				</div>
			</div>
			<div class="tab-pane fade" id="ru">
				<div class="form-group">
					<label> Назва категорії </label>
					<input class="form-control" name="name_ru" placeholder="Назва категорії на русіше" type="text" value="<?=$photocat['name_ru']; ?>">
				</div>
			</div>
		</div>
		<div class="form-group">
            <input class="form-control" required name="sort_order" placeholder="Порядковий номер" type="text"  value="<?=$photocat['sort_order']; ?>">
        </div>
		
            <?php if ($photocat['pic'] != '') :?>
            <img src="/upload/photos/<?=$photocat['folder']?>/thumbs/<?=$photocat['pic']?>" />
            <?php endif; ?>
        <div class="form-group">
            <input class="form-control"  name="picture" placeholder="Пікча" type="file">
        </div>
		
			
			<button type="submit" name="submit" class="btn btn-primary">
			<i class="fa fa-check"></i>
				Зберегти
			</button>
			
			<a href="/admin/photocat" class="btn btn-default">
			<i class="fa fa-long-arrow-left"></i>
				Назад
			</a>
			
		</div>
	</form>

<?php
adminscripts();
adminend();
?>