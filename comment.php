<?php
session_start();
include_once('C:\xampp\htdocs\nha_hang\controller\CommentController.php');
$c = new CommentController;
$id=$_POST['id'];
$name=$_SESSION['name'];
$mess=$_POST['mess'];
$c->Comment($id,$mess,$name);
?>