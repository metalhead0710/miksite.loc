<?php
$page='Додати фотографії';
adminhead($page);
?>
    <div class="page-header">
        <h1>Додати фотографії</h1>
        <h4 class="text-muted">Ви додаєте фотографії в каталог <?=$photocat['name']?></h4>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control"  name="picture[]" placeholder="Пікча" type="file"  multiple="multiple">
        </div>
        <button type="submit" name="submit" class="btn btn-primary save">
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