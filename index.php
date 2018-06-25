<?php

// FRONT CONTROLLER
//помилки
INI_SET('DISPLAY_ERRORS', 0);
ERROR_REPORTING(E_ALL^E_NOTICE);

session_start();

// підключення файликів програми

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');
require_once(ROOT.'/components/Dict.php');
$lang = Url::getLang();
if($lang) {
	$_SESSION['lang'] = trim(strip_tags($lang));
	$date = time() + 30*24*60*60;
	setcookie('lang',trim(strip_tags($lang)),$date);
}
else if (@$_COOKIE['lang']) {
	$_SESSION['lang'] = $_COOKIE['lang'];
}
else {
	$_SESSION['lang'] = 'ua';
}

$dict = parse_ini_file( ROOT . '/lang/' . $_SESSION['lang'].'.ini');

// стартим Router
$router = new Router();
$router->run();

// Функції на вушки

function head($page, $style = null, $banners = null, $meta_keys = null, $meta_description = null)
{
    include ROOT. '/views/layouts/header.php';
}
function footer()
{
    include ROOT. '/views/layouts/footer.php';
}
function scripts()
{
    include ROOT. '/views/layouts/scripts.php';
}
function endpage()
{
    include ROOT. '/views/layouts/end.php';
}

function adminhead($page)
{
    include ROOT. '/views/layouts/admin-header.php';
}
function adminscripts()
{
    include ROOT. '/views/layouts/admin-scripts.php';
}
function adminend()
{
    include ROOT. '/views/layouts/admin-end.php';
}
