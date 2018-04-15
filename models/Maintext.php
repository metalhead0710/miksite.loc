<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 04.12.16
 * Time: 19:14
 */
class Maintext
{
    public static function getText()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM maintext';
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $maintext = $result->fetch();
		$db = null;
        return $maintext;
    }
    public static function updateText($id, $maintext, $maintext_ru)
    {
        $db = Db::getConnection();
        $id = intval($id);
        $sql = "UPDATE maintext
            SET
				maintext = :maintext,
				maintext_ru = :maintext_ru
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':maintext', $maintext, PDO::PARAM_STR);
        $result->bindParam(':maintext_ru', $maintext_ru, PDO::PARAM_STR);
		$res = $result->execute();
		$db = null;
		return $res;
    }
} 