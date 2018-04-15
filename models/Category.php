<?php
class Category
{
    public static function getCategoriesList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, url, name_ru, url_ru, pic FROM category WHERE status = "1" ORDER BY sort_order, name ASC');
		$i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['url'] = $row['url'];
            $categoryList[$i]['name_ru'] = $row['name_ru'];
            $categoryList[$i]['url_ru'] = $row['url_ru'];
            $categoryList[$i]['pic'] = $row['pic'];
            $i++;
        }
		$db = null;
        return $categoryList;
    }
	
	public static function getCategoriesInfo()
    {
        $db = Db::getConnection();
		$result = $db->query('SELECT * FROM category ORDER BY sort_order, name ASC');
		$i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['url'] = $row['url'];
            $categoryList[$i]['name_ru'] = $row['name_ru'];
            $categoryList[$i]['url_ru'] = $row['url_ru'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $categoryList[$i]['text'] = $row['text'];
            $categoryList[$i]['text_ru'] = $row['text_ru'];
            $i++;
        }
		$db = null;
        return $categoryList;
    }
    public static function getCategoryById($id)
    {
        
        $db = Db::getConnection();
        $sql = 'SELECT * FROM category WHERE id = :id';
		$result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
    
    public static function getCategoryByUrl($url)
    {
        
        $db = Db::getConnection();
        $sql = 'SELECT * FROM category WHERE url = :url or url_ru = :url';
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
        $sql = 'SELECT url, url_ru FROM category WHERE url = :url or url_ru = :url';
		$result = $db->prepare($sql);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
		$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
		$db = null;
        return $result->fetch();
    }
	
	public static function checkName($url, $url_ru)
	{
		$db = Db::getConnection();
		$sql = 'select url, url_ru from category where (url = :url) or (url_ru = :url_ru)';
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
	
	public static function createCategory(
		$name, 
		$title, 
		$title_ru, 
		$meta_keywords, 
		$meta_keywords_ru, 
		$meta_description, 
		$meta_description_ru, 
		$url, 
		$name_ru, 
		$url_ru, 
		$sortOrder, 
		$status, 
		$text, 
		$text_ru, 
		$pic
	)
    {
        
        $db = Db::getConnection();

        $sql = 'INSERT INTO category 
        (
	        name, 
	        title,
	        title_ru, 
	        meta_keywords,
	        meta_keywords_ru, 
	        meta_description, 
	        meta_description_ru, 
	        url, 
	        name_ru, 
	        url_ru,
	        sort_order, 
	        status, 
	        text, 
	        text_ru, 
	        pic
        )
        
        VALUES 
        (
	        :name, 
	        :title, 
	        :title_ru, 
	        :meta_keywords, 
	        :meta_keywords_ru, 
	        :meta_description, 
	        :meta_description_ru, 
	        :url, 
	        :name_ru, 
	        :url_ru, 
	        :sort_order, 
	        :status, 
	        :text, 
	        :text_ru, 
	        :pic
        )';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':title_ru', $title_ru, PDO::PARAM_STR);
        $result->bindParam(':meta_keywords', $meta_keywords, PDO::PARAM_STR);
        $result->bindParam(':meta_keywords_ru', $meta_keywords_ru, PDO::PARAM_STR);
        $result->bindParam(':meta_description', $meta_description, PDO::PARAM_STR);
        $result->bindParam(':meta_description_ru', $meta_description_ru, PDO::PARAM_STR);
        
        $result->bindParam(':url', $url, PDO::PARAM_STR);
		$result->bindParam(':name_ru', $name_ru, PDO::PARAM_STR);
		$result->bindParam(':url_ru', $url_ru, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
		$result->bindParam(':text_ru', $text_ru, PDO::PARAM_STR);
        $result->bindParam(':pic', $pic, PDO::PARAM_STR);
        $res = $result->execute();
		$db = null;
		return $res;
    }
	
	public static function updateCategoryById( 
		$id, 
		$name, 
		$title, 
		$title_ru, 
		$meta_keywords, 
		$meta_keywords_ru, 
		$meta_description, 
		$meta_description_ru, 
		$url, 
		$name_ru, 
		$url_ru, 
		$sortOrder, 
		$status, 
		$text, 
		$text_ru, 
		$pic
	)
    {
        $db = Db::getConnection();
        $sql = "UPDATE category
            SET 
                name = :name,
                title = :title, 
				title_ru = :title_ru, 
				meta_keywords = :meta_keywords, 
				meta_keywords_ru = :meta_keywords_ru, 
				meta_description = :meta_description, 
				meta_description_ru = :meta_description_ru,  
                url = :url,
                name_ru = :name_ru, 
                url_ru = :url_ru, 
                sort_order = :sort_order, 
                status = :status,
                text = :text,
                text_ru = :text_ru,
                pic = :pic
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':title_ru', $title_ru, PDO::PARAM_STR);
        $result->bindParam(':meta_keywords', $meta_keywords, PDO::PARAM_STR);
        $result->bindParam(':meta_keywords_ru', $meta_keywords_ru, PDO::PARAM_STR);
        $result->bindParam(':meta_description', $meta_description, PDO::PARAM_STR);
        $result->bindParam(':meta_description_ru', $meta_description_ru, PDO::PARAM_STR);
        
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':name_ru', $name_ru, PDO::PARAM_STR);
        $result->bindParam(':url_ru', $url_ru, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':text_ru', $text_ru, PDO::PARAM_STR);
        $result->bindParam(':pic', $pic, PDO::PARAM_STR);
        $res = $result->execute();
		$db = null;
		return $res;
    }
	
	public static function deleteCategory($id)
    {
        
        $db = Db::getConnection();
        $sql = 'DELETE FROM category WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $res = $result->execute();
		$db = null;
		return $res;
    }

}