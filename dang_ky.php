<?php
include_once('C:\xampp\htdocs\nha_hang\controller\SignUpController.php');
$userController = new SignUpController();
if(isset($_POST['btn-DK'])){
	$username=$_POST['username'];
	$password=$_POST['pass'];
	$phone=$_POST['phone'];
	$userController->dangkiTK($username,$password,$phone);	
}else if(isset($_POST['btn-DN'])){
	$username=$_POST['username'];
	$password=$_POST['pass'];
	$userController->dangnhapTk($username,$password);
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sign Up</title>
	<base href="http://localhost:8888/nha_hang/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
    <link rel="stylesheet" href="public/source/assets/css/demo.css">
    <link rel="stylesheet" href="public/source/assets/css/normalize.css">
    <link rel="stylesheet" href="public/source/assets/css/animate.min.css">
    <link rel="stylesheet" href="public/source/assets/css/set1.css">
	<link rel="stylesheet" href="public/source/assets/css/main.css">
	
</head>
<body>
   
	<?php if(isset($_SESSION['error'])):
		echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
	?>	
	<?php endif?>
	
    <section class="form" id="form-dk">
	<form action="dang_ky.php" method="post">
		<div class="container-fluid">
			<div class="row align-items-center ">
				<div class="col-5 mx-auto animated fadeInDown">			
					<div class="form-dang-ky text-center " id="form-user">
                        <h1 class="display-4 mt-0 " >Đăng Ký</h1>
                        
						<span class="input input--kuro input-dang-ky mb-4">
								<input class="input__field input__field--kuro" type="text" id="txtTK" name="username"/>
								<label class="input__label input__label--kuro" for="input-7" id="tbUserName">
									<span class="input__label-content input__label-content--kuro">Tên Người Dùng</span>
								</label>
                        </span>
						     
						<span class="input input--kuro input-dang-ky  mb-4">
								<input class="input__field input__field--kuro" type="password" id="txtMK" name="pass"/>
								<label class="input__label input__label--kuro" for="input-7" id="tbPassword">
									<span class="input__label-content input__label-content--kuro" >Mật Khẩu</span>
								</label>
                        </span>
          
						<span class="input input--kuro input-dang-ky mb-4">
								<input class="input__field input__field--kuro" type="text" id="txtPhone" maxlength="10" name="phone"/>
								<label class="input__label input__label--kuro" for="input-7" id="tbPhoneNumber">
									<span class="input__label-content input__label-content--kuro" > Điện Thoại</span>
								</label>
						</span>
						<div class="mb-5">
						<button  class="btn btn--submit" id="btn--submit" onclick="return onDangKy()" name="btn-DK" type="submit">ĐĂNG KÝ</button>
						<!-- <span><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>												 -->
                        </div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<button class="btn btn--submit" onclick=" onDangNhap()">ĐĂNG NHẬP</button>	
	</section>
	

	
	<section class="form"  id="form-dn">
	<form action="dang_ky.php" method="post">
		<div class="container-fluid">
			<div class="row align-items-center ">
				<div class="col-5 mx-auto animated fadeInDown">
					<div class="form-dang-ky text-center ">

                        <h1 class="display-4 mt-0 " >Đăng Nhập</h1>
                        
						<span class="input input--kuro input-dang-ky mb-4">
								<input class="input__field input__field--kuro" type="text" id="txtTK" name="username"/>
								<label class="input__label input__label--kuro" for="input-7" id="tbUserName">
									<span class="input__label-content input__label-content--kuro" >Username</span>
								</label>
                        </span>
                        
						<span class="input input--kuro input-dang-ky  mb-4">
								<input class="input__field input__field--kuro" type="password" id="txtMK" name="pass"/>
								<label class="input__label input__label--kuro" for="input-7" id="tbPassword">
									<span class="input__label-content input__label-content--kuro" >Password</span>
								</label>
                        </span>
						<div class="mb-5">
						    <button class="btn btn--submit" onclick="return onDangNhap()" name="btn-DN">ĐĂNG NHẬP</button>
							<!-- <span><i class="fa fa-hand-o-right" style="font-size: 30px" aria-hidden="true"></i></span> -->
							
                        </div>
					</div>
				</div>
			</div>
		</div>
		</form>
		<button class="btn btn--submit" onclick=" onDangKy()">ĐĂNG KÝ</button>
    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="public/source/assets/js/classie.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="public/source/assets/js/main.js"></script>

</body>
</html>