<?php 
require('top.php');
$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
	$get_product=get_product($con,'','','',$str);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}										
?>

<div style="height:200px;">
    </div>
<?php if(count($get_product)>0){?>
<div class="product-grid">
<?php
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

					<?php } else { $dnot='<center><span style="color:#fff; margin-top:200px!important;">Data not found</span></center>';
						echo $dnot;
					} ?>
                
				</div>
            </div>
        </section>
		<div style="height:200px;">
    </div>
        <!-- End Product Grid -->
        <!-- End Banner Area -->
		<input type="hidden" id="qty" value="1"/>
<?php require('footer.php')?>        