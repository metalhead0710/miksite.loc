<?php


class CategoryController
{
    public function actionCategory($url)
    {
        //User::checkLogged();
        $categories = Category::getCategoriesList();
        $category_view = Category::getCategoryByUrl($url);
		
        require_once(ROOT . '/views/category/view.php');

        return $category_view;
    }
}