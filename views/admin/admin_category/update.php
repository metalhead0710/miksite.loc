<?php
$page='Редагувати категорію ' . $category['name'];
adminhead($page);
?>
<div class="page-header">
	<h1>Управління категоріями</h1>
	<h4 class="text-muted">Ви редагуєте категорію <?=$category['name']; ?></h4>
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
					<input class="form-control" required name="name" placeholder="Назва категорії" type="text" value="<?=$category['name']; ?>">
				</div>
				
				<div class="form-group">
					<label> Title сторінки </label>
					<input class="form-control" name="title" placeholder="Залоголовок" type="text" value="<?=$category['title']; ?>">
				</div>
				
				<div class="form-group">
					<label> Ключові слова </label>
					<input class="form-control" name="meta_keywords" placeholder="Ключові слова" type="text" value="<?=$category['meta_keywords']; ?>">
				</div>
				
				<div class="form-group">
					<label> Опис </label>
					<input class="form-control" name="meta_description" placeholder="Опис" type="text" value="<?=$category['meta_description']; ?>">
				</div>
				<div class="form-group">
					<label> Текст </label>
					<textarea class="form-control" placeholder="Напищіть шось якщо є натхнення..." name="text" id="text" ><?=$category['text']; ?></textarea>
				</div>
			</div>
			<div class="tab-pane fade" id="ru">
				<div class="form-group">
					<label> Назва категорії </label>
					<input class="form-control" name="name_ru" placeholder="Назва категорії на русіше" type="text" value="<?=$category['name_ru']; ?>">
				</div>
				
				<div class="form-group">
					<label> Title сторінки </label>
					<input class="form-control" name="title_ru" placeholder="Залоголовок" type="text" meta_description value="<?=$category['title_ru']; ?>">
				</div>
				
				<div class="form-group">
					<label> Ключові слова </label>
					<input class="form-control" name="meta_keywords_ru" placeholder="Ключові слова" type="text" value="<?=$category['meta_keywords_ru']; ?>">
				</div>
				
				<div class="form-group">
					<label> Опис </label>
					<input class="form-control" name="meta_description_ru" placeholder="Опис" type="text" value="<?=$category['meta_description_ru']; ?>">
				</div>
				<div class="form-group">
					<label> Текст </label>
					<textarea class="form-control" placeholder="Напищіть шось якщо є натхнення..." name="text_ru" id="textnews"  ><?=$category['text_ru']; ?></textarea>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<input class="form-control" required name="sort_order" placeholder="Порядковий номер" type="text" value="<?=$category['sort_order']; ?>">
		</div>
		<div class="form-group">
			<select class="form-control" name="status">
				<option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Відображається</option>
                <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Прихована</option>
			</select>
		</div>

            <?php if ($category['pic'] != '') :?>
            <img src="/upload/images/categories/thumbs/<?=$category['pic']?>" />
            <?php endif; ?>
        <div class="form-group">
            <input class="form-control"  name="picture" placeholder="Пікча" type="file">
        </div>
		
			
			<button type="submit" name="submit" class="btn btn-primary">
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