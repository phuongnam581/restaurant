<?php
    include_once 'Controller.php';
    include_once 'models/RepModel.php';
    class RepController extends Controller{
        function rep($idcmt,$content,$name){
            $model=new RepModel;
            $check=$model->insertRep($name,$content,$idcmt);

            // $resultid=$model->getIdRepMax();
            // $array = get_object_vars($resultid);
            // $idrep= $array['id'];
            // print_r($resultid);
            // $result=$model->getIdComment($idrep);
            // $array = get_object_vars($result);
            // $id_cmt= $array['id_comment'];

            if($check){ 
                echo "<li class='list-small'>";
                echo "<img class='image' style='width:20px;height:20px;'src='public/source/assets/images/background/download.png'>";
                echo "<div class='content'>";
                echo "<b>$name</b>";
                echo "<p>$content</p>";
                echo "</div>";      
                echo "</li>";
            }
        }
    }
?>