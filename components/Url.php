<?php
    class Url
    {        
        public static function getInternalRoute($routes, $uri)
	    {
	    	foreach($routes as $pattern => $route)
	        {
	            if(preg_match("~$pattern~", $uri))
	            {                
	                $internalRoute = preg_replace("~$pattern~", $route, $uri);
	                return $internalRoute;              
	            }
	        }
		}
		
		public static function Img($src, $cssClass = null)
		{
			$html = '<img src = "http://' . $_SERVER['SERVER_NAME'] .'/' . $src . '" class="' . $cssClass. ' " />';
			return $html;
		}
		
		public static function langPart()
		{
			if($_SESSION['lang'] == 'ua') 
			{
				return null;
			}
			else
			{
				return '/ru';
			}
		}
		
		public static function htmlLink($href, $cssClass = null , $innerHtml)
		{
			if (!$_SESSION['lang'])
			{
				$lang = 'ua';
			}
			else
			{
				$lang = $_SESSION['lang'];
			}
			
			$html = '<a href= "http://' . $_SERVER['SERVER_NAME'] . $lang . '/' . $href . '" class="' . $cssClass . '" >' . $innerHtml . '</a>';
			return $html;
		}
		public static function getLang()
		{				
            $url = trim($_SERVER['REQUEST_URI'], '/');
            $arr = explode('/', $url);
            if ($arr[0] === 'ru')
            {
				return 'ru';
			}
			else
			{
				return 'ua';
			}
		}
		
		
		public static function getCurrentUrlUA()
		{
			$url = trim($_SERVER['REQUEST_URI'], '/');
			$arr = explode('/', $url);
			if ($arr[0] === 'ru')
            {
				array_shift($arr);
			}
			$page = array_shift($arr);
			$param = array_shift($arr);
			
			if ($page === 'photos')
			{
				$category = Photos::getCategoryUrls($param);
				$currentUrl = '/'.$page . '/' . $category['url'];
				return $currentUrl;
			}
			else if ($page === 'category')
			{
				$category = Category::getCategoryUrls($param);
				$currentUrl = '/'.$page . '/' . $category['url'];
				return $currentUrl;
			}
			else
			{
				$currentUrl = '/' . $page;
				return $currentUrl;
			}
			
		}
		public static function getCurrentUrlRU()
		{
			$url = trim($_SERVER['REQUEST_URI'], '/');
			$arr = explode('/', $url);
			if ($arr[0] === 'ru')
            {
				array_shift($arr);
			}
			$page = array_shift($arr);
			$param = array_shift($arr);
			
			if ($page === 'photos')
			{
				$category = Photos::getCategoryUrls($param);
				$currentUrl = '/ru/'.$page . '/' . $category['url_ru'];
				return $currentUrl;
			}
			else if ($page === 'category')
			{
				$category = Category::getCategoryUrls($param);
				$currentUrl = '/ru/'.$page . '/' . $category['url_ru'];
				return $currentUrl;
			}
			else
			{
				$currentUrl = '/ru/' . $page;
				
			}
			return $currentUrl;
		}
    }
?>