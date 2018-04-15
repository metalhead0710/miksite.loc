<?php 
class Socials
{
    public static function getSocialsList()
    {
        $db = Db::getConnection();
		$result = $db->query('SELECT * FROM socials where id=1');
		$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
	
	public static function updateContacts($id, $vk, $facebook, $youtube )
    {
        $db = Db::getConnection();
        $sql = "UPDATE socials
            SET 
				vk = :vk,
				facebook = :facebook,
                youtube = :youtube
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':vk', $vk, PDO::PARAM_STR);
        $result->bindParam(':facebook', $facebook, PDO::PARAM_STR);
        $result->bindParam(':youtube', $youtube, PDO::PARAM_STR);
        $res = $result->execute();
		$db = null;
		return $res;
    }
}
?>