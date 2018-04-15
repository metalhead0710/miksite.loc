<?php
$page='Редагувати хіт';
adminhead($page);
?>
<div class="page-header">
	<h1>Управління хітами продаж</h1>
	<h4 class="text-muted">тут можна редагувати хіт</h4>
</div>
<form method="post" enctype="multipart/form-data">
	<ul class="nav nav-tabs">
        <li class="active"><a href="#ua" data-toggle="tab">Українська</a></li>
        <li class=""><a href="#ru" data-toggle="tab">Російська</a></li>        
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="ua">
            <div class="form-group">
                <label for="address">Назва </label>
				<input class="form-control" required name="title" placeholder="Назва" type="text" value="<?=$hit['title']?>">
            </div>
			<div class="form-group">
				<label for="specs">Опис</label>
				<textarea class="form-control"  name="specs" id="specs"><?=$hit['specs']?></textarea>
			</div>
        </div>
        <div class="tab-pane fade" id="ru">
            <div class="form-group">
                <label for="address">Назва </label>
				<input class="form-control" name="title_ru" placeholder="Назва" type="text" value="<?=$hit['title_ru']?>">
            </div>
			<div class="form-group">
				<label for="specs">Опис</label>
				<textarea class="form-control"  name="specs_ru" id="specs" ><?=$hit['specs_ru']?></textarea>
			</div>
        </div>
    </div>	
	<div class="form-group">
		<img src="/upload/images/hits/thumbs/<?=$hit['picture'] ?> " style = "width: 100px;" />
		<input class="form-control"  name="picture" type="file">
	</div>
	<div class="form-group">
		<select class="form-control" name="categoryId">
			
			<?php foreach ($categories as $category) : ?>
				<?php if ($category['id'] == $hit['categoryId']) :?>
					<option value="<?=$category['id']?>" selected><?=$category['name']?></option>
				<?php endif;?>
				<option value="<?=$category['id']?>"><?=$category['name']?></option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
		<input class="form-control" name="price" placeholder="Ціна" type="text" value="<?=$hit['price']?>">
	</div>
    
		<button type="submit" name="submit" class="btn btn-primary save">
		<i class="fa fa-check"></i>
			Зберегти
		</button>
		<a href="/admin/hits" class="btn btn-default">
			<i class="fa fa-long-arrow-left"></i>
				Назад
		</a>
	</div>
</form>

<?php
adminscripts();
?>
    <script>
        CKEDITOR.replace('specs');
        CKEDITOR.replace('specs_ru');
    </script>
<?php
adminend();
?>