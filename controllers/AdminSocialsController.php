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
            $instagram = $_POST['instagram'];
            $g_plus = $_POST['g_plus'];
			$res = Socials::updateContacts(1, $vk, $facebook, $youtube, $instagram, $g_plus);
			
            header("Location: /admin/socials");
			
        }
        
        require_once(ROOT . '/views/admin/admin_socials/update.php');
		return true;
	}
	
}
?>