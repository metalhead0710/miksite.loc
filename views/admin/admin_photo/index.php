<?php
$page='Редагувати папки фотографій';
adminhead($page);
?>
    <div class="page-header">
        <h1>Управління папками фотографій</h1>
        <h4 class="text-muted">тут можна додавати, редагувати та видаляти каталоги фотографій</h4>
    </div>
    <a href="/admin/photocat/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Створити каталог</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Назва</th>
            <th>Порядок</th>
            <th>Папка</th>
            <th width="450">Дії</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($photocats as $photocat) :?>
            <tr data-id="<?=$photocat['id'] ?>">
                <td>
                    <?=$photocat['name'] ?>
                </td>
                <td>
                    <?=$photocat['sort_order'] ?>
                </td>
                <td>
                    <?=$photocat['folder'] ?>
                </td>
                <td>
                    <div class="btn-group">
                    <a href ="/admin/photo/add/<?=$photocat['id'] ?>" class="btn btn-primary" title="Додати фотографії"><i class="fa fa-plus"></i></a>
                    <a href ="/admin/photo/edit/<?=$photocat['id'] ?>" class="btn btn-info" title="Редагувати список фото"><i class="fa fa-edit"></i></a>
					
                    <a href ="/admin/photo/update/<?=$photocat['id'] ?>" class="btn btn-warning" title="Редагувати каталог">
						<i class="fa fa-edit"></i>
						Редагувати каталог
					</a>
                    <a href="#modal" data-toggle='modal' data-link="/admin/photocat/delete/<?=$photocat['id'] ?>" class="btn btn-danger delete">
                        <i class="fa fa-times"></i> Видалити каталог
                    </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div style="display: none;" class="modal fade" id="modal" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header borderless">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title">Видалити каталог фотографій?</h4>
                </div>
                <div class="modal-body">
                    <p>Видалення каталогу призведе до видалення всіх фотографій, що в ньому, к хуям собачим</p>
                    <form method="post" class = "delete_form">
                        <input type="hidden" name="id" class="id-modal" />
                        <button type="submit" name ="submit" class="btn btn-danger">
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
        $('.delete').on("click", function () {
            var link = $(this).closest("a.delete");
            var	url = link.data("link");
            var tr = $(this).closest("tr");
            var	id = tr.data("id")
            $('.delete_form').attr("action", url);
            $('.id-modal').attr("value", id);
        });
    </script>
<?php
adminend();
?>