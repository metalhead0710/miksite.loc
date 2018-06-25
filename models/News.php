<?php

class News
{
    public $title;
    public $date;
    public $isVisible;
    public $content;
    public $pic;

    public static function getAll()
    {
        $db = Db::getConnection();
        $query = $db->query("SELECT * from news order by date desc");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $news= $query->fetchAll();
        return $news;
    }

    public static function getAllVisible()
    {
        $db = Db::getConnection();
        $query = $db->query("SELECT * from news where isVisible = true order by date desc");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $news= $query->fetchAll();
        return $news;
    }

    public static function getThreeLast()
    {
        $db = Db::getConnection();
        $query = $db->query("SELECT * from news  where isVisible = true order by date desc limit 3");
        $query->setFetchMode(PDO::FETCH_CLASS, News::class);
        $news= $query->fetchAll();
        return $news;
    }

    public static function getOneById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * from news where id=:id';
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->setFetchMode(PDO::FETCH_CLASS, self::class);
        $query->execute();
        $new= $query->fetch();
        return $new;
    }

    public static function createNew($title, $title_ru, $url, $url_ru, $date, $isVisible, $content, $content_ru, $pic)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO news (title, title_ru,url, url_ru, date, isVisible, content, content_ru, pic)
        VALUES (:title, :title_ru, :url, :url_ru, :date, :isVisible, :content, :content_ru, :pic)';
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':title_ru', $title_ru, PDO::PARAM_STR);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':url_ru', $url_ru, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':isVisible', $isVisible, PDO::PARAM_INT);
        $result->bindParam(':content', $content, PDO::PARAM_STR);
        $result->bindParam(':content_ru', $content_ru, PDO::PARAM_STR);
        $result->bindParam(':pic', $pic, PDO::PARAM_STR);
        $res = $result->execute();
        $db = null;
        return $res;
    }

    public static function update($id, $title, $title_ru, $url, $url_ru, $date, $isVisible, $content, $content_ru, $pic)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE news SET
                    title = :title,
                    title_ru = :title_ru,
                    url = :url,
                    url_ru = :url_ru,
                    date = :date,
                    isVisible = :isVisible,
                    content = :content,
                    content_ru = :content_ru,
                    pic = :pic
                WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':title_ru', $title_ru, PDO::PARAM_STR);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':url_ru', $url_ru, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':isVisible', $isVisible, PDO::PARAM_INT);
        $result->bindParam(':content', $content, PDO::PARAM_STR);
        $result->bindParam(':content_ru', $content_ru, PDO::PARAM_STR);
        $result->bindParam(':pic', $pic, PDO::PARAM_STR);
        $res = $result->execute();
        $db = null;
        return $res;
    }

    public static function getNewByUrl($url)
    {

        $db = Db::getConnection();
        $sql = 'SELECT * FROM news WHERE url = :url or url_ru = :url';
        $result = $db->prepare($sql);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_CLASS, self::class);
        $result->execute();
        $db = null;
        return $result->fetch();
    }

    public static function checkName($url, $url_ru)
    {
        $db = Db::getConnection();
        $sql = 'select url, url_ru from news where (url = :url) or (url_ru = :url_ru)';
        $result = $db->prepare($sql);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':url_ru', $url_ru, PDO::PARAM_STR);
        $res = $result->execute();
        if ($result->rowCount() != 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
	public static function getNewsUrls($url)
    {
        
        $db = Db::getConnection();
        $sql = 'SELECT url, url_ru FROM news WHERE url = :url or url_ru = :url';
		$result = $db->prepare($sql);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
		$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }

    public static function deleteNew($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM news WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $res = $result->execute();
        $db = null;
        return $res;
    }

}