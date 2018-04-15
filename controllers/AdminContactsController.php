<?php
class AdminContactsController
{
	public function actionUpdate ()
	{
		$userId = User::checkLogged();
		
		$contacts = Contacts::getContactsList();
		if (isset($_POST['submit'])) {
            $address = $_POST['address'];
            $address_ru = $_POST['address_ru'];
            $email = $_POST['email'];
            $tel1 = $_POST['tel1'];
            $tel2 = $_POST['tel2'];
            $tel3 = $_POST['tel3'];
            $map = $_POST['map'];
            
			$res = Contacts::updateContacts(1, $address, $address_ru, $email, $tel1, $tel2, $tel3, $map);
			
            header("Location: /admin/contacts");
        }

        require_once(ROOT . '/views/admin/admin_contacts/update.php');
		return true;
	}
	
}
?>