<?php
include_once 'Controller.php';
include_once 'models/MenuModel.php';

class MenController extends Controller{
    function getMenu(){
        $model = new MenuModel;
        $menus = $model->getAllMenu();
        $data = [
            'menus'=>$menus,
        ];
        return $this->loadView('ds-thuc-don','Thực Đơn',$data);
    }
}

?>