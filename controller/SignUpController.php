<?php
 if(!isset($_SESSION)) session_start();
include_once('C:\xampp\htdocs\nha_hang\models\SignUpModel.php');
class SignUpController{
    function dangkiTK($username, $password,$phone){
       $userModel = new SignUpModel();
       $check=$this->selectUse($username);
        if($check==false){
            $userModel->insertUser($username,$password,$phone,$status=0);
            $_SESSION['success']='Đăng Kí Thành Công';          
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }           
            header('location:index.php');         
        }else{
            $_SESSION['error']='Đăng Kí Không Thành Công';
            // if(isset($_SESSION['error'])){
            //     unset($_SESSION['error']);
            // }  
            header('location:dang_ky.php');
        }
    }

    function dangnhapTk($username,$password){
        $userModel = new SignUpModel();
        $check=$userModel->selectLogin($username,$password);
        if($check==false){
            $_SESSION['error']='Sai username hoặc password';
            header('location:dang_ky.php');
        }else{
            $_SESSION['name']=$username;   
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }                  
            header('location:index.php'); 
        }
    }

    function selectUse($username){
        $userModel = new SignUpModel();
        $check=$userModel->selectUser($username);
        return $check;
    }

    function dangXuatTk(){
       unset($_SESSION['name']);
        header('location:index.php'); 
    }

}
?>