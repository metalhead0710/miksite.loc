<?php

class Banner
{
    public static function getBanners()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM banners order by sort_order';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $i = 0;
        $bannerList = array();
        while ($row = $result->fetch()) {
            $bannerList[$i]['id'] = $row['id'];
            $bannerList[$i]['file'] = $row['file'];
            $bannerList[$i]['sort_order'] = $row['sort_order'];
            $i++;
        }
		$db = null;
        return $bannerList;
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
    public static function addBanner($file, $sort_order)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO banners (file, sort_order) '
            . 'VALUES (:file, :sort_order)';
        $result = $db->prepare($sql);
        $result->bindParam(':file', $file, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sort_order, PDO::PARAM_INT);
        $res = $result->execute();
		$db = null;
		return $res;
    }
    public static function deleteBanner($id)
    {
        $db = Db::getConnection();
        $photoId = intval($id);
        $sql = 'DELETE FROM banners where id = :id';
        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
		$db = null;
    }
}
