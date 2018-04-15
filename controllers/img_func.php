<?php
/*
Функції для завантаження картинок
*/
function can_upload($picture){
    if($picture['name'] == '')
        return '';
    if($picture['size'] == 0)
        return 'Файл надто великий.';
    $getMime = explode('.', $picture['name']);
    $mime = strtolower(end($getMime));
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

    if(!in_array($mime, $types))
        return 'Недопустимий тип файлу.';
    return true;
}

function make_upload($picture, $destiny){
    copy($picture['tmp_name'], $destiny . $picture['name']);
}
function make_thumb($src, $dest, $desired_width) {
    /* читаєм сорс картинку */
    $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);
    /* знаходим висоту під пропорцію ширини  */
    $desired_height = floor($height * ($desired_width / $width));
    /* створюєм нове "віртуальне" зображення */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
    /* конвертуєм ... */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
    /* створюєм фізичне зображення */
    imagejpeg($virtual_image, $dest);
}
function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        echo ("Не можу знайти папку $dirPath");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}