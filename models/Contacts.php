<?php
class Contacts
{
    public static function getContactsList()
    {
        $db = Db::getConnection();
		$result = $db->query('SELECT * FROM contacts where id=1');
		$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
    
    public static function getEmail()
    {
        $db = Db::getConnection();
		$result = $db->query('SELECT email FROM contacts where id=1');
		$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
	
	public static function updateContacts($id, $address, $address_ru, $email, $tel1, $tel2, $tel3, $map)
    {
        $db = Db::getConnection();
        $sql = "UPDATE contacts
            SET 
				address = :address,
				address_ru = :address_ru,
				email = :email,
                tel1 = :tel1, 
                tel2 = :tel2, 
                tel3 = :tel3,
				map = :map
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
		$result->bindParam(':address', $address, PDO::PARAM_STR);
		$result->bindParam(':address_ru', $address_ru, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':tel1', $tel1, PDO::PARAM_STR);
        $result->bindParam(':tel2', $tel2, PDO::PARAM_STR);
        $result->bindParam(':tel3', $tel3, PDO::PARAM_STR);
        $result->bindParam(':map', $map, PDO::PARAM_STR);
        $res = $result->execute();
		$db = null;
		return $res;
    }
} 