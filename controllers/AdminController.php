<?php
class AdminController
{
	public function actionIndex ()
	{
		User::checkLogged();
        $maintext = Maintext::getText();
		
        if (isset($_POST['submit'])) {
            $maintext = $_POST['maintext'];
            $maintext_ru = $_POST['maintext_ru'];
            Maintext::updateText(1, $maintext, $maintext_ru);
         header("Location: /admin/index");
        }
        require_once(ROOT . '/views/admin/index.php');
		return true;
	}
	
}
