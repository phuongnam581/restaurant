<?php
$menus = $data['menus'];
?>
      <div id="html-content" class="wrapper-content">
        <div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-menu">
            <div class="container">
              <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Thực đơn</div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">The various dishes are waiting for your coming to enjoy its</div>
              </div>
            </div>
          </div>
          <div class="page-content-wrapper">
            <section class="product-sesction-menu padding-bottom-100 padding-top-100">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="swin-sc swin-sc-title style-3">
                      <p class="title"><span>THỰC ĐƠN</span></p>
                    </div>
                    <div class="swin-sc swin-sc-product products-01 style-02 woocommerce">
                      
                      <div class="row">
                        <div class="nav-slider">
                          <div class="tab-content">
                            <div class="col-md-5 col-sm-12">
                              <div class="cat-wrapper">
                                <div class="item"><img src="public/source/assets/images/background/ab_team_01.png" alt="" class="img img-responsive img-full"></div>
                              </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                              <div class="products">
                              <?php  foreach($menus as $m):?>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title"><?=$m->name?></h5>
                                    <div class="des"><?=$m->detail?></div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><?=$m->price?></span><span class="price-symbol">vnd</span></div>
                                </div>
                                <?php endforeach?>
                              </div>
                            </div>
                          </div>
                          <div class="tab-content">
                            <div class="col-md-5 col-sm-12">
                              <div class="cat-wrapper">
                                <div class="item"><img src="assets/images/product/pd-cat-lunch.png" alt="" class="img img-responsive img-full"></div>
                              </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                              <div class="products">
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">The Cracker Barrel's Country Boy Breakfast</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Grandpa's Country Fried Breakfast </h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Uncle Herschel's Favorite </h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>45.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Chinese Chicken Bread Spicy Soup</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>12.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Old Timer's Meat Breakfast</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>12.0</span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-content">
                            <div class="col-md-5 col-sm-12">
                              <div class="cat-wrapper">
                                <div class="item"><img src="assets/images/product/pd-cat-dinner.png" alt="" class="img img-responsive img-full"></div>
                              </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                              <div class="products">
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Uncle Herschel's Favorite </h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>45.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Old Timer's Meat Breakfast</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>12.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">The Cracker Barrel's Country Boy Breakfast</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Grandpa's Country Fried Breakfast </h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Chinese Chicken Bread Spicy Soup</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>12.0</span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-content">
                            <div class="col-md-5 col-sm-12">
                              <div class="cat-wrapper">
                                <div class="item"><img src="assets/images/product/pd-cat-dessert.png" alt="" class="img img-responsive img-full"></div>
                              </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                              <div class="products">
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">The Cracker Barrel's Country Boy Breakfast</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Grandpa's Country Fried Breakfast </h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Old Timer's Meat Breakfast</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>12.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Uncle Herschel's Favorite </h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>45.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Chinese Chicken Bread Spicy Soup</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>12.0</span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-content">
                            <div class="col-md-5 col-sm-12">
                              <div class="cat-wrapper">
                                <div class="item"><img src="assets/images/product/pd-cat-lunch.png" alt="" class="img img-responsive img-full"></div>
                              </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                              <div class="products">
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Old Timer's Meat Breakfast</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>12.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">The Cracker Barrel's Country Boy Breakfast</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>25.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Grandpa's Country Fried Breakfast </h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>30.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Uncle Herschel's Favorite </h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>45.0</span></div>
                                </div>
                                <div class="item product-01">
                                  <div class="item-left">
                                    <h5 class="title">Chinese Chicken Bread Spicy Soup</h5>
                                    <div class="des">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum </div>
                                  </div>
                                  <div class="item-right"><span class="price woocommerce-Price-amount amount"><span class="price-symbol">$</span>12.0</span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    