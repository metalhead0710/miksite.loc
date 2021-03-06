<?php
$page = 'Редагувати новину';
adminhead($page);
?>

  <div class="page-header">
    <h1>Управління новинами</h1>
    <h4 class="text-muted">тут можна редагувати новину</h4>
  </div>
  <form method="post" enctype="multipart/form-data">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#ua" data-toggle="tab">Українська</a></li>
      <li class=""><a href="#ru" data-toggle="tab">Російська</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade active in" id="ua">
        <div class="form-group">
          <label> Заголовок </label>
          <input class="form-control" required name="title" placeholder="Залоголовок" type="text" value="<?= $new->title ?>">
        </div>

        <div class="form-group">
          <label> Текст </label>
          <textarea class="form-control" required placeholder="Напищіть шось якщо є натхнення..." name="content" id="text"><?= $new->content ?></textarea>
        </div>
      </div>
      <div class="tab-pane fade" id="ru">
        <div class="form-group">
          <label> Заголовок </label>
          <input class="form-control" required name="title_ru" placeholder="Залоголовок на русіше" type="text"
                 value="<?= $new->title_ru ?>">
        </div>
        <div class="form-group">
          <label> Текст </label>
          <textarea class="form-control" placeholder="Напищіть шось якщо є натхнення..." name="content_ru" id="text_ru"><?= $new->content_ru ?></textarea>
        </div>
      </div>
    </div>
    <div class="form-group">
      <select class="form-control" name="isVisible">
        <option value="1" <?php if ($new->isVisible) {
            echo 'selected';
        } ?>>Відображається
        </option>
        <option value="0" <?php if (!$new->isVisible) {
            echo 'selected';
        } ?>>Прихована
        </option>
      </select>
    </div>
      <?php if ($new->pic != '') : ?>
        <img src="/upload/images/news/thumbs/<?= $new->pic ?>"/>
      <?php endif; ?>
    <div class="form-group">
      <input class="form-control" name="picture" placeholder="Пікча" type="file">
    </div>
    <button type="submit" name="submit" class="btn btn-primary save">
      <i class="fa fa-check"></i>
      Зберегти
    </button>
    <a href="/admin/news" class="btn btn-default">
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