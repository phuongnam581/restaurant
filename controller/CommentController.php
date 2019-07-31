<?php
    include_once 'Controller.php';
    include_once 'models/CommentModel.php';
    class CommentController extends Controller{
        function Comment($id,$content,$name){
            $model=new CommentModel;
            $result=$model->getIdUserName($name);
            $array=get_object_vars($result);
            $idUser=$array['id'];
            $check=$model->insertComment($name,$content,$id,$idUser,0);
            if($check){
                echo "<li class='list'>";
                echo "<img class='image'style='width:30px;height:30px;'src='public/source/assets/images/background/download.png'>";
                echo "<div class='content'>";
                echo "<b>$name</b>&nbsp<small><a href='#'>Trả Lời</a></small>";
                echo "<p>$content</p>";
                echo "</div>";
            }
        }
    }
?>