<?php
class Hit
{
	public static function getAllHits()
	{
		$db = Db::getConnection();

        $result = $db->query('SELECT * FROM hits');
		$i = 0;
        $hitList = array();
        while ($row = $result->fetch()) {
            $hitList[$i]['id'] = $row['id'];
            $hitList[$i]['title'] = $row['title'];
            $hitList[$i]['title_ru'] = $row['title_ru'];
            $hitList[$i]['picture'] = $row['picture'];
            $hitList[$i]['categoryId'] = $row['categoryId'];
            $hitList[$i]['specs'] = $row['specs'];
            $hitList[$i]['specs_ru'] = $row['specs_ru'];
            $hitList[$i]['price'] = $row['price'];
            $i++;
        }
		$db = null;
        return $hitList;
	}
	
	public static function getOne($id)
	{
		$db = Db::getConnection();
        $sql = 'SELECT * FROM hits WHERE id = :id';
		$result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
	}
	
	
	public static function createHit($title, $title_ru, $picture, $categoryId, $specs, $specs_ru, $price)
    {
        
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO hits (title, title_ru, picture, categoryId, specs, specs_ru, price) '
                . 'VALUES (:title, :title_ru, :picture, :categoryId, :specs , :specs_ru, :price)';
        $result = $db->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':title_ru', $title_ru, PDO::PARAM_STR);
        $result->bindParam(':picture', $picture, PDO::PARAM_STR);
        $result->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':specs', $specs, PDO::PARAM_STR);
        $result->bindParam(':specs_ru', $specs_ru, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_STR);
        $res = $result->execute();
		$db = null;
		return $res;
    }
	
	public static function updateHit($id, $title, $title_ru, $picture, $categoryId, $specs, $specs_ru, $price)
	{
		$db = Db::getConnection();
			$id = intval($id);
        
        $sql = "UPDATE hits
            SET 
                title = :title, 
                title_ru = :title_ru, 
                picture = :picture, 
                categoryId = :categoryId,
                specs = :specs,
                specs_ru = :specs_ru,
                price = :price
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
		$result->bindParam(':title_ru', $title_ru, PDO::PARAM_STR);
        $result->bindParam(':picture', $picture, PDO::PARAM_STR);
        $result->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':specs', $specs, PDO::PARAM_STR);
		$result->bindParam(':specs_ru', $specs_ru, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_STR);
        $res = $result->execute();
		$db = null;
		return $res;
	}
	
	public static function deleteHit($id)
	{
		$db = Db::getConnection();
        $sql = 'DELETE FROM hits WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $res = $result->execute();
		$db = null;
		return $res;
	}
}
?>