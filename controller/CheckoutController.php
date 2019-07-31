<?php
include_once 'Controller.php';
include_once 'helper/Cart.php';
include_once 'models/CheckoutModel.php';
include_once 'helper/functions.php';
include_once 'helper/mailer.php';
include_once 'helper/mail.php';
include_once 'models/StatusBillModel.php';
require_once('vendor/autoload.php');
if(!isset($_SESSION)) session_start();  

class CheckoutController extends Controller{
    
    function __construct(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
    function getCheckout(){
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;

        $cart = new Cart($oldCart);
        // print_r($cart);
        // die;
        return $this->loadView('giohang','Giỏ hàng của bạn',$cart);
    }

    function postCheckout(){
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $payment =$_POST['payment'];
        $model = new CheckoutModel;
        $model2 = new StatusBillModel;
        $result=$model2->getIdUser($_SESSION['name']);
        $array = get_object_vars($result);
 
        //luu khach hang
        $idCustomer = $model->insertCustomer($name,$email,$phone,$address);
        if(!$idCustomer){
            $_SESSION['error'] = "1. Đặt hàng không thành công. Vui lòng kiểm ra lại";
            header('Location:checkout.php');
            return;
        }

        // luu hoa don
        $dateOrder = date('Y-m-d',time());
        $oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        $tokens = createToken();
        $tokenDate = date('Y-m-d H:i:s',time());
        $tokenTime = time($tokenDate);
        $idBill = $model->insertBill($idCustomer,$dateOrder,$total,$payment,$tokens,$tokenDate,$note,$array['id']);
        
        $_SESSION['idBill']=$idBill;
        $_SESSION['total']=$total;
        //var_dump($idBill);die;
        if(!$idBill){
            //xoá customer vừa insert
            $model->deleteRecentCustomer($idCustomer);
            $_SESSION['error'] = "2. Đặt hàng không thành công. Vui lòng kiểm ra lại";
            header('Location:checkout.php');
            return;
        }

       

        //luu detail
        foreach($cart->items as $idFood=>$food){
            $quantity = $food['qty'];
            $price = $food['price'];
            $billDetail = $model->insertBillDetail($idBill,$idFood,$quantity,$price);

            //var_dump($billDetail);die;
            if(!$billDetail){
                //delete? customer,bill,bill_detail?
                //xoá customer vừa insert
                $model->deleteRecentBillDetail($idBill);
                $model->deleteRecentBill($idBill);
                $model->deleteRecentCustomer($idCustomer);
                
                $_SESSION['error'] = "3. Đặt hàng không thành công. Vui lòng kiểm ra lại";
                header('Location:checkout.php');
                return;
            }
        }
        
        //gui mail
        $subject = "Xác nhận đơn hàng DH00".$idBill;

        $link = "http://localhost:8888/nha_hang/accept-order/$tokens/$tokenTime";
        $linkCancle = "http://localhost:8888/nha_hang/cancle-order/$tokens/$tokenTime";
        $tableContent = '
        <table border="1" border-spacing="0px" width="800px">
            <thead style="background-color:#f3f3f3">
                <th>Thông tin sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền</th>
            </thead>
            <tbody>';
        foreach($cart->items as $idFood=>$food){
        $tableContent .="
                <tr>
                    <td style='text-align:center;'>".$food['item']->name."</td>
                    <td style='text-align:right'>".$food['qty']."</td>
                    <td style='text-align:right'>".$food['item']->price."</td>
                    <td style='text-align:right'>".$food['price']."</td>
                </tr>";
        }
        $tableContent.="
                <tr>
                    <td style='text-align:right;' colspan='3'>Tổng cộng</td>
                    <td style='text-align:right'>".$cart->totalPrice."</td>
                </tr>";

        $tableContent.='</tbody></table>';
        $content = "
                    Chào bạn $name,<br/>
                    Cảm ơn bạn đã đặt hàng tại website của chúng tôi.<br/>
                    Vui lòng chọn vào link sau để xác nhận đơn hàng:
                    $link
                    <br/>
                    Nếu bạn muốn hủy đơn hàng vui lòng nhấn vào link sau:
                    $linkCancle
                    <br/>
                    <h3>Thông tin đơn hàng của bạn:</h3>
                    <br/>
                    $tableContent                    
                    <br/>
                    Thanks and Best Regard.
                    ";
        //mailer($email, $name,$subject, $content);
       
       
        if($payment=="tien_mat"){
        $_SESSION['message'] = "Đặt hàng thành công. Vui lòng kiểm ra email để xác nhận đơn hàng";
        maill($name,$email,$subject,$content);
        header('Location:checkout.php');
        }
        else if($payment=="online"){
        $model->finalStatusBill($idBill);
        header('Location:gateway.php');
        }
        unset($_SESSION['cart']);
        unset($cart);
    }


    function acceptOrder(){
        $token = $_GET['token'];
        $time = strtotime("+1 day",$_GET['time']); // 1521111374 
        //$tokenDate = strtotime($bill->token_date); 
        $timeCheck = strtotime(date("Y-m-d H:i:s",time())); //1521025285
        $model = new CheckoutModel;
        $bill = $model->findBillByToken($token);
        if(!$bill){
            $_SESSION['error'] = "Đường dẫn bạn nhập vào không tồn tại....";
            header('Location:http://localhost:8888/nha_hang/404.php');
            return;
        }
        else{

            if($timeCheck > $time){
                $_SESSION['error'] =  "Thời gian xác nhận đơn hàng đã hết. Vui lòng đặt hàng lại";
                header('Location:http://localhost:8888/nha_hang/404.php');
                return;
            } 
            else{
                $model->updateStatusBill($bill->id);
                $_SESSION['message'] = "Xác nhận đơn hàng thành công.";
                header('location:http://localhost:8888/nha_hang/checkout.php');
                return;
            }
        }                   
        header('location:http://localhost:8888/nha_hang/checkout.php');
    }

    function cancleOrder(){
        $token = trim($_GET['token']); 
        $model = new CheckoutModel();
        $bill = $model->findBillByToken($token);
        $c = $model->cancelStatusBill($bill->id);
        $_SESSION['message'] = "ĐH đã được huỷ";
        header('Location:http://localhost:8888/nha_hang/checkout.php');
        return;
    }
}
?>