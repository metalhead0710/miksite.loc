<?php
if (isset($_SESSION['user'])) {
    header("Location: /admin/");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вхід у систему</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <script src="/template/js/jquery.js"></script>
	<script src="/template/js/bootstrap.min.js"></script>
    <style>
		body {
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #eee;
		}
		.form-signin {
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
		  margin-bottom: 10px;
		}
		.form-signin .checkbox {
		  font-weight: normal;
		}
		.form-signin .form-control {
		  position: relative;
		  height: auto;
		  -webkit-box-sizing: border-box;
			 -moz-box-sizing: border-box;
				  box-sizing: border-box;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="text"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
	</style>
</head>
<body>
<div class="container">
  <form class="form-signin" method = "post">
	<h2 class="form-signin-heading text-center">Вхід у систему</h2>
	<label for="inputLogin" class="sr-only">Логін</label>
	<input id="inputLogin" class="form-control" type="text" name = "login" placeholder = "Логін" required autofocus>
	<label for="inputPassword" class="sr-only">Пароль</label>
	<input id="inputPassword" class="form-control" type="password" name = "password" placeholder = "Пароль" required>
	<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Увійти</button>
  </form>
</div>
</body>

</html>