<?php
    include_once 'C:\xampp\htdocs\nha_hang\models\DBConnect.php';
    class RepModel extends DBConnect{
        function insertRep($name,$mess,$idCmt){
        $sql = "INSERT INTO reply(id,name_rep,message_rep,id_comment) VALUES ('','$name','$mess','$idCmt')";
        return $this->executeQuery($sql);
        }
        function getIdUserName($username){
            $sql="SELECT id FROM users WHERE username='$username'";
            return $this->loadOneRow($sql);
        }

        function getRepCommentByIdCmt($idcmt){
            $sql="SELECT * FROM reply WHERE id_comment='$idcmt'";
            return $this->loadMoreRows($sql);
        }

        function getIdRepMax(){
            $sql="SELECT MAX(id) FROM reply";
            return $this->loadMoreRows($sql);
        }

        function getIdComment($idrep){
            $sql="SELECT id_comment FROM reply WHERE id='$idrep'";
            return $this->loadMoreRows($sql);
        }
    }
?>