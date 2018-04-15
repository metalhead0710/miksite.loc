<?php
$page='Редагувати контакти';
adminhead($page);
?>

<div class="page-header">
	<h1>Редагувати контакти</h1>
	<h4 class="text-muted"> Тут можна змінити контакти у разі чого</h4>
</div>

<form method="post">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#ua" data-toggle="tab">Українська</a></li>
        <li class=""><a href="#ru" data-toggle="tab">Російська</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="ua">
            <div class="form-group">
                <label for="address">Адреса</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-location-arrow"></i>
                    </span>
                    <input class="form-control" id="address" name="address" placeholder="Адреса" type="text" value="<?=$contacts['address']; ?>">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="ru">
            <div class="form-group">
                <label for="address">Адреса</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-location-arrow"></i>
                    </span>
                    <input class="form-control" id="address" name="address_ru" placeholder="Адреса" type="text" value="<?=$contacts['address_ru']; ?>">
                </div>
            </div>
        </div>
    </div>
	<div class="form-group">
		<label for="Email">Email</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-envelope-o"></i>
			</span>
			<input class="form-control" id="Email" name="email" placeholder="Email" type="text" value="<?=$contacts['email']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="tel1">Телефон</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-phone"></i>
			</span>
			<input class="form-control" id="tel1" name="tel1" placeholder="Телефон" type="text" value="<?=$contacts['tel1']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="tel2">Ще один телефон</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-mobile"></i>
			</span>
			<input class="form-control" id="tel2" name="tel2" placeholder="Телефон мобільний" type="text" value="<?=$contacts['tel2']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="tel3">I ще один телефон</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-mobile"></i>
			</span>
			<input class="form-control" id="tel3" name="tel3" placeholder="Телефон мобільний" type="text" value="<?=$contacts['tel3']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="Map">Карта</label>
		<div class="input-group">
			<span class="input-group-addon">
				<i class="fa fa-location-arrow"></i>
			</span>
			<textarea class="form-control" id="map" name="map" placeholder="Карта" type="text" ><?=$contacts['map']; ?></textarea>
		</div>
	</div>



		<button type="submit" name="submit" class="btn btn-primary">
		<i class="fa fa-check"></i>
			Зберегти
		</button>
	</div>
</form>

<?php
adminscripts();
adminend();
?>