<?php

class Banner
{
    public static function getBanners()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM banners';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetchAll();
    }

    public static function getMainBanner()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM banners where banners.set = true';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $db = null;
        return $result->fetch();
    }

    public static function getOneBanner($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM banners WHERE id = :id ';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
    public static function addBanner($file)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO banners (file) VALUES (:file)';
        $result = $db->prepare($sql);
        $result->bindParam(':file', $file, PDO::PARAM_STR);
        $res = $result->execute();
		$db = null;
		return $res;
    }

    public static function set($id)
    {
        $db = Db::getConnection();
        $db->query('UPDATE banners SET banners.set = 0');
        $photoId = intval($id);
        $sql = 'UPDATE banners SET banners.set = 1 where id = :id';
        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);

        $res->execute();
    }

    public static function deleteBanner($id)
    {
        $db = Db::getConnection();
        $photoId = intval($id);
        $sql = 'DELETE FROM banners where id = :id';
        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
		$db = null;
    }
}
