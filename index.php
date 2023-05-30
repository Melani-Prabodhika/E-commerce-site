<?php 
require('top.php');


?>
    

    <main>
        
        <div class="wrapper">
            <section class="home">
                <div class="slider">
                    <?php
                    foreach($ban_arr as $list){
                    ?>
                    <div class="slide active" style="background-image: url('<?php echo BANNER_IMAGE_SITE_PATH.$list['image']?>')">
                        <div class="container">
                            <div class="caption">
                                <h1><?php echo $list['name']?></h1>
                                <p><?php echo $list['description']?></p>
                                <a href="">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            
            <!-- controls  -->
            <div class="controls">
                <div class="prev"><i class="ti-arrow-circle-left"></i></div>
                <div class="next"><i class="ti-arrow-circle-right"></i></div>
            </div>
        
            <!-- indicators -->
            <div class="indicator"></div>
            </section>
        
            
            


            <section class="best-sellers">
                <div class="section-info">
                    <h3>New Arrivals</h3>
                </div>

                
                <div class="product-grid">
                    <?php
                        $get_product=get_product($con,4);
                        foreach($get_product as $list){
                    ?>
                    <div class="product">
                            <div class="productnew">
                                <a href="product.php?id=<?php echo $list['id']?>">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="">
                                </a>
                            </div>    
                            <div class="card__precis">
                                <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a>
                                
                                <div>
                                    <a href="product.php?id=<?php echo $list['id']?>"><span class="card__preci card__preci--before"><?php echo $list['name']?></span></a>
                                    <span class="card__preci card__preci--now number-separator">Rs. <?php echo number_format($list['price'])?></span>
                                </div>
                                <input style="display:none;" id="qty" type="number" value ="1">
                                <a id="crtld" href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')" class="card__icon ajxftch"><ion-icon name="cart-outline"></ion-icon></a>
                            </div>
                    </div>
                    <?php } ?>
                </div>

                
            </section>

            <section id="ctgry">
                <div class="section-info">
                    <h3>Categories</h3>
                </div>
                <div class="ctgry-container">
                    <ul id="autoWidth" class="cs-hidden">

                    <?php
						foreach($cat_arr as $list){
						?>
                        <li class="item-a">
                            <a href="categories.php?id=<?php echo $list['id']?>">
                            <div class="box" style="background-image: url(<?php echo CATEGORY_IMAGE_SITE_PATH.$list['image']?>);">
                                <p class="ctgryname"><?php echo $list['categories']?></p>
                                <div class="ctgrydetails">
                                    <p>Lorem ipsum dummy text</p>
                                </div>
                            </div></a> 
                        </li>
                        <?php
						}
						?>

                        
                    </ul>
                </div>
            </section>


            <section class="best-sellers">
                <div class="section-info">
                    <h3>Best Sellers</h3>
                </div>

                <div class="product-grid flscrn">
                <?php
							$get_product=get_product($con,4,'','','','','yes');
							foreach($get_product as $list){
							?>
                    <div class="product">
                    <div class="productnew">
                                <a href="product.php?id=<?php echo $list['id']?>">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="">
                                </a>
                            </div>    
                            <div class="card__precis">
                                <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a>
                                
                                <div>
                                    <a href="product.php?id=<?php echo $list['id']?>"><span class="card__preci card__preci--before"><?php echo $list['name']?></span></a>
                                    <span class="card__preci card__preci--now number-separator">Rs. <?php echo number_format($list['price'])?></span>
                                </div>
                                <input style="display:none;" id="qty" type="number" value ="1">
                                <a id="crtld" href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')" class="card__icon ajxftch"><ion-icon name="cart-outline"></ion-icon></a>
                            </div>
                            
                    </div>
                    <?php } ?>

                </div>
            </section>
        </div>

        <section class="services-section">
            <div class="wrapper">
                <div class="section-info">
                    <h3>Our Services</h3>
                </div>

                <div class="services">
                    
                    <div class="service">
                        <div class="service-icon">
                            <span class="fas fa-microchip"></span>
                        </div>
                        <div class="service-info">
                            <h5>Arduino</h5>
                        </div>
                    </div>

                    <div class="service">
                        <div class="service-icon">
                            <span class="fas fa-network-wired"></span>
                        </div>
                        <div class="service-info">
                            <h5>Networking</h5>
                        </div>
                    </div>

                    <div class="service">
                        <div class="service-icon">
                            <span class="fas fa-tools"></span>
                        </div>
                        <div class="service-info">
                            <h5>PC | Laptop Repair</h5>
                        </div>
                    </div>

                    <div class="service">
                        <div class="service-icon">
                            <span class="fas fa-video"></span>
                        </div>
                        <div class="service-info">
                            <h5>CCTV Installation</h5>
                        </div>
                    </div>

                </div>

            </div>

        </section>
    </main>
    
    <input type="hidden" id="qty" value="1"/>
    <?php require('footer.php')?>