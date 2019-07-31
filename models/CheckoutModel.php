<?php
require_once 'DBConnect.php';
class CheckoutModel extends DBConnect{

    function insertCustomer($name,$email,$phone,$address){
        $sql = "INSERT INTO customers(name,email,phone,address)
                VALUES('$name','$email','$phone','$address')";
        $r = $this->executeQuery($sql); 
        return $r ? $this->getLastId(): false;
    }

    function insertBill($idCustomer,$dateOrder,$total,$payment,$token,$tokenDate,$note,$idUser){
        $sql = "INSERT INTO bills(id_customer,date_order,total,payment_method,token,token_date,note,id_user)
                VALUES($idCustomer,'$dateOrder',$total,'$payment','$token','$tokenDate','$note','$idUser')";
        $r = $this->executeQuery($sql); 
        return $r ? $this->getLastId(): false;
    }

    function insertBillDetail($idBill,$idFood,$quantity,$price){
        $sql = "INSERT INTO bill_detail(id_bill,id_food,quantity,price)
                VALUES($idBill,$idFood,$quantity,$price)";
        return $this->executeQuery($sql); 
    }

    function deleteRecentCustomer($idCustomer){
        $sql = "DELETE FROM customers WHERE id=$idCustomer";
        return $this->executeQuery($sql);
    }

    function deleteRecentBill($idBill){
        $sql = "DELETE FROM bills WHERE id=$idBill";
        return $this->executeQuery($sql);
    }

    function deleteRecentBillDetail($idBill){
        $sql = "DELETE FROM bill_detail WHERE id_bill=$idBill";
        return $this->executeQuery($sql);
    }

    function findBillByToken($token){
        $sql = "SELECT * FROM bills WHERE token = '$token'";
        return $this->loadOneRow($sql);
    }

    function updateStatusBill($idBill){
        $sql = "UPDATE bills 
                SET status='1'
                WHERE id=$idBill";
        return $this->executeQuery($sql);
    }

    function cancelStatusBill($idBill){
        $sql = "UPDATE bills 
            SET status='3'
            WHERE id=$idBill";
        return $this->executeQuery($sql);
    }

    function finalStatusBill($idBill){
        $sql = "UPDATE bills 
            SET status='2'
            WHERE id=$idBill";
        return $this->executeQuery($sql);
    }
}


?>