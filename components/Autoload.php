<?php
/**
 * ф-ця __autoload для автоматичного підключення класів
 */
function __autoload($class_name)
{
    // папки, у яких можуть бути потрібні класи
    $array_paths = array(
        '/models/',
        '/components/',
        '/controllers/',
    );
    // проходимо по масиву папок
    foreach ($array_paths as $path) {
        // формуєм ім'я та шлях до класів
        $path = ROOT . $path . $class_name . '.php';
        // якщо таке є, то підключаєм його
        if (is_file($path)) {
            include_once $path;
        }
    }	
}
