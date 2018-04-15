<?php
class AdminHitsController
{
	public function actionIndex ()
	{
		User::checkLogged();
		
		$hits = Hit::getAllHits();
		
		require_once(ROOT . '/views/admin/admin_hits/index.php');
		return true;
	}
	
	public function actionCreate()
	{
		User::checkLogged();
		$categories = Category::getCategoriesList();
		
		if (isset($_POST['submit'])) 
		{
            $title = $_POST['title'];
            $title_ru = $_POST['title_ru'];
            $picture = $_FILES["picture"];
			$categoryId = $_POST['categoryId'];
			$specs = $_POST['specs'];
			$specs_ru = $_POST['specs_ru'];
			$price = $_POST['price'];
            include_once('img_func.php');
            if(!empty($picture['name'])) {
            	$picture['name'] = uniqid('hit') . '.jpg';
                $check = can_upload($picture);
                if($check === true){
                    $destiny = ROOT . '/upload/images/hits/';
                    make_upload($picture, $destiny);
                    
                    $src= ROOT . '/upload/images/hits/' .$picture['name'];
		            $dest = ROOT . '/upload/images/hits/thumbs/' .$picture['name'];
		            $desired_width = 250;
		            make_thumb($src, $dest, $desired_width);
                }
                else{
                    echo "<strong>$check</strong>";
                }
            }
			Hit::createHit($title, $title_ru, $picture['name'], $categoryId, $specs, $specs_ru, $price);

			header("Location: /admin/hits");
            
        }
		
		require_once(ROOT . '/views/admin/admin_hits/create.php');
		return true;
	}
	
	public function actionUpdate($id)
    {
		User::checkLogged();
		$hit = Hit::getOne($id);
        $categories = Category::getCategoriesList();
        if (isset($_POST['submit']))
		{
            $title = $_POST['title'];
            $title_ru = $_POST['title_ru'];
            $picture = $_FILES["picture"];
			$categoryId = $_POST['categoryId'];
			$specs = $_POST['specs'];
			$specs_ru = $_POST['specs_ru'];
			$price = $_POST['price'];
            include_once('img_func.php');
            if(!empty($picture['name'])) {
            	$picture['name'] = uniqid('hit') . '.jpg';
                $check = can_upload($picture);
                if($check === true){
                    $destiny = ROOT . '/upload/images/hits/';
                    
                    $oldfile = ROOT . '/upload/images/hits/' . $hit['picture'];
					$oldthumb = ROOT . '/upload/images/hits/thumbs/' . $hit['picture'];
					if($hit['picture'] != '')
					{
						unlink($oldfile);
						unlink($oldthumb);
					}
                    
                    make_upload($picture, $destiny);
                    
                    $src= ROOT . '/upload/images/hits/' .$picture['name'];
		            $dest = ROOT . '/upload/images/hits/thumbs/' .$picture['name'];
		            $desired_width = 250;
		            make_thumb($src, $dest, $desired_width);
                }
                else{
                    echo "<strong>$check</strong>";
                }
            }
			else
			{
				$picture['name'] = $hit['picture'];
			}
			Hit::updateHit($id, $title, $title_ru, $picture['name'], $categoryId, $specs, $specs_ru, $price);
			header("Location: /admin/hits");
		}
        require_once(ROOT . '/views/admin/admin_hits/update.php');
        
        return true;
    }
	
	public function actionDelete($id)
	{
		User::checkLogged();
		$hit = Hit::getOne($id);
		
		if (isset($_POST['submit'])) 
		{
            $id = $_POST['id'];
            
			if (!empty($hit['picture']))
			{
				$picture = ROOT . '/upload/images/hits/' . $hit['picture'];
				unlink($picture);
            }
			
			Hit::deleteHit($id);
			header("Location: /admin/hits");
        }
		return true;
	}
}

?>