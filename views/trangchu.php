<?php
$foods = $data['foods'];
$allFoods = $data['allFoods'];
// print_r($allFoods);
// die;
?>
  <div class="page-container">
    <div class="top-header top-bg-parallax">
      <div data-parallax="scroll" data-image-src="public/source/assets/images/slider/slider2-bg1.jpg" class="slides parallax-window">
        <div class="slide-content slide-layout-02">
          <div class="container">
            <div class="slide-content-inner">
              <img src="public/source/assets/images/slider/slider2-icon.png" data-ani-in="fadeInUp" data-ani-out="fadeOutDown"
                data-ani-delay="500" alt="fooday" class="slide-icon img img-responsive animated">
              <h3 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1000" class="slide-title animated">FOODAY RESTAURANT</h3>
              <p data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1500" class="slide-sub-title animated">
                <span class="line-before"></span>
                <span class="line-after"></span>
                <span class="text">
                  <span>Tasty</span>
                  <span>Delicious</span>
                  <span>Savoury</span>
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-content-wrapper">
      <section class="about-us-session padding-top-100 padding-bottom-100">
        <div class="container">
          <div class="row">
            <div class="col-md-6 colsm-12">
              <img src="public/source/assets/images/pages/home1-about.jpg" alt="" class="img img-responsive wow zoomIn">
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="swin-sc swin-sc-title style-4 margin-bottom-20 margin-top-50">
                <p class="top-title">
                  <span>Giới thiệu</span>
                </p>
                <h3 class="title">FOODAY</h3>
              </div>
              <p class="des font-bold text-center">CHÚNG TÔI LUÔN CUNG CẤP NHỮNG MÓN ĂN THƠM NGON VÀ ĐẢM BẢO VỆ SINH</p>
              <p class="des margin-bottom-20 text-center">Đặt món tại nhà hàng thực khách sẽ được thưởng thức những món ăn thượng hạng như bào ngư, vây cá, yến, Hải sâm…. 
                    Ngoài những món ăn thượng hạng,FOODAY còn có thực đơn phong phú với các món ăn độc đáo, bổ dưỡng do chính đầu bếp đến từ những nơi nổi tiếng chế biến.</p>
              <div class="swin-btn-wrap center">
                <a href="#" class="swin-btn center form-submit btn-transparent">
                  <span> About Us</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="product-sesction-03-1 padding-top-100 padding-bottom-100">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1">
              <div class="swin-sc swin-sc-title text-left light">
                <h3 class="title">Món ăn trong ngày</h3>
              </div>
              <div class="swin-sc swin-sc-product products-01 style-04 light swin-vetical-slider">
                <div class="row">
                  <div class="col-md-12">
                    <div data-height="200" class="products nav-slider">
                      <?php foreach($foods as $f):?>
                      <div class="item product-01">
                        <div class="item-left">
                          <img src="public/source/assets/images/hinh_mon_an/<?=$f->image?>" alt="" class="img img-responsive">
                          <div class="content-wrapper">
                            <a href="<?=$f->url?>-<?=$f->id?>.html" class="title">
                              <?=$f->name?>
                            </a>
                            <div class="dot">...................</div>
                            <div class="des">
                              <?=$f->summary?>
                            </div>
                          </div>
                        </div>
                        <div class="item-right">
                          <span class="price woocommerce-Price-amount amount">
                            <?=number_format($f->price)?>
                              <span class="price-symbol">vnd</span>
                          </span>
                        </div>
                      </div>
                      <?php endforeach ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="product-sesction-02 padding-top-100 padding-bottom-100">
        <div class="container">
          <div class="swin-sc swin-sc-title style-3">
            <p class="title">
              <span>Danh sách món ăn</span>
            </p>
          </div>
          <div class="swin-sc swin-sc-product products-02 carousel-02">

            <div class="products nav-slider">
              <div class="row slick-padding">
                <?php foreach($allFoods as $f):?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="blog-item item swin-transition">
                    <div class="block-img">
                      <img src="public/source/assets/images/hinh_mon_an/<?=$f->image?>" alt="" class="img img-responsive" style="height:250px">
                      <div class="block-circle price-wrapper">
                        <span class="price woocommerce-Price-amount amount">
                            <?=number_format($f->price)?>
                            <span class="price-symbol"> vnd</span>
                        </span>
                      </div>
                      <div class="group-btn">
                        <a href="<?=$f->url?>-<?=$f->id?>.html" class="swin-btn btn-link">
                          <i class="icons fa fa-link"></i>
                        </a>
                        <a  class="swin-btn btn-add-to-card" data-id="<?=$f->id?>">
                          <i class="fa fa-shopping-basket"></i>
                        </a>
                      </div>
                    </div>
                    <div class="block-content">
                      <h5 class="title">
                        <a href="<?=$f->url?>-<?=$f->id?>.html">
                          <?=$f->name?>
                        </a>
                      </h5>
                      <div class="product-info">
                        <?=$f->summary?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach?>
              </div>

            </div>
            <!-- <?=$data['pagination']?> -->

          </div>

        </div>
      </section>

    </div>
  </div>