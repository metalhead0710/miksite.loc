<?php
$page='Створити категорію';
adminhead($page);
?>

<div class="page-header">
	<h1>Управління категоріями</h1>
	<h4 class="text-muted">тут можна створити категорію</h4>
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
				<input class="form-control" required name="name" placeholder="Назва категорії" type="text">
			</div>
			
			<div class="form-group">
				<label> Title сторінки </label>
				<input class="form-control" required name="title" placeholder="Залоголовок" type="text">
			</div>
			
			<div class="form-group">
				<label> Ключові слова </label>
				<input class="form-control" required name="meta_keywords" placeholder="Ключові слова" type="text">
			</div>
			
			<div class="form-group">
				<label> Опис </label>
				<input class="form-control" required name="meta_description" placeholder="Опис" type="text">
			</div>
			<div class="form-group">
				<label> Текст </label>
				<textarea class="form-control" required  placeholder="Напищіть шось якщо є натхнення..." name="text" id="text"></textarea>
			</div>
		</div>
		<div class="tab-pane fade" id="ru">
			<div class="form-group">
				<label> Назва категорії </label>
				<input class="form-control"  name="name_ru" placeholder="Назва категорії на русіше" type="text">
			</div>
			
			<div class="form-group">
				<label> Title сторінки </label>
				<input class="form-control" required name="title_ru" placeholder="Залоголовок на русіше" type="text">
			</div>
			
			<div class="form-group">
				<label> Ключові слова </label>
				<input class="form-control" required name="meta_keywords_ru" placeholder="Ключові слова на русіше" type="text">
			</div>
			
			<div class="form-group">
				<label> Опис </label>
				<input class="form-control" required name="meta_description_ru" placeholder="Опис на русіше" type="text">
			</div>
			<div class="form-group">
				<label> Текст </label>
				<textarea class="form-control"  placeholder="Напищіть шось якщо є натхнення..." name="text_ru" id="textnews"></textarea>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<input class="form-control" required name="sort_order" placeholder="Порядковий номер" type="text">
	</div>
	<div class="form-group">
		<select class="form-control" name="status">
			<option value="1" selected="selected">Відображається</option>
			<option value="0">Прихована</option>
		</select>
	</div>
    <div class="form-group">
        <input class="form-control"  name="picture" placeholder="Пікча" type="file">
    </div>
		
		<button type="submit" name="submit" class="btn btn-primary save">
		<i class="fa fa-check"></i>
			Зберегти
		</button>
		<a href="/admin/category" class="btn btn-default">
			<i class="fa fa-long-arrow-left"></i>
				Назад
		</a>
	</div>
</form>


<?php
adminscripts();
?>
    <script>
        CKEDITOR.replace('text');
        CKEDITOR.replace('text_ru');
    </script>
<?php
adminend();
?>