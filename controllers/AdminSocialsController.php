<?php
class AdminSocialsController
{
	public function actionUpdate ()
	{
		$userId = User::checkLogged();
		
		$socials = Socials::getSocialsList();
		if (isset($_POST['submit'])) {
            $vk = $_POST['vk'];
            $facebook = $_POST['facebook'];
            $youtube = $_POST['youtube'];
			$res = Socials::updateContacts(1, $vk, $facebook, $youtube);
			
            header("Location: /admin/socials");
			
        }
        
        require_once(ROOT . '/views/admin/admin_socials/update.php');
		return true;
	}
	
}
?>