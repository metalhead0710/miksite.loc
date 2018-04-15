<?php

class Photos
{
    public static function getPhotoCats()
    {
        $db = Db::getConnection();
		$result = $db->query('SELECT * FROM photo_cat order by sort_order asc');
		$i = 0;
        $catsList = array();
        while ($row = $result->fetch()) {
            $catsList[$i]['id'] = $row['id'];
            $catsList[$i]['name'] = $row['name'];
            $catsList[$i]['url'] = $row['url'];
            $catsList[$i]['name_ru'] = $row['name_ru'];
            $catsList[$i]['url_ru'] = $row['url_ru'];
            $catsList[$i]['sort_order'] = $row['sort_order'];
            $catsList[$i]['folder'] = $row['folder'];
            $catsList[$i]['pic'] = $row['pic'];
            $i++;
        }
		$db = null;
        return $catsList;
    }
    public static function getCatNameById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM photo_cat WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
    
    public static function getCatagoryByUrl($url)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM photo_cat WHERE url = :url or url_ru = :url';
        $result = $db->prepare($sql);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
    
    public static function getCategoryUrls($url)
    {
        $db = Db::getConnection();
        $sql = 'SELECT url, url_ru FROM photo_cat WHERE url = :url or url_ru = :url';
        $result = $db->prepare($sql);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
    public static function getPhotosByCategory($categoryId)
    {
        $db = Db::getConnection();
		$sql = 'SELECT id, file FROM photos where categoryId = :id limit 8';
		$res = $db->prepare($sql);
        $res->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $i = 0;
        $photoList = array();
        while ($row = $res->fetch()) {
            $photoList[$i]['id'] = $row['id'];
            $photoList[$i]['file'] = $row['file'];
            $i++;
        }
		$db = null;
        return $photoList;
    }
    public static function getAllPhotosByCategory($categoryId)
    {
        $db = Db::getConnection();
        $sql = 'SELECT id, file FROM photos where categoryId = :id';
        $res = $db->prepare($sql);
        $res->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $i = 0;
        $photoList = array();
        while ($row = $res->fetch()) {
            $photoList[$i]['id'] = $row['id'];
            $photoList[$i]['file'] = $row['file'];
            $i++;
        }
		$db = null;
        return $photoList;
    }
    public static function getOnePhoto($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM photos WHERE id = :id ';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;	
        return $result->fetch();
    }
    public static function getPhotosCount($categoryId)
    {
        $db = Db::getConnection();
        $countSql = 'select COUNT(*) from photos WHERE categoryId = :id';
        $count = $db->prepare($countSql);
        $count->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $count->setFetchMode(PDO::FETCH_NUM);
        $count->execute();
        $count = ($count->fetch());
        $count = $count[0];
		$db = null;
        return $count;
    }
	
	public static function checkName($url, $url_ru)
	{
		$db = Db::getConnection();
		$sql = 'select url, url_ru from photo_cat where (url = :url) or (url_ru = :url_ru)';
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
	
    public static function createCategory($name, $url, $name_ru, $url_ru, $sortOrder, $folder, $pic)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO photo_cat (name, url, name_ru, url_ru, sort_order, folder, pic) '
            . 'VALUES (:name, :url, :name_ru, :url_ru, :sort_order, :folder, :pic)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':name_ru', $name_ru, PDO::PARAM_STR);
        $result->bindParam(':url_ru', $url_ru, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':folder', $folder, PDO::PARAM_STR);
        $result->bindParam(':pic', $pic, PDO::PARAM_STR);
        $result->execute();
		$db = null;
        return $result;
    }
	
	public static function updateCategory($id, $name, $url, $name_ru, $url_ru, $sortOrder, $pic)
    {
		$id = intval($id);
        $db = Db::getConnection();

        $sql = "UPDATE photo_cat
            SET 
                name = :name, 
                url = :url,
                name_ru = :name_ru, 
                url_ru = :url_ru,
                sort_order = :sort_order, 
                pic = :pic
            WHERE id = :id";
			
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':name_ru', $name_ru, PDO::PARAM_STR);
        $result->bindParam(':url_ru', $url_ru, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':pic', $pic, PDO::PARAM_STR);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
    public static function deleteCategory($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM photo_cat WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
    public static function addPhoto($picture, $id)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO photos (id, file, categoryId)'
                . 'VALUES ("", :file, :categoryId) ';
        $result = $db->prepare($sql);
        $result->bindParam(':file', $picture, PDO::PARAM_STR);
        $result->bindParam(':categoryId', $id, PDO::PARAM_INT);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
    public static function showMore($categoryId, $num)
    {
        $db = Db::getConnection();
        $categoryId = intval($categoryId);
        $num = intval($num);
        $sql = 'SELECT * FROM photos where categoryId = :id limit :num , 8';
        $res = $db->prepare($sql);
        $res->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $res->bindParam(':num', $num, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $i = 0;
        $photoList = array();
        while ($row = $res->fetch()) {
            $photoList[$i]['id'] = $row['id'];
            $photoList[$i]['file'] = $row['file'];
            $i++;
        }
		$db = null;
        return $photoList;
    }
    public static function deleteOnePhoto($photoId)
    {
        $db = Db::getConnection();
        $photoId = intval($photoId);
        $sql = 'DELETE FROM photos where id = :id';
        $res = $db->prepare($sql);
        $res->bindParam(':id', $photoId, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
		$db = null;
    }
} 