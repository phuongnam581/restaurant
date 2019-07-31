<?php
session_start();
include_once('C:\xampp\htdocs\nha_hang\controller\RepController.php');
$c = new RepController;
$idcmt=$_POST['idcmt'];
$name=$_SESSION['name'];
$mess=$_POST['repmess'];
$c->rep($idcmt,$mess,$name);
?>