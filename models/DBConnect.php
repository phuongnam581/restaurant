<?php

class DBConnect{
    public $db;
    function __construct(){
        try{
            $this->db = new PDO('mysql:host=127.0.0.1:3310;dbname=nha_hang','root','');
            $this->db->exec('SET NAMES UTF8');
        }
        catch(PDOException $e){
            echo "Lỗi: ".$e->getMessage();
            die;
        }
    }
   
    
    function setStatement($sql,$value = []){
        $stmt = $this->db->prepare($sql);

        if(!empty($value)){
            $count = count($value); //4
            for($i = 1; $i<= $count; $i++){
                $stmt->bindParam($i,$value[$i-1]);
            }
        }
        return $stmt;
    }

     // INSERT/UPDATE/DELETE
    function executeQuery($sql,$value = []){
        $stmt = $this->setStatement($sql,$value);
        return $stmt->execute();
    }

    //SELECT 1
    function loadOneRow($sql,$value=[]){
        $stmt = $this->setStatement($sql,$value);
        $check = $stmt->execute();
        if($check){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    //SELECT >1
    function loadMoreRows($sql,$value=[]){
        $stmt = $this->setStatement($sql,$value);
        $check = $stmt->execute();
        if($check){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    
    function getLastId(){
        return $this->db->lastInsertId();
    }

}

?>