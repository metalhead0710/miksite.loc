<?php
$page='Редагувати список фотографій';
adminhead($page);
?>
<div class="page-header">
    <h1>Редагувати список фотографій</h1>
    <h4 class="text-muted">тут можна додавати, редагувати та видаляти фотографії у папці <?=$photocat['name']?></h4>
</div>
<div class="btn-group pull-right">
	<a class="btn btn-default" href="/admin/photocat"><i class="fa fa-long-arrow-left"></i> Назад</a>
    <a href="/admin/photo/add/<?=$photocat['id']?>" class="btn btn-primary "><i class="fa fa-plus"></i> Додати фотографії</a>
    <button class="btn btn-danger pull-right submit-btn" type="submit" style="display:none"> Видалити вибрані фото</button>
</div>
<div class="container mg-tp-50 mg-bt-50" style="width:90%">
    <form class="forma" method="post" action="/admin/photo/deletemassive/<?=$photocat['id']?>">
        <div class="box">
            <?php foreach ($photos as $photo) :?>
            <div class="box-item" data-id="<?=$photo['id']?>">
                <input type="checkbox" name="pic[]" value="<?=$photo['id']?>" class="check" />
                <img src="/upload/photos/<?=$photocat['folder']?>/thumbs/<?=$photo['file']?>" alt="..." class="">
                <div class="delete-link-wrapper">
                    <a href="#modal" class="delete-link text-danger" data-toggle="modal" data-deletelink = "/admin/photo/delete/<?=$photo['id']?>">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </form>
</div>
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
<script>
    $('.box-item').hover(function() {
        var id = $(this).data("id");
        $('div[data-id='+id+'] div').slideDown(200);
    });
    $('.box-item').mouseleave(function() {
        var id = $(this).data("id");
        $('div[data-id='+id+'] div').slideUp(200);
    });
    $('.delete-link').on("click", function () {
        var	url = $(this).data("deletelink");
        $('.delete_form').attr("action", url);
    });
    $('.forma :checkbox').change(function() {
        if (this.checked) {
            $('.submit-btn').show(50);
        }
    });
    $(".submit-btn").click(function(){
        $(".forma").submit();
    })
</script>
<?php
adminend();
?>