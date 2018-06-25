<?php
class AdminBannerController
{
    public function actionIndex()
    {
        User::checkLogged();
        $banners = Banner::getBanners();
        require_once(ROOT . '/views/admin/admin_banners/index.php');
        return true;
    }
    public function actionAdd()
    {
        User::checkLogged();
        if (isset($_POST['submit']))
        {
            $picture = $_FILES['picture'];
            $picture['name'] = uniqid('bannnnner') . '.jpg';
            include_once('img_func.php');
            if($picture['name'] != '') {
                $check = can_upload($picture);
                if($check === true){
                    $destiny = ROOT . '/upload/images/banners/';
                    make_upload($picture, $destiny);
                }
                else{
                    echo "<strong>$check</strong>";
                }
            }
            Banner::addBanner($picture['name']);
            header("Location: /admin/banners");
        }
        require_once(ROOT . '/views/admin/admin_banners/add.php');
        return true;
    }

    public function actionSet ($id)
    {
        User::checkLogged();
        Banner::set($id);
        header("Location: /admin/banners");
    }

    public function actionRemove($id)
    {
        User::checkLogged();
        $banner = Banner::getOneBanner($id);
        if (!empty ($banner['file']) )
        {
            $bannerFile = ROOT . '/upload/images/banners/' . $banner['file'];
            unlink($bannerFile);
        }
        Banner::deleteBanner($id);
        header("Location: /admin/banners");
        return true;
    }
}