<?php
	class ErrorController
	{
		public function action404()
		{
			require_once(ROOT . '/views/error/404.php');
			return true;
		}
	}
	
	
?>