<?php 
require('top.php');

if(!isset($_GET['id']) && $_GET['id']!=''){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}

$cat_id=mysqli_real_escape_string($con,$_GET['id']);

$sub_categories='';
if(isset($_GET['sub_categories'])){
	$sub_categories=mysqli_real_escape_string($con,$_GET['sub_categories']);
}
$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
if(isset($_GET['sort'])){
	$sort=mysqli_real_escape_string($con,$_GET['sort']);
	if($sort=="price_high"){
		$sort_order=" order by product.price desc ";
		$price_high_selected="selected";	
	}if($sort=="price_low"){
		$sort_order=" order by product.price asc ";
		$price_low_selected="selected";
	}if($sort=="new"){
		$sort_order=" order by product.id desc ";
		$new_selected="selected";
	}if($sort=="old"){
		$sort_order=" order by product.id asc ";
		$old_selected="selected";
	}

}

if($cat_id>0){
	$get_product=get_product($con,'',$cat_id,'','',$sort_order,'',$sub_categories);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}										
?>

<style>
    .sub-nav ul li:nth-child(2){
        display:none;
    }
</style>


<div style="height:200px;">
    </div>


<?php if(count($get_product)>0){?>

<div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select" onchange="sort_product_drop('<?php echo $cat_id?>','<?php echo SITE_PATH?>')" id="sort_product_id">
                                        <option value="">Default softing</option>
                                        <option value="price_low" <?php echo $price_low_selected?>>Sort by price low to hight</option>
                                        <option value="price_high" <?php echo $price_high_selected?>>Sort by price high to low</option>
                                        <option value="new" <?php echo $new_selected?>>Sort by new first</option>
										<option value="old" <?php echo $old_selected?>>Sort by old first</option>
                                    </select>
                                </div>
                               
                            </div>

<section id="drp" class="best-sellers">
    <div class="drp"></div>
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
                    <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a>
                    
                    <div>
                        <span class="card__preci card__preci--before"><?php echo $list['name']?></span>
                        <span class="card__preci card__preci--now">Rs. <?php echo number_format($list['price'])?></span>
                    </div>
                    <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a>
                </div>
        </div>
        <?php } ?>
    </div>
</section>

<?php } else {  $dnot='<center><span style="color:#fff;">Data not found</span></center>';
						echo $dnot;
					} ?>


<div style="height:200px;">
    </div>
<input type="hidden" id="qty" value="1"/>
<script type="text/javascript">
    function myFunction() {
      document.getElementById("dropwrapper").classList.toggle("show");
      document.getElementById("tooltip").classList.toggle("show");
      document.getElementById("drpspn").classList.toggle("show");
    }
    //to hide content when you click anywhere
    window.onclick = function(event) {
      if (!event.target.matches('.drop-btn')){
        var dropdowns = document.querySelectorAll(".dropwrapper,.tooltip,#drpspn");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
              var opendropdown = dropdowns[i];
          if(opendropdown.classList.contains('show')){
            opendropdown.classList.remove('show');
          }
        }
      }
    }
  </script>   




<?php require('footer.php')?> 