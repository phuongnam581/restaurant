<?php
include_once('C:\xampp\htdocs\nha_hang\models\CommentModel.php');
include_once('C:\xampp\htdocs\nha_hang\models\RepModel.php');
$food = $data['food'];
$foods = $data['foods'];
$id=$_GET['id'];
if(isset($_SESSION['name'])){
$name=$_SESSION['name'];
}
$model=new CommentModel;
$model1=new RepModel;
$comment=$model->getComment($id);

?>
<script>
     $(document).ready(function(){
      $('#com-submit').click(function(){ 
        <?php if(isset($_SESSION['name'])){?>
               var content = $('.com-mess').val();
               var id= <?php echo $id;?>;
              $.ajax({
                  url:"comment.php",
                  data:{
                    id:id , 
                    mess:content 
                },
                  type:"POST",
                  success:function(result){ //result: response from server
                     //console.log(result)
                     $(".cmt").append(result);
                    // $("ul li:eq(0)").before(result);
                  }   
              })
              <?php }else{?>
            $('#myModal1').modal('show')
          <?php }?>
          });

      $('.rep-submit').click(function(){
        <?php if(isset($_SESSION['name'])){?>
       var idcmt=$(this).attr('id-cmt');
       var repmess= $('.rep-mess'+idcmt).val();
       $.ajax({
                  url:"rep.php",
                  data:{
                    idcmt:idcmt, 
                    repmess:repmess 
                },
                  type:"POST",
                  success:function(result){ //result: response from server
                     //console.log(result)  
                     $(".ullist"+idcmt).append(result);
                     repmess= $('.rep-mess'+idcmt).val('');
                    // $("ul li:eq(0)").before(result);
                  }   
              })
              <?php }else{?>
            $('#myModal1').modal('show')
          <?php }?>
      })
     
     $('.lrep').click(function(){ 
      var idcmtt=$(this).attr('id_cmt');  
   //   document.getElementsByClassName("hide").remove(".hide");
    // $("#trloi").remove('hide');
    // document.getElementById('#trloi').remove('.hide');
 // var trloiii=  document.getElementById("hide"+idcmtt);
//  var trloiii=$('#trloi'+idcmtt).val();
 //  trloiii.classList.add(".hide");
$('.repcmt'+idcmtt).slideToggle();
     });
  //    function myFunction() { 
  //     var idcmt=$(this).attr('id_cmt');
  // document.getElementsById("trloi"+idcmt).classList.remove('hide');
})
</script>
<div class="page-container">
  <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;"
    class="page-title page-product">
    <div class="container">
      <div class="title-wrapper">
        <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;"
          data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Product Single</div>
        <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider">
          <span class="line-before"></span>
          <span class="dot"></span>
          <span class="line-after"></span>
        </div>
        <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;"
          data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">We hope you will like this product and give us 5 star rating</div>
      </div>
    </div>
  </div>
  <div class="page-content-wrapper">
    <div class="container">
      <section class="product-single padding-top-100 padding-bottom-100">
        <div class="row">
          <div class="col-md-6">
            <div class="product-image">
              <div class="product-featured-image">
                <div class="main-slider">
                  <div class="slides">
                    <div class="featured-image-item">
                      <img src="public/source/assets/images/hinh_mon_an/<?=$food->image?>" alt="fooday" class="img img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-summary">
              <div class="product-title">
                <div class="title"><?=$food->name?></div>
              </div>
              <div class="product-price">
                <div class="price"><?=number_format($food->price)?>
                  <span class="currency-symbol">vnđ</span>
                </div>
              </div>
              <div class="product-desc">
                <p><?=$food->detail?></p>
              </div>
              <div class="product-quanlity">
                <form action="#">
                  <div class="input-group">
                    <input type="text" name="quanlity" placeholder="" value="1" class="form-control txtQty">
                    <a href="javascript:void(0)" class="quanlity-plus">
                      <i class="fa fa-plus"></i>
                    </a>
                    <a href="javascript:void(0)" class="quanlity-minus">
                      <i class="fa fa-minus"></i>
                    </a>
                  </div>
                  <div class="add-to-cart" id="add-to-cart" data-id="<?=$food->id?>">
                    <a href="javascript:void(0)" class="swin-btn">
                      <span>Add To Cart</span>
                    </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="product-related padding-bottom-100">
        <div class="swin-sc swin-sc-title style-2">
          <p class="title">
            <span>Món ăn cùng loại</span>
          </p>
        </div>
        <div class="swin-sc swin-sc-product products-02 carousel-01 woocommerce">
          <div class="products nav-slider">
            <?php foreach($foods as $f):?>
            <div class="blog-item item swin-transition">
              <div class="block-img">
                <img src="public/source/assets/images/hinh_mon_an/<?=$f->image?>" alt="" class="img img-responsive" style="height:250px">
                <div class="block-circle price-wrapper">
                  <span class="price woocommerce-Price-amount amount">
                    <?=number_format($f->price)?><span class="price-symbol"> vnd</span>
                  </span>
                </div>
                <div class="group-btn">
                  <a href="<?=$f->url?>-<?=$f->id?>.html" class="swin-btn btn-link">
                    <i class="icons fa fa-link"></i>
                  </a>
                  <a href="javascript:void(0)" class="swin-btn btn-add-to-card"  data-id="<?=$f->id?>">
                    <i class="fa fa-shopping-basket"></i>
                  </a>
                </div>
              </div>
              <div class="block-content">
                <h5 class="title">
                  <a href="<?=$f->url?>-<?=$f->id?>.html"><?=$f->name?></a>
                </h5>
              </div>
            </div>
            <?php endforeach?>
          </div>
        </div>
      </section>
      <section class="comment">
      <?php if(isset($_SESSION['message'])):?>
                    <div class="alert alert-danger"><?php echo $_SESSION['message']?></div>
      <?php endif?>
      <?php unset($_SESSION['message'])?>
        <fieldset style="width:430px;margin-left:10px">
          <legend>Bình Luận</legend>
          <form>
            <table>
              <tr>
                <td>Nội Dung:</td>
                <td><textarea name="content" class="com-mess"></textarea></td>
              </tr>
              <tr> 
                <td></td>
                <td><div id="com-submit">
                    <a href="javascript:void(0)" class="swin-btn">
                      <span style="text-algin:center;">Bình Luận</span>
                    </a>
                  </div></td>
              </tr>
            </table>
          </form>
        </fieldset>
        <fieldset style="width:428px;margin-left:10px;padding:0 0 8px 2px;">
          <p class="cmt"></p>
          <legend>Bình Luận Cũ</legend>
          <?php foreach($comment as $c):?>
          <ul>
            <li class="list">
           
            <img class="image" style="width:30px;height:30px;"src="public/source/assets/images/background/download.png" alt="">
              <div class="content">
                <b><?= $c->username?></b>&nbsp<small><a class="lrep" id_cmt="<?=$c->id?>">Trả Lời</a></small>
                <p><?= $c->message?></p>
                <?php 
                $array = get_object_vars($c);
                $idcmtt=$array['id']; 
                $rep = $model1->getRepCommentByIdCmt($idcmtt);
                ?>
                <ul class="ullist<?=$idcmtt?>">
                <?php foreach($rep as $r):?>
                 <li class="list-small">                                  
                    <div class="content">               
                    <img class="image" style="width:20px;height:20px;"src="public/source/assets/images/background/download.png" alt="">
                      <b><?= $r->name_rep?></b>
                      <p><?= $r->message_rep?></p> 
                     
                    </div>       
                 </li>
                 <?php endforeach?>
                </ul>          
              </div>      
              <fieldset style="width:350px;margin-left:52px;" class="repcmt<?= $idcmtt?>" id="hidet<?= $idcmtt?>">
                  <legend>Phản Hồi</legend>
                  <form action="">
                    <table>
                      <tr>
                        <td>Nội Dung:</td>
                        <td><textarea name="" class="rep-mess<?=$c->id?>"></textarea></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                        <div  class="rep-submit" id-cmt="<?=$c->id?>">
                    <a href="javascript:void(0)" class="swin-btn">
                      <span>PHẢN HỒI</span>
                    </a>
                  </div>
                        </td>
                    </tr>
                    </table>
                 </form>
                </fieldset>
            </li>
          </ul>
          <?php endforeach?>
              </div>   
            </li>
          </ul>
        </fieldset>
      </section>
    </div>
  </div>
</div>

<div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-body">
                <p>Bạn Chưa Đăng Nhập</p>
                <p>Vui Lòng<a href="dang_ky.php"> Đăng Nhập </a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<script>
      $(document).ready(function(){
        $('#add-to-cart').click(function(){ 
          <?php
            if(isset($_SESSION['name'])){
          ?>
            var idSP = $(this).attr('data-id') 
            var qty = $('.txtQty').val()
            $.ajax({
                url:"cart.php",
                data:{
                    id:idSP , // $_POST['id']
                    quantity: qty // $_POST['quantity]
                },
                type:"POST",
                success:function(result){ //result: response from server
                   // console.log(result)
                    $('.name-food').html(result)
                    $('#myModal').modal('show')
                }   
            })
            <?php }else{?>
            $('#myModal1').modal('show')
          <?php }?>
        })

      })
    </script>