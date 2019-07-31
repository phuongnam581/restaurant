<?php
    include_once 'C:\xampp\htdocs\nha_hang\models\DBConnect.php';
    class StatusBillModel extends DBConnect{
        function getIdUser($username){
            $sql="SELECT id FROM users WHERE username='$username'";
            return $this->loadOneRow($sql);
        }
        function getBillByIdUser($idUser){
            $sql="SELECT * FROM bills WHERE id_user='$idUser' ORDER BY id DESC LIMIT 3";
            return $this->loadMoreRows($sql);
        }

        function countBill($idUser){
            $sql="SELECT COUNT(id)  FROM bills WHERE id_user='$idUser'";
            return $this->loadOneRow($sql);
        }
    }
?>