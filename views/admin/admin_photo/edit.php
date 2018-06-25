<?php
$page='Редагувати список фотографій';
adminhead($page);
?>
<div class="page-header">
    <h1>Редагувати список фотографій</h1>
    <h4 class="text-muted">тут можна додавати, редагувати та видаляти фотографії у папці <?=$photocat['name']?></h4>
</div>
  <div class="btn-group pull-right mg-bt-30">
    <a class="btn btn-default" href="/admin/photocat"><i class="fa fa-long-arrow-left"></i> Назад</a>
    <a href="/admin/photo/add/<?= $photocat['id'] ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Додати фотографії</a>
    <a href="#" class="btn btn-success save-order" style="display:none">
      <i class="fa fa-sort"></i>
      Зберегти порядок
    </a>
    <button class="btn btn-danger pull-right submit-btn" type="submit" style="display:none"> Видалити вибрані фото</button>
  </div>
<div class="clearfix"></div>

<form class="forma" method="post" action="/admin/photo/deletemassive/<?=$photocat['id']?>">
  <table class="table table-condensed photo-table" id="photos">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th class="photo-td">Фото</th>
        <th>Назва</th>
        <th>Назва ru</th>
        <th>Модель</th>
        <th>Розміри</th>
        <th class="actions">Дії</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($photos as $photo) :?>
      <tr data-id="<?=$photo['id']?>" data-sort="<?=$photo['sort_order']?>">
        <td class="handle">
          <i class="fa fa-bars"></i>
        </td>
        <td class="check-photos"><input type="checkbox" name="pic[]" value="<?=$photo['id']?>" class="form-control check" /></td>
        <td>
          <img src="/upload/photos/<?=$photocat['folder']?>/thumbs/<?=$photo['file']?>" alt="..." class="">
        </td>
        <td class="editable-cell">
          <span class="name"><?=$photo['name']?></span>
          <input type="text" class="form-control name" value="<?=$photo['name']?>" style="display:none;" />
        </td>
        <td class="editable-cell">
          <span class="name_ru"><?=$photo['name_ru']?></span>
          <input type="text" class="form-control name_ru" value="<?=$photo['name_ru']?>" style="display:none;" />
        </td>
        <td class="editable-cell">
          <span class="model"><?=$photo['model']?></span>
          <input type="text" class="form-control model" value="<?=$photo['model']?>" style="display:none;" />
        </td>
        <td class="editable-cell">
          <span class="dimension"><?=$photo['dimension']?></span>
          <input type="text" class="form-control dimension" value="<?=$photo['dimension']?>" style="display:none;" />
        </td>
        <td class="actions text-center">
          <div class="btn-group btn-group-sm edit-actions-group">
            <button class="btn btn-primary row-edit-btn"><i class="fa fa-edit"></i></button>
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right">
              <li class="evil">
                <a href="#modal" class="delete-link text-danger" data-toggle="modal" data-deletelink = "/admin/photo/delete/<?=$photo['id']?>">
                  <i class="fa fa-times"></i>
                  Видалити
                </a>
              </li>
            </ul>
          </div>
          <div class="btn-group btn-group-sm editable-actions-group" style="display: none;">
            <button type="button" class="btn btn-primary row-save-btn">
              <i class="fa fa-save"></i>
            </button>
            <button type="button" class="btn default row-cancel-btn">
              <i class="fa fa-close"></i>
            </button>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</form>
<div style="display: none;" class="modal fade" id="modal" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header borderless">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title">Видалити фото?</h4>
            </div>
            <div class="modal-body">
                <form method="post" class = "delete_form" >
                    <button type="submit" name ="yes" class="btn btn-danger">
                        Так
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                        Ні
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
adminscripts();
?>
  <script type="text/javascript" src="/template/plugins/jquery-ui/jquery-ui.js"></script>
  <script src="/template/js/pages/photos/edit.js" type="text/javascript"></script>
<?php
adminend();
?>