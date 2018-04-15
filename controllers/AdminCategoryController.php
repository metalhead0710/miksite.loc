<?php

class AdminCategoryController
{
	public function actionIndex ()
	{
		$userId = User::checkLogged();
		$categories = Category::getCategoriesInfo();
        require_once(ROOT . '/views/admin/admin_category/index.php');
		return true;
	}
	
	public function actionCreate()
	{
		User::checkLogged();
		
		if (isset($_POST['submit'])) 
		{
            $name = $_POST['name'];
            
            $title = $_POST['title'];
            $title_ru = $_POST['title_ru'];
            
            $meta_keywords = $_POST['meta_keywords'];
            $meta_keywords_ru = $_POST['meta_keywords_ru'];     
            
            $meta_description = $_POST['meta_description'];       
            $meta_description_ru = $_POST['meta_description_ru'];       
			
			$url = Translit::make_lat($name);
			
            $name_ru = $_POST['name_ru'];
            
            $url_ru = Translit::make_lat($name_ru);
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            $text = $_POST['text'];
            $text_ru = $_POST['text_ru'];
            $picture = $_FILES["picture"];
			if (Category::checkName($url, $url_ru) == FALSE)
			{
				die("Виберіть інше ім'я для категорії");
			}
            include_once('img_func.php');
            if($picture['name'] != '') {
            	$picture['name'] = uniqid('category') . '.jpg';
                $check = can_upload($picture);

                if($check === true){
                    $destiny = ROOT . '/upload/images/categories/';
                    make_upload($picture, $destiny);
                }
                else{
                    echo "<strong>$check</strong>";
                }


            $src= ROOT . '/upload/images/categories/' .$picture['name'];


            $dest = ROOT . '/upload/images/categories/thumbs/' .$picture['name'];

            $desired_width = 250;
            make_thumb($src, $dest, $desired_width);
            }
			Category::createCategory(
				$name, 
				$title, 
				$title_ru, 
				$meta_keywords, 
				$meta_keywords_ru, 
				$meta_description, 
				$meta_description_ru, 
				$url, 
				$name_ru, 
				$url_ru, 
				$sortOrder, 
				$status, 
				$text, 
				$text_ru, 
				$picture['name'] 
			);
            header("Location: /admin/category");
        }
		
		
		require_once (ROOT . '/views/admin/admin_category/create.php');
		return true;

	}
	
	public function actionUpdate($id)
    {
		User::checkLogged();
		
        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {
            
            $name = $_POST['name'];
            
            $title = $_POST['title'];
            $title_ru = $_POST['title_ru'];
            
            $meta_keywords = $_POST['meta_keywords'];
            $meta_keywords_ru = $_POST['meta_keywords_ru'];     
            
            $meta_description = $_POST['meta_description'];       
            $meta_description_ru = $_POST['meta_description_ru'];
			$url = Translit::make_lat($name);
			
            $name_ru = $_POST['name_ru'];
            
            $url_ru = Translit::make_lat($name_ru);
            
			$sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            $text = $_POST['text'];
			$text_ru = $_POST['text_ru'];
            $picture = $_FILES["picture"];
			
            if($picture['name'] == '') {
                $picture['name'] = $category['pic'];
            }
			else 
			{
				//make this shit unique
				$picture['name'] = uniqid('category') . '.jpg';
				
				
				include_once('img_func.php');
				if(isset($picture)) {
					$check = can_upload($picture);

					if($check === true){
						$destiny = ROOT . '/upload/images/categories/';
						$oldfile = ROOT . '/upload/images/categories/' . $category['pic'];
						$oldthumb = ROOT . '/upload/images/categories/thumbs/' . $category['pic'];
						if($category['pic'] != '')
						{
							unlink($oldfile);
							unlink($oldthumb);
						}
						make_upload($picture, $destiny);
					}
					else{
						echo "<strong>$check</strong>";
					}


				$src= ROOT . '/upload/images/categories/' . $picture['name'];


				$dest = ROOT . '/upload/images/categories/thumbs/' . $picture['name'];

				$desired_width = 250;
				make_thumb($src, $dest, $desired_width);
				}
			}
			
			
            Category::updateCategoryById(
	            $id, 
	            $name,
	            $title, 
				$title_ru, 
				$meta_keywords, 
				$meta_keywords_ru, 
				$meta_description, 
				$meta_description_ru,  
	            $url, 
	            $name_ru, 
	            $url_ru, 
	            $sortOrder, 
	            $status, 
	            $text, 
	            $text_ru, 
	            $picture['name']
            );
            
			

            header("Location: /admin/category");
        }

        require_once(ROOT . '/views/admin/admin_category/update.php');
        
        return true;
    }
	
	public function actionDelete($id)
	{
		User::checkLogged();
		

		
		if (isset($_POST['submit'])) 
		{
            $id = $_POST['id'];
            $category = Category::getCategoryById($id);
            $oldfile = ROOT . '/upload/images/categories/' . $category['pic'];
            $oldthumb = ROOT . '/upload/images/categories/thumbs/' . $category['pic'];
            unlink($oldfile);
            unlink($oldthumb);
			Category::deleteCategory($id);
			header("Location: /admin/category");
        }
		return true;
		
	}
}
	
