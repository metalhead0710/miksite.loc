<?php
$page = 'Додати банер';
adminhead($page);
?>
  <div class="page-header">
    <h1>Додати банер</h1>
    <h4 class="text-muted">Ви додаєте банер на головну сторінку</h4>
  </div>
  <form method="post" action="/admin/banners/add" enctype="multipart/form-data">
    <div class="form-group">
      <label>Банер</label>
      <input class="form-control" name="picture" type="file">
    </div>
    <button type="submit" name="submit" class="btn btn-primary save">
      <i class="fa fa-check"></i>
      Зберегти
    </button>
    <a href="/admin/banners" class="btn btn-default">
      <i class="fa fa-long-arrow-left"></i>
      Назад
    </a>
    </div>
  </form>

<?php
adminscripts();
adminend();
?>