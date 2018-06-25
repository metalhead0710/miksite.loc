<?php


class AdminPhotoController {
    public function actionIndex ()
    {
        User::checkLogged();
        $photocats = Photos::getPhotoCats();
        require_once(ROOT . '/views/admin/admin_photo/index.php');
        return true;
    }

    public function actionCreate()
    {
        User::checkLogged();

        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];
            
            $url = Translit::make_lat($name);
            $name_ru = $_POST['name_ru'];
            
            $url_ru = Translit::make_lat($name_ru);
            $sortOrder = intval($_POST['sort_order']);
            $folder = Translit::make_lat($name);
            $picture = $_FILES["picture"];
            $title = $_POST['title'];
            $title_ru = $_POST['title_ru'];
            $keywords = $_POST['keywords'];
            $keywords_ru = $_POST['keywords_ru'];
            $description = $_POST['description'];
            $description_ru = $_POST['description_ru'];

			if (Photos::checkName($url, $url_ru) == FALSE)
			{
				die("Виберіть інше ім'я для категорії");
			}
            if (isset($folder)) {
                if (!file_exists(ROOT . '/upload/photos/' . $folder))
                {
                    mkdir(ROOT . '/upload/photos/' . $folder);
                }
            }
            include_once('img_func.php');
            if(!empty($picture['name'])) {
                $check = can_upload($picture);

                if($check === true){
                    $destiny = ROOT . '/upload/photos/' . $folder . '/';
                    $picture['name'] = uniqid('photocat') . '.jpg';
                    make_upload($picture, $destiny);
                }
                else{
                    echo "<strong>$check</strong>";
                }


            $src= ROOT . '/upload/photos/' . $folder . '/' .$picture['name'];
            if (!file_exists(ROOT . '/upload/photos/' . $folder . '/thumbs/'))
            {
                mkdir(ROOT . '/upload/photos/' . $folder . '/thumbs/');
            }
            $dest = ROOT . '/upload/photos/' . $folder . '/thumbs/' .$picture['name'];

            $desired_width = 350;
            make_thumb($src, $dest, $desired_width);
			}
            Photos::createCategory(
                $name,
                $url,
                $name_ru,
                $url_ru,
                $sortOrder,
                $folder,
                $picture['name'],
                $title,
                $title_ru,
                $keywords,
                $keywords_ru,
                $description,
                $description_ru
            );

			header("Location: /admin/photocat/");

       }


        require_once (ROOT . '/views/admin/admin_photo/create.php');
        return true;

    }

    public function actionUpdate($id)
    {
        User::checkLogged();
		$photocat = Photos::getCatNameById($id);
        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $url = Translit::make_lat($name);
            $name_ru = $_POST['name_ru'];
            
            $url_ru = Translit::make_lat($name_ru);
            $sortOrder = $_POST['sort_order'];
	        $title = $_POST['title'];
	        $title_ru = $_POST['title_ru'];
	        $keywords = $_POST['keywords'];
	        $keywords_ru = $_POST['keywords_ru'];
	        $description = $_POST['description'];
	        $description_ru = $_POST['description_ru'];
            $picture = $_FILES["picture"];
			include_once('img_func.php');
            if(!empty($picture['name'])) {
                $check = can_upload($picture);

                if($check === true){
                    $destiny = ROOT . '/upload/photos/' . $photocat['folder'] . '/';

                    $picture['name'] = uniqid('photocat') . '.jpg';
                    $oldfile = ROOT . '/upload/photos/' . $photocat['folder'] . '/' . $photocat['pic'];
					$oldthumb = ROOT . '/upload/photos/' . $photocat['folder'] . '/thumbs/' . $photocat['pic'];
					if($photocat['pic'] != '')
					{
						unlink($oldfile);
						unlink($oldthumb);
					}

                    make_upload($picture, $destiny);
                }
                else{
                    echo "<strong>$check</strong>";
                }
            }
            else
            {
				$picture['name'] = $photocat['pic'];
			}

            $src= ROOT . '/upload/photos/' .$photocat['folder'] . '/' .$picture['name'];
            if (!file_exists(ROOT . '/upload/photos/' .$photocat['folder'] . '/thumbs/'))
            {
                mkdir(ROOT . '/upload/photos/' .$photocat['folder'] . '/thumbs/');
            }
            $dest = ROOT . '/upload/photos/' . $photocat['folder'] . '/thumbs/' .$picture['name'];

            $desired_width = 350;
            make_thumb($src, $dest, $desired_width);

            Photos::updateCategory($id, $name, $url, $name_ru, $url_ru, $sortOrder, $picture['name'],  $title, $title_ru, $keywords, $keywords_ru, $description, $description_ru);


            header("Location: /admin/photocat/");

       }


        require_once (ROOT . '/views/admin/admin_photo/update.php');
        return true;

    }

    public function actionDelete($id)
    {
        User::checkLogged();

        if (isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $photocat = Photos::getCatNameById($id);
            $dirPath = ROOT . '/upload/photos/' . $photocat['folder'];
            include_once('img_func.php');
            deleteDir($dirPath);

            Photos::deleteCategory($id);

            header("Location: /admin/photocat");
        }
        return true;

    }


    public function actionAdd($id)
    {
        User::checkLogged();
        $photocat = Photos::getCatNameById($id);

        if (isset($_POST['submit']))
        {
        	include_once('img_func.php');
            $folder = $photocat['folder'];
            $picture = $_FILES["picture"];
            $total = count($picture['name']);
			
			if (!file_exists(ROOT . '/upload/photos/' .$photocat['folder'] . '/thumbs/'))
            {
                mkdir(ROOT . '/upload/photos/' .$photocat['folder'] . '/thumbs/');
            }
			
            for($i=0; $i<$total; $i++) 
            {
	            if (isset($folder)) {
	                if (!file_exists(ROOT . '/upload/photos/' . $folder))
	                {
	                    mkdir(ROOT . '/upload/photos/' . $folder);
	                }
	            }
	            if(isset($_FILES["picture"])) {
	                $destiny = ROOT . '/upload/photos/' . $folder . '/';
	                $_FILES["picture"]['name'][$i] = uniqid('photo') . '.jpg';
	                copy($_FILES["picture"]['tmp_name'][$i], $destiny . $_FILES["picture"]['name'][$i]);
	            }

	            $src= ROOT . '/upload/photos/' . $folder . '/' . $_FILES["picture"]['name'][$i];
	            $dest = ROOT . '/upload/photos/' . $folder . '/thumbs/' . $_FILES["picture"]['name'][$i];


	            $desired_width = 350;
	            make_thumb($src, $dest, $desired_width);

	            Photos::addPhoto($_FILES["picture"]['name'][$i], $id);
            }

            header("Location: /admin/photocat/");

        }


        require_once (ROOT . '/views/admin/admin_photo/add.php');
        return true;

    }

    public function actionEdit($id)
    {
        User::checkLogged();
        $photocat = Photos::getCatNameById($id);
        $photos = Photos::getAllPhotosByCategory($id);
        require_once (ROOT . '/views/admin/admin_photo/edit.php');

        return true;

    }

    public function actionEditOne()
    {
    	User::checkLogged();
    	$photo = $_POST['photo'];
        $result = Photos::editOnePhoto($photo);
        if($result)
            $data = Photos::getOnePhoto($photo['photoId']);
            echo json_encode($data);

    	return false;
    }

    public function actionSortOut()
    {
        $ids = $_POST['ids'];
        if(Photos::sortOut($ids)) echo json_encode('success');
    }

    public function actionDeleteOnePhoto($photoId)
    {
        User::checkLogged();
        $photo = Photos::getOnePhoto($photoId);
        $categoryFolder = Photos::getCatNameById($photo['categoryId']);
        $photofile = ROOT . '/upload/photos/' . $categoryFolder['folder'] . '/' . $photo['file'];
        $photothumb = ROOT . '/upload/photos/' . $categoryFolder['folder'] . '/thumbs/' . $photo['file'];
        unlink($photofile);
        unlink($photothumb);

        Photos::deleteOnePhoto($photoId);
        header("Location: /admin/photo/edit/". $photo['categoryId']);
        return true;
    }

    public function actionDeleteMassivePhoto($categoryId)
    {
        User::checkLogged();
        $category = Photos::getCatNameById($categoryId);

        //if (isset($_POST['submit'])) {
            $checked = $_POST['pic'];

            foreach  ($checked as $value) {
                $photo = Photos::getOnePhoto($value);
                $photofile = ROOT . '/upload/photos/' . $category['folder'] . '/' . $photo['file'];
                $photothumb = ROOT . '/upload/photos/' . $category['folder'] . '/thumbs/' . $photo['file'];
                unlink($photofile);
                unlink($photothumb);
                Photos::deleteOnePhoto($value);

            }
        //}

        header("Location: /admin/photo/edit/". $categoryId);
        return true;

    }



}