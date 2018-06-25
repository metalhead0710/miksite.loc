<?php
$page = 'Редагувати банери';
adminhead($page);
?>

  <div class="page-header">
    <h1>Управління банерами</h1>
    <h4 class="text-muted">тут можна додавати, редагувати та видаляти банери (ті, що на головній сторінці)</h4>
  </div>

  <a href="/admin/banners/add/" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Додати банер</a>
  <table class="table table-hover">
    <thead>
    <tr>
      <th>Назва файлу</th>
      <th>Картинка</th>
      <th class="text-center" style="width: 10%">Дії</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($banners as $banner) : ?>
      <tr data-id="<?= $banner['id'] ?>">
        <td class="cell-middle">
            <?= $banner['file'] ?>
        </td>
        <td>
          <img src="<?= '/upload/images/banners/' . $banner['file'] ?>" style="width:150px;"/>
        </td>
        <td class="cell-middle text-center">
          <div class="btn btn-group">
            <?php if (!$banner['set']) :?>
              <a href="/admin/banners/set/<?=$banner['id']?>" class="btn btn-success" title="Поставити на головну">
                <i class="fa fa-check"></i>
              </a>
            <?php endif; ?>
            <a href="#modal" data-toggle='modal' data-link="banners/remove/<?= $banner['id'] ?>" class="btn btn-danger delete"
               title="Видалити банер">
              <i class="fa fa-times"></i>
            </a>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>


  <div style="display: none;" class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header borderless">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
          <h4 class="modal-title">Видалити банер?</h4>
        </div>
        <div class="modal-body">
          <form method="post" class="delete_form">
            <input type="hidden" name="id" class="id-modal"/>
            <button type="submit" name="submit" class="btn btn-danger">
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
  <script>
    $('.delete').on('click', function() {
      var link = $(this).closest('a.delete');
      var url = link.data('link');
      var tr = $(this).closest('tr');
      var id = tr.data('id');
      $('.delete_form').attr('action', url);
      $('.id-modal').attr('value', id);
    });
  </script>
<?php
adminend();
?>