<?php
    include_once 'C:\xampp\htdocs\nha_hang\models\DBConnect.php';
    class CommentModel extends DBConnect{
        function insertComment($name,$mess,$idFood,$idUser,$status){
        $sql = "INSERT INTO comment( id,username,message,id_food,id_user,status) VALUES ( '','$name', '$mess', '$idFood','$idUser','$status')";
        return $this->executeQuery($sql);
        }
        function getIdUserName($username){
            $sql="SELECT id FROM users WHERE username='$username'";
            return $this->loadOneRow($sql);
        }

        function getComment($idFood){
            $sql="SELECT * FROM comment WHERE id_food='$idFood' ORDER BY id DESC";
            return $this->loadMoreRows($sql);
        }

        function getUserName($idUser){
            $sql="SELECT username FROM users WHERE id='$idUser'";
            return $this->loadOneRow($sql);
        }
    }
?>