<?php 
session_start();
 include_once('C:\xampp\htdocs\nha_hang\models\StatusBillModel.php');
 $model = new StatusBillModel;
 if(isset($_SESSION['name'])){
 $result=$model->getIdUser($_SESSION['name']);

 $array = get_object_vars($result);
 $count=$model->countBill($array['id']);
 $arrayCount=get_object_vars($count);
 $bill=$model->getBillByIdUser($array['id']);
 if($arrayCount['COUNT(id)']==0){
  $_SESSION['mess']="Khong Co Don Hang Nao";
 }
 }
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trạng Thái Đơn Hàng</title>
    <base href="http://localhost:8888/nha_hang/">

    <link rel="stylesheet" href="public/source/assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Bootstrap CSS-->
    <link href="public/source/assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="public/source/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/source/assets/vendors/flexslider/flexslider.min.css">
    <link rel="stylesheet" href="public/source/assets/vendors/swipebox/css/swipebox.min.css">
    <link rel="stylesheet" href="public/source/assets/vendors/slick/slick.min.css">
    <link rel="stylesheet" href="public/source/assets/vendors/slick/slick-theme.min.css">
    <link rel="stylesheet" href="public/source/assets/vendors/animate.min.css">
    <link rel="stylesheet" href="public/source/assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="public/source/assets/vendors/pageloading/css/component.min.css">
    <!-- Font-icon-->
    <link rel="stylesheet" href="public/source/assets/fonts/font-icon/style.css">
    <!-- Style-->
    <link rel="stylesheet" type="text/css" href="public/source/assets/css/layout.css">
    <link rel="stylesheet" type="text/css" href="public/source/assets/css/elements.css">
    <link rel="stylesheet" type="text/css" href="public/source/assets/css/extra.css">
    <link rel="stylesheet" type="text/css" href="public/source/assets/css/widget.css">
    <link id="colorpattern" rel="stylesheet" type="text/css" href="public/source/assets/css/color/colordefault.css">
    <link rel="stylesheet" type="text/css" href="public/source/assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="public/source/assets/css/live-settings.css">

    <link rel="stylesheet" type="text/css" href="public/source/assets/css/styles.css">
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
    <!-- Script Loading Page-->
    <script src="public/source/assets/vendors/html5shiv.js"></script>
    <script src="public/source/assets/vendors/respond.min.js"></script>
    <script src="public/source/assets/vendors/pageloading/js/snap.svg-min.js"></script>
    <script src="public/source/assets/vendors/pageloading/sidebartransition/js/modernizr.custom.js"></script>

    
  </head>
  <body>
  
    <div id="pagewrap" class="pagewrap">
      <div id="html-content" class="wrapper-content">
        <header class="header-transparent">
          <div class="header-top top-layout-02">
            <div class="container">
              <div class="topbar-left">
                <div class="topbar-content">
                  <div class="item"> 
                    <div class="wg-contact"><i class="fa fa-map-marker"></i><span>Học Viện Bưu Chính Viễn Thông,Quận 9,HCM</span></div>
                  </div>
                  <div class="item"> 
                    <div class="wg-contact"><i class="fa fa-phone"></i><span>098 212 6547</span></div>
                  </div>
                </div>
              </div>
              <div class="topbar-right">
                <div class="topbar-content">
                  <div class="item">
                    <ul class="socials-nb list-inline wg-social">
                      <li><a href="javascript:void(0)">
                        <!-- <i class="fa fa-facebook"></i> -->
                       
                        <?php if(isset($_SESSION['name'])){?>
                      <li>
                        <a>
                            <span class="glyphicon glyphicon-user"></span>
                            <?php 
                                  echo $_SESSION['name'];
                            ?>                    
                        </a>
                      </li>
                      <li>
                        <a href="dangxuat.php">
                        <span class="glyphicon glyphicon-log-out"></span>
                          <!-- Đăng Xuất -->
                        </a>
                      </li>
                      <?php }
                      else{ ?>
                      <li>
                        <a href="dang_ky.php">
                        <span class="glyphicon glyphicon-log-in"></span>
                          <!-- Đăng Nhập -->
                        </a>
                      </li>  
                      <?php }?>                    
                      </a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                            
                    </ul>
                  </div>
                  <div class="item">
                    <div class="wg-social btn_cart"><a href="checkout.php"><i class="fa fa-shopping-cart fa-2x"></i>
                    <!-- <span>Shopping Cart</span> -->
                  </a></div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="header-main">
            <div class="container">
              <div class="open-offcanvas">&#9776;</div>
              <script src="public/source/assets/vendors/jquery-1.10.2.min.js"></script>
              <script>
              $(function() {
                var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
                if (pgurl=="") pgurl="." ;
                 $("#main-nav li").each(function(){
                  if($('a', this).attr("href") == pgurl || $(this).children("a").attr("href") == '' )
                  $(this).addClass("current-menu-item");
           
                 })
              });
              </script>
            </div>
          </div>
        </header>
        <br>
        <br>
        <?php if(isset($_SESSION['mess'])){	?>	
		echo "<div class='alert alert-success' style='text-align:center;'>".$_SESSION['mess']."</div>";
    <?php }?>
  <br>
  <br>

<?php if($arrayCount['COUNT(id)']!=0){ unset($_SESSION['mess'])?>        
        <div class="panel panel-body">
        <section class="content">
            <div class="panel panel-default">
                <div class="panel-heading"></div>           
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Ngày Mua</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng Thái Đơn Hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                            <?php 
                                $stt = 1;
                                foreach($bill as $t):
                            ?>                          
                             <tr>
                                <td><?php echo $stt++?></td>
                                <td class=""><?= $t->id?></td>
                                <td>
                                    <?= $t->date_order?>
                                </td>
                                <td>
                                   <?= $t->total?>
                                </td>
                                <td>
                                <?php if($t->status==0){?>
                                         chưa xác nhận
                                <?php }elseif($t->status==1){?>
                                        đã xác nhận
                                <?php }elseif($t->status==2){?>
                                        hoàn tất
                                <?php }else{?>
                                         bị huỷ
                                <?php }?>                                                                          
                                </td>
                                </tr>
                            <?php endforeach?>
                        
                        </tbody>

                    </table>
                </div>
            </div>
        </section>
         </div>
                                <?php }?>                
              
        <footer>       
          <div class="footer-top"></div>
          <div class="footer-main">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="ft-widget-area">
                    <div class="ft-area1">
                      <div class="swin-wget swin-wget-about">
                        <div class="clearfix"><a class="wget-logo"><img src="public/source/assets/images/logo-ft.png" alt="" class="img img-responsive"></a>
                          <ul class="socials socials-about list-unstyled list-inline">
                            <li><a href="https://www.facebook.com/nhonvuong.821997?fref=hovercard&hc_location=chat"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/phuongnam113"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          </ul>
                        </div>
                        <div class="wget-about-content">
                          <p>Đặt món tại nhà hàng thực khách sẽ được thưởng thức những món ăn thượng hạng như bào ngư, vây cá, yến, Hải sâm…. 
                          Ngoài những món ăn thượng hạng,FOODAY còn có thực đơn phong phú với các món ăn độc đáo, bổ dưỡng do chính đầu bếp đến từ những nơi nổi tiếng chế biến</p>
                        </div>
                        <div class="about-contact-info clearfix">
                          <div class="address-info">
                            <div class="info-icon"><i class="fa fa-map-marker"></i></div>
                            <div class="info-content">
                              <p>PTIT</p>
                              <p>Man Thiện, Quận 9</p>
                            </div>
                          </div>
                          <div class="phone-info">
                            <div class="info-icon"><i class="fa fa-mobile-phone"></i></div>
                            <div class="info-content">
                              <p>033 366 7925</p>
                              <p>098 142 8298</p>
                            </div>
                          </div>
                          <div class="email-info">
                            <div class="info-icon"><i class="fa fa-envelope"></i></div>
                            <div class="info-content">
                              <p>namnguyenbh97@gmail.com</p>
                              <p>huynhmaifsoft@gmail.com</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ft-fixed-area">
                    <div class="reservation-box">
                      <div class="reservation-wrap">
                        <h3 class="res-title">Mở cửa</h3>
                        <div class="res-date-time">
                          <div class="res-date-time-item">
                            <div class="res-date">
                              <div class="res-date-item">
                                <div class="res-date-text">
                                  <p>Monday:</p>
                                </div>
                                <div class="res-date-dot">.......................................</div>
                              </div>
                            </div>
                            <div class="res-time">
                              <div class="res-time-item">
                                <p>7AM - 5PM</p>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="res-date-time-item">
                            <div class="res-date">
                              <div class="res-date-item">
                                <div class="res-date-text">
                                  <p>Tuesday:</p>
                                </div>
                                <div class="res-date-dot">.......................................</div>
                              </div>
                            </div>
                            <div class="res-time">
                              <div class="res-time-item">
                                <p>7AM - 5PM</p>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="res-date-time-item">
                            <div class="res-date">
                              <div class="res-date-item">
                                <div class="res-date-text">
                                  <p>Wednesday:</p>
                                </div>
                                <div class="res-date-dot">.......................................</div>
                              </div>
                            </div>
                            <div class="res-time">
                              <div class="res-time-item">
                                <p>7AM - 5PM</p>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="res-date-time-item">
                            <div class="res-date">
                              <div class="res-date-item">
                                <div class="res-date-text">
                                  <p>Thursday:</p>
                                </div>
                                <div class="res-date-dot">.......................................</div>
                              </div>
                            </div>
                            <div class="res-time">
                              <div class="res-time-item">
                                <p>7AM - 5PM</p>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="res-date-time-item">
                            <div class="res-date">
                              <div class="res-date-item">
                                <div class="res-date-text">
                                  <p>Friday:</p>
                                </div>
                                <div class="res-date-dot">.......................................</div>
                              </div>
                            </div>
                            <div class="res-time">
                              <div class="res-time-item">
                                <p>7AM - 5PM</p>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="res-date-time-item">
                            <div class="res-date">
                              <div class="res-date-item">
                                <div class="res-date-text">
                                  <p>Saturday:</p>
                                </div>
                                <div class="res-date-dot">.......................................</div>
                              </div>
                            </div>
                            <div class="res-time">
                              <div class="res-time-item">
                                <p>7AM - 5PM</p>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="res-date-time-item">
                            <div class="res-date">
                              <div class="res-date-item">
                                <div class="res-date-text">
                                  <p>Sunday:</p>
                                </div>
                                <div class="res-date-dot">.......................................</div>
                              </div>
                            </div>
                            <div class="res-time">
                              <div class="res-time-item">
                                <p>Close</p>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <h3 class="res-title">Booking</h3>
                        <p class="res-number">098 142 8298</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>
      <a id="totop" href="#" class="animated"><i class="fa fa-angle-double-up"></i></a>
      </div>
      <div id="loader" data-opening="m -5,-5 0,70 90,0 0,-70 z m 5,35 c 0,0 15,20 40,0 25,-20 40,0 40,0 l 0,0 C 80,30 65,10 40,30 15,50 0,30 0,30 z" class="pageload-overlay">
        <div class="loader-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60" preserveaspectratio="none">
            <path d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z"></path>
          </svg>
          <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
          </div>
          <div class="sk-circle sk-circle-out">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
          </div>
        </div>
      </div>
      
    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-body">
                <p>Đã thêm <b class='name-food'>...</b> vào giỏ hàng</p>
                <p><a href="checkout.php">Xem giỏ hàng của bạn</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-body">
                <p>Bạn Chưa Đăng Nhập</p>
                <p><a href="dang_ky.php">Đăng Nhập</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!-- jQuery-->
    <script src="public/source/assets/vendors/jquery-1.10.2.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.btn-add-to-card').click(function(){
          <?php
            if(isset($_SESSION['name'])){
          ?>
            var idSP = $(this).attr('data-id') 
            $.ajax({
                url:"cart.php",
                data:{
                    id:idSP  // $_POST['id']
                },
                type:"POST",
                success:function(result){ //result: response from server
                    //console.log(result)
                    $('.name-food').html(result)
                    $('#myModal').modal('show')
                }
            })
          <?php }else{?>
            $('#myModal1').modal('show')
          <?php }?>
        })

        $('.btn_cart').click(function(){ 
         
        })
      })
    </script>


    <!-- Bootstrap JavaScript-->
    <script src="public/source/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <!-- Vendors-->
    <script src="public/source/assets/vendors/flexslider/jquery.flexslider-min.js"></script>
    <script src="public/source/assets/vendors/swipebox/js/jquery.swipebox.min.js"></script>
    <script src="public/source/assets/vendors/slick/slick.min.js"></script>
    <script src="public/source/assets/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="public/source/assets/vendors/jquery-countTo/jquery.countTo.min.js"></script>
    <script src="public/source/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="public/source/assets/vendors/parallax/parallax.min.js"></script>
    <script src="public/source/assets/vendors/gmaps/gmaps.min.js"></script>
    <script src="public/source/assets/vendors/audiojs/audio.min.js"></script>
    <script src="public/source/assets/vendors/vide/jquery.vide.min.js"></script>
    <script src="public/source/assets/vendors/pageloading/js/svgLoader.min.js"></script>
    <script src="public/source/assets/vendors/pageloading/js/classie.min.js"></script>
    <script src="public/source/assets/vendors/pageloading/sidebartransition/js/sidebarEffects.min.js"></script>
    <script src="public/source/assets/vendors/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="public/source/assets/vendors/wowjs/wow.min.js"></script>
    <script src="public/source/assets/vendors/skrollr.min.js"></script>
    <script src="public/source/assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="public/source/assets/vendors/jquery-cookie/js.cookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
    <!-- Own script-->
    <script src="public/source/assets/js/layout.js"></script>
    <script src="public/source/assets/js/elements.js"></script>
    <script src="public/source/assets/js/widget.js"></script>
    
   
  </body>
</html>