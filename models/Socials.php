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
	
	public static function updateContacts($id, $vk, $facebook, $youtube, $instagram, $g_plus )
    {
        $db = Db::getConnection();
        $sql = "UPDATE socials
            SET 
				vk = :vk,
				facebook = :facebook,
                youtube = :youtube,
                instagram = :instagram,
                g_plus = :g_plus
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->bindParam(':vk', $vk, PDO::PARAM_STR);
        $result->bindParam(':facebook', $facebook, PDO::PARAM_STR);
        $result->bindParam(':youtube', $youtube, PDO::PARAM_STR);
        $result->bindParam(':instagram', $instagram, PDO::PARAM_STR);
        $result->bindParam(':g_plus', $g_plus, PDO::PARAM_STR);
        $res = $result->execute();
		$db = null;
		return $res;
    }
}
?>