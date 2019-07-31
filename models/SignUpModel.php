<?php
include_once 'C:\xampp\htdocs\nha_hang\models\DBConnect.php';

class SignUpModel extends DBConnect{
   
    function selectUser($username){
        $sql = "SELECT username FROM users WHERE username='$username'";
       return  $this->loadOneRow($sql);
    }
    function insertUser($username, $password,$phone,$status){
       
        $sql = "INSERT INTO users( id,username,password,phone,status) VALUES ( '','$username', '$password', '$phone','$status')";
        return $this->executeQuery($sql);
    }

    function selectLogin($username,$password){
        $sql = "SELECT username,password FROM users WHERE username='$username'AND password='$password' AND status='0'";
       return  $this->loadOneRow($sql);
    }

}
?>