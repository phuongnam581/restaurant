<?php
include_once 'Controller.php';
include_once 'models/DetailFoodModel.php';

class DetailFoodController extends Controller{
    function getDetail(){
        $id = $_GET['id'];
        $alias = $_GET['alias'];
        
        $model = new DetailFoodModel;
        $food = $model->getDetailFood($id,$alias);

        if($food==null){
            header('Location:error.html');
            return;
        }
        $foods = $model->selectFoodSameType($food->id_type,$food->id);
        $data = [
            'id'=>$id,
            'food'=>$food,
            'foods'=>$foods
        ];
        return $this->loadView('chitiet',"Chi tiết",$data);
    }
    
}

?>