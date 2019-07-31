<?php
session_start();
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey('sk_test_yy9E7xBCyrjkSW62ToWC1xa5');
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 //$first_name = $POST['first_name'];
 $last_name = $POST['last_name'];
 $email = $POST['email'];
 $token = $POST['stripeToken'];
$idBill=$_SESSION['idBill'];
$total=$_SESSION['total'];
// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "name"=>$last_name,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $total,
  "currency" => "vnd",
  "description" => "Thanh Toán Đơn Hàng Có Mã Là: $idBill",
  "customer" => $customer->id
));
// print_r($charge);
  $_SESSION['message'] = "Thanh Toán Thành Công";
  header('Location:checkout.php');
?>