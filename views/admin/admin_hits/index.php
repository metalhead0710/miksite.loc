<?php
$page='Редагувати хіти продаж';
adminhead($page);
?>

<div class="page-header">
	<h1>Управління хітами продаж</h1>
	<h4 class="text-muted">тут можна додавати, редагувати та видаляти хіти продаж</h4>
</div>
<a href="hits/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Створити новий</a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Назва</th>
				<th>Картинка</th>
				<th>Категорія</th>
				<th>Специфікація</th>
				<th>Ціна</th>
				<th>Дії</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($hits as $hit) :?>
			<tr data-id="<?=$hit['id'] ?>">
				<td>
					<?=$hit['title'] ?>
				</td>
				<td>
					<img src="/upload/images/hits/thumbs/<?=$hit['picture'] ?> " style = "width: 100px;" />
				</td>
				<td>
					<?=Category::getCategoryById($hit['categoryId'])['name']?>
				</td>
				<td>
					<?=iconv_substr($hit['specs'], 0, 500, 'utf-8') ?>
				</td>
				<td>
					<?=$hit['price'] ?>
				</td>
				<td>
					<div class="btn-group-vertical">
					<a href="hits/update/<?=$hit['id'] ?>" title="Редагувати" class="btn btn-primary">
						<i class="fa fa-edit"></i>
					</a> 
					<a href="#modal" data-toggle='modal' title="Видалити" data-link="hits/delete/<?=$hit['id'] ?>" class="btn btn-danger delete">
						<i class="fa fa-times"></i>
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
				<h4 class="modal-title">Видалити категорію?</h4>
			</div>
			<div class="modal-body">
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