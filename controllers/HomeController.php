<?php

class HomeController
{

    public function actionIndex()
    {
        //User::checkLogged();
		$banner = Banner::getMainBanner();
        $categories = Category::getCategoriesList();
        $news = News::getThreeLast();
        $contacts = Contacts::getContactsList();
        $maintext = Maintext::getText();

        require_once(ROOT . '/views/home/index.php');

        return $categories;
    }

    public function actionHits()
    {
        //User::checkLogged();
        $hits = Hit::getAllHits();

        require_once(ROOT . '/views/home/hits.php');
        return true;
    }

	public function actionPhotoIndex()
    {
        //User::checkLogged();
        $photoCats = Photos::getPhotoCats();

        require_once(ROOT . '/views/photos/index.php');
        return true;
    }

    public function actionView($url)
    {
        //User::checkLogged();
        $category = Photos::getCatagoryByUrl($url);

        $categoryId = intval($category['id']);
        $count = Photos::getPhotosCount($categoryId);
        $photos = Photos::getPhotosByCategory($categoryId);
        require_once(ROOT . '/views/photos/view.php');

        return true;
    }

    public function actionShowmore($categoryId, $num)
    {
        //User::checkLogged();
        $category = Photos::getCatNameById($categoryId);

        $photoList = Photos::showMore($categoryId, $num);

        foreach ($photoList as $photo) {
            //$photoname = ($_SESSION['lang'] == 'ua') ? $photo['name'] : $photo['name_ru'];
        echo '<div class="photo-item">
            <a class="photo-link" href="/upload/photos/' .$category['folder'].'/'.$photo['file'].'">
                <img class="img-responsive" src="/upload/photos/'.$category['folder'].'/thumbs/'.$photo['file'].'" />
            <table class="table">
				<tr>
					<th>' . Dict::_('NAME') . '</th>
					<td>' . $photo['name'] . '</td>
				</tr>
				<tr>
					<!--<th>' . Dict::_('MODEL') . '</th>
					<td>' . $photo['model'] . '</td>-->
				</tr>
				<tr>
					<th>' . Dict::_('DIMS') . '</th>
					<td>' . $photo['dimension'] . '</td>
				</tr>
			</table>
            </a></div>
        ';
        }
        return true;
    }

    public function actionContacts()
    {
        //User::checkLogged();
        $contact = Contacts::getContactsList();

		// вушка
        require_once(ROOT . '/views/home/contacts.php');
        return true;
    }

	public function actionEmailUs()
	{
		$username = $_POST['username'];
        $email = $_POST['email'];
        $content = $_POST['content'];
        if (!empty($username) && !empty($email) && !empty($content))
        {
			$contact = Contacts::getEmail();
			$adminEmail = $contact['email'];
	        $message = "Від {$username}. Email: {$email}. Текст: {$content}.";
	        $subject = 'Із сайту';
	        $result = mail($adminEmail, $subject, $message);

			if ($result)
			{
				echo "<div class='alert alert-success modal' style='width: 380px;margin: 0 auto; display:block;bottom:initial; overflow-y:hidden'><button class='close' data-dismiss='alert'><i class='fa fa-times'></i></button>" . Dict::_('SMSGSUCCESS') . "!</div>";
				return true;
			}
			else
			{
				echo "<div class='alert alert-danger modal' style='width: 380px;margin: 0 auto; display:block;bottom:initial; overflow-y:hidden'><button class='close' data-dismiss='alert'><i class='fa fa-times'></i></button>" . Dict::_('SMSGFAIL') . "!</div>";
				return false;
			}
		}
		else
		{
			echo "<div class='alert alert-danger modal' style='width: 380px;margin: 0 auto; display:block;bottom:initial; overflow-y:hidden'><button class='close' data-dismiss='alert'><i class='fa fa-times'></i></button>Заповність всі поля</div>";
			exit();
		}


    return true;
	}

	public function actionOrder()
	{

		$id = $_POST['id'];
		$name = $_POST['name'];
		$phone  = $_POST['phone'];

		if (!empty($name) && !empty($phone))
		{
			$contact = Contacts::getEmail();
			$adminEmail = $contact['email'];
			$hit = Hit::getOne($id);
			$hit = $hit['title'];
			$message = "Користувач {$name} замовив у нас об'єкт {$hit} . Перезвоніть йому на телефон {$phone}";
	        $subject = 'Замовлення';
	        $result = mail($adminEmail, $subject, $message);
			if ($result)
			{
				echo "<div class='alert alert-success modal' style='width: 380px;margin: 0 auto; display:block;bottom:initial; overflow-y:hidden'><button class='close' data-dismiss='alert'><i class='fa fa-times'></i></button>" . Dict::_('SORDERSUCCESS') . "!</div>";
				return true;
			}
			else
			{
				echo "<div class='alert alert-danger modal' style='width: 380px;margin: 0 auto; display:block;bottom:initial; overflow-y:hidden'><button class='close' data-dismiss='alert'><i class='fa fa-times'></i></button>" . Dict::_('SORDERFAIL') . "!</div>";
				return false;
			}
		}
		else
		{
			echo "<div class='alert alert-danger modal' style='width: 380px;margin: 0 auto; display:block;bottom:initial; overflow-y:hidden'><button class='close' data-dismiss='alert'><i class='fa fa-times'></i></button>Заповніть всі поля</div>";
			exit();
		}
        return true;
	}

	public function actionNews() {
        $news = News::getAllVisible();

        require_once(ROOT . '/views/news/index.php');
    }

    public function actionNewsView($url)
    {
        $new = News::getNewByUrl($url);

        require_once(ROOT . '/views/news/view.php');
    }

	public function actionUpload()
    {
    	//User::checkLogged();
        function getex($filename) {
            return end(explode(".", $filename));
        }
        if($_FILES['upload'])
        {
            if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
            {
                $message = "Ви не вибрали файл";
            }
            else if ($_FILES['upload']["size"] == 0 OR $_FILES['upload']["size"] > 7000000)
            {
                $message = "Завеликий розмір файлу (не більше як 7Мб)";
            }
            else if (($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
            {
                $message = "Картинки мають бути або JPG або PNG.";
            }
            else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
            {
                $message = "Якась поєбень, хз чого, чесно";
            }
            else{
                $name =rand(1, 1000).'-'.md5($_FILES['upload']['name']).'.'.getex($_FILES['upload']['name']);
                move_uploaded_file($_FILES['upload']['tmp_name'], "upload/uploaded/".$name);
                $full_path = 'http://mikbud.com/upload/uploaded/'.$name;
                //$full_path = 'http://mvc.com/upload/uploaded/'.$name;
                $message = "Файл ".$_FILES['upload']['name']." завантажено";
                $size=@getimagesize('upload/uploaded/'.$name);
                if($size[0]<50 OR $size[1]<50){
                    unlink('upload/uploaded/'.$name);
                    $message = "Файл не є зображенням";
                    $full_path="";
                }
            }
            $callback = $_REQUEST['CKEditorFuncNum'];
            echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$callback.'", "'.$full_path.'", "'.$message.'" );</script>';
        }
        return true;
    }

}