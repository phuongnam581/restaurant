<?php
include_once 'models/DBConnect.php';

class MenuModel extends DBConnect{
    function getAllMenu(){
        $sql = "SELECT * FROM menu";
        return $this->loadMoreRows($sql);
    }
}


?>