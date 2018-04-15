<?php

return array(
    /*
        адмін панелька
    */

    //Хіти продаж
    'admin/hits/create' => 'adminHits/create',
    'admin/hits/update/([0-9]+)' => 'adminHits/update/$1',
    'admin/hits/delete/([0-9]+)' => 'adminHits/delete/$1',
    'admin/hits' => 'adminHits/index',

    //Управління банерами
    'admin/banners/add' => 'adminBanner/add',
    'admin/banners/remove/([1-9]+)' => 'adminBanner/remove/$1',
    'admin/banners' => 'adminBanner/index',

    // Управління категоріями
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category/upload' => 'adminCategory/upload',
    'admin/category' => 'adminCategory/index',

    // Управління каталогами фотографій
    'admin/photocat/create' => 'adminPhoto/create',
    'admin/photocat/delete/([0-9]+)' => 'adminPhoto/delete/$1',
    'admin/photocat' => 'adminPhoto/index',

    // Управління фотографіями
    'admin/photo/add/([0-9]+)' => 'adminPhoto/add/$1',
    'admin/photo/edit/([0-9]+)' => 'adminPhoto/edit/$1',
    'admin/photo/update/([0-9]+)' => 'adminPhoto/update/$1',
    'admin/photo/delete/([0-9]+)' => 'adminPhoto/deleteOnePhoto/$1',
    'admin/photo/deletemassive/([0-9]+)' => 'adminPhoto/deleteMassivePhoto/$1',
    'admin/photo' => 'adminPhoto/index',

    //Редагувати контакти
    'admin/contacts' => 'adminContacts/update',

    //Редагувати контакти
    'admin/socials' => 'adminSocials/update',

    //головна сторінка одміна, вхід вихід

    'admin' => 'admin/index',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    /*
        Головний сайт
    */

    // Фото
    'photos/showmore/(\d+)/(\d+)' => 'home/showmore/$1/$2',
    'photos/([a-z]+)' => 'home/view/$1',
    'photos' => 'home/photoIndex',

    //Контакти
    'contacts' => 'home/contacts',
    'emailus' => 'home/emailUs',
    'order' => 'home/order',
    // Головна сторінка
    'category/([a-z]+)' => 'category/category/$1',
    'hits' => 'home/hits',
    'uploaded?' => 'home/upload',
    '' => 'home/index',
);
