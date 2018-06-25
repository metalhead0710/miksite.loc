<?php

class AdminNewsController
{
    public function actionIndex()
    {
        User::checkLogged();
        $news = News::getAll();
        require_once(ROOT . '/views/admin/admin_news/index.php');
        return true;
    }

    public function actionCreate()
    {
        User::checkLogged();
        if (isset($_POST['submit']))
        {
            $title = $_POST['title'];
            $title_ru = $_POST['title_ru'];
            $url = Translit::make_lat($title);
            $url_ru = Translit::make_lat($title_ru);
            $newDate = new DateTime();
            $date = $newDate->format('Y-m-d H:i:s');
            $isVisible = $_POST['isVisible'];
            $content = $_POST['content'];
            $content_ru = $_POST['content_ru'];
            $picture = $_FILES["picture"];

            if (News::checkName($url, $url_ru) == FALSE)
            {
                die("Виберіть інший заголовок для новини");
            }

            include_once('img_func.php');
            if ($picture['name'] != '') {
                $picture['name'] = uniqid('news') . '.jpg';
                $check = can_upload($picture);

                if($check === true){
                    $destiny = ROOT . '/upload/images/news/';
                    make_upload($picture, $destiny);
                }
                else{
                    echo "<strong>$check</strong>";
                }
                $src= ROOT . '/upload/images/news/' .$picture['name'];
                $dest = ROOT . '/upload/images/news/thumbs/' .$picture['name'];

                $desired_width = 250;
                make_thumb($src, $dest, $desired_width);
            }

            News::createNew(
                $title,
                $title_ru,
                $url,
                $url_ru,
                $date,
                $isVisible,
                $content,
                $content_ru,
                $picture['name']
            );
            header("Location: /admin/news");
        }
        require_once (ROOT . '/views/admin/admin_news/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        User::checkLogged();
        $new = News::getOneById($id);
        if (isset($_POST['submit']))
        {
            $title = $_POST['title'];
            $title_ru = $_POST['title_ru'];
            $url = Translit::make_lat($title);
            $url_ru = Translit::make_lat($title_ru);
            $newDate = new DateTime();
            $date = $newDate->format('Y-m-d H:i:s');
            $isVisible = $_POST['isVisible'];
            $content = $_POST['content'];
            $content_ru = $_POST['content_ru'];
            $picture = $_FILES["picture"];

            if($picture['name'] == '') {
                $picture['name'] = $new->pic;
            }
            else
            {
                //make this shit unique
                $picture['name'] = uniqid('new') . '.jpg';


                include_once('img_func.php');
                if(isset($picture)) {
                    $check = can_upload($picture);

                    if($check === true){
                        $destiny = ROOT . '/upload/images/news/';
                        $oldfile = ROOT . '/upload/images/news/' . $new->pic;
                        $oldthumb = ROOT . '/upload/images/news/thumbs/' . $new->pic;
                        if($new->pic != '')
                        {
                            unlink($oldfile);
                            unlink($oldthumb);
                        }
                        make_upload($picture, $destiny);
                    }
                    else{
                        echo "<strong>$check</strong>";
                    }


                    $src= ROOT . '/upload/images/news/' . $picture['name'];


                    $dest = ROOT . '/upload/images/news/thumbs/' . $picture['name'];

                    $desired_width = 250;
                    make_thumb($src, $dest, $desired_width);
                }
            }

            News::update(
                $id,
                $title,
                $title_ru,
                $url,
                $url_ru,
                $date,
                $isVisible,
                $content,
                $content_ru,
                $picture['name']
            );
            header("Location: /admin/news");
        }
        require_once (ROOT . '/views/admin/admin_news/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        User::checkLogged();

        if (isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $new = News::getOneById($id);

            $oldfile = ROOT . '/upload/images/news/' . $new->pic;
            $oldthumb = ROOT . '/upload/images/news/thumbs/' . $new->pic;
            if (is_file($oldfile)) {
	            unlink($oldfile);
            }
            if (is_file($oldthumb)) {
	            unlink($oldthumb);
            }

            News::deleteNew($id);
            header("Location: /admin/news");
        }
        return true;

    }
}