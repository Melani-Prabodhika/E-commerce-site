<?php 
require('top.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
<style>

	


.card-wrapper{
    max-width: 1100px;
    margin: 0 auto;
	color: #000;
	padding-top: 80px;
}
img{
    width: 100%;
    display: block;
}

.card{
	background-color: #000;
}


.img-display{
    overflow: hidden;
}
.img-showcase{
    display: flex;
    width: 100%;
    transition: all 0.5s ease;
}
.img-showcase img{
    min-width: 100%;
}
.img-select{
    display: flex;
}
.img-item{
    margin: 0.3rem;
}
.img-item:nth-child(1),
.img-item:nth-child(2),
.img-item:nth-child(3){
    margin-right: 0;
}
.img-item:hover{
    opacity: 0.8;
}
.product-content{
    padding: 2rem 1rem;
}
.product-title{
    font-size: 3rem;
    text-transform: capitalize;
    font-weight: 700;
    position: relative;
    color: #fff;
    margin: 1rem 0;
}
.product-title::after{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 4px;
    width: 80px;
    background: #12263a;
}
.product-link{
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 400;
    font-size: 0.9rem;
    display: inline-block;
    margin-bottom: 0.5rem;
    background: #256eff;
    color: #fff;
    padding: 0 0.3rem;
    transition: all 0.5s ease;
}
.product-link:hover{
    opacity: 0.9;
}
.product-rating{
    color: #ffc107;
}
.product-rating span{
    font-weight: 600;
    color: #252525;
}
.product-price{
    margin: 1rem 0;
    font-size: 1rem;
    font-weight: 700;
}
.product-price span{
    font-weight: 400;
}
.last-price span{
    color: #f64749;
    text-decoration: line-through;
}
.new-price span{
    color: #256eff;
}
.product-detail h2{
    text-transform: capitalize;
    color: #12263a;
    padding-bottom: 0.6rem;
}
.product-detail p{
    font-size: 0.9rem;
    padding: 0.3rem;
    opacity: 0.8;
}
.product-detail ul{
    margin: 1rem 0;
    font-size: 0.9rem;
}
.product-detail ul li{
    margin: 0;
    list-style: none;
    background: url(shoes_images/checked.png) left center no-repeat;
    background-size: 18px;
    padding-left: 1.7rem;
    margin: 0.4rem 0;
    font-weight: 600;
    opacity: 0.9;
}
.product-detail ul li span{
    font-weight: 400;
}
.purchase-info{
    margin: 1.5rem 0;
}
.purchase-info input,
.purchase-info .btn{
    border: 1.5px solid #ddd;
    border-radius: 25px;
    text-align: center;
    padding: 0.45rem 0.8rem;
    outline: 0;
    margin-right: 0.2rem;
    margin-bottom: 1rem;
}
.purchase-info input{
    width: 60px;
}
.purchase-info .btn{
    cursor: pointer;
    color: #fff;
}
.purchase-info .btn:first-of-type{
    background: #256eff;
}
.purchase-info .btn:last-of-type{
    background: #f64749;
}
.purchase-info .btn:hover{
    opacity: 0.9;
}
.social-links{
    display: flex;
    align-items: center;
}
.social-links a{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    color: #000;
    border: 1px solid #000;
    margin: 0 0.2rem;
    border-radius: 50%;
    text-decoration: none;
    font-size: 0.8rem;
    transition: all 0.5s ease;
}
.social-links a:hover{
    background: #000;
    border-color: transparent;
    color: #fff;
}

@media screen and (min-width: 600px){
    .card{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }
    .card-wrapper{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .product-imgs{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .product-content{
        padding-top: 0;
    }
    
}



.product img {
    transition: transform, 0.5s ease;
    width: 200px;
    height: 200px;
    margin-left: 400px;
  }
.product img:hover {
    transform: scale(1.1);
  }

  .price{
	  color: #256eff;
  }


 .abc{
	
	width: 200px; 
	height: 75%;
	object-fit: contain;
 }


  
 




	/* css */

</style>



<!-- cop -->

<div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display" >
            <div class = "img-showcase">
              <img src = "<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt = "item image" class="abc"  >
              <img src = "<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image2']?>" alt = "item image" class="abc" >
              
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt = "item image" style="width: 100px; height: 75px;">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image2']?>" alt = "item image" style="width:100px ; height: 75px;">
              </a>
            </div>
            
          </div>
        </div>
		
        <!-- card right -->
        <div class = "product-content">
          <div><h2 class = "product-title"><?php echo $get_product['0']['name']?></h2></div>
          <div><h2 class="price">Rs. <?php echo number_format($get_product['0']['price'])?></h2></div>
          <div class="sin__desc">
										<?php
										$productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);
										
										$pending_qty=$get_product['0']['qty']-$productSoldQtyByProductId;
										
										$cart_show='yes';
										if($get_product['0']['qty']>$productSoldQtyByProductId){
											$stock='In Stock';			
										}else{
											$stock='Not in Stock';
											$cart_show='';
										}
										?>
                                        <p style="color:#fff;"><span style="color:#fff;" >Availability:</span> <?php echo $stock?></p>
                                        <p style="color:#fff;"><span style="color:#fff;" >Available Quantity:</span> <?php echo $pending_qty?></p>
                                    </div>
		  <div><input id="qty" type="number" value ="1"></div>

		  <div><a href="#"><?php echo $get_product['0']['categories']?></a></div>
          <?php
								if($cart_show!=''){
								?>
				<div class="prdctbtns">
					<a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')"><button type="button" class="btn btn-warning">Add To Cart</button></a>
					<!-- <a href=""><button type="button" class="btn btn-danger">Buy</button></a> -->
				</div>
                <div style ="margin-top:10px;" class="prdctbtns">
					<a class="buy_now" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add','yes')"><button type="button" class="btn btn-primary">Buy Now</button></a>
					<!-- <a href=""><button type="button" class="btn btn-danger">Buy</button></a> -->
				</div>
                <?php } ?>
          
        </div>
      </div>
    </div>


<!-- cop -->

<dev  >
<h3 style="color: white; margin: 0 0 0 100px; ">Description</h3>
	<pre style="color: white; margin: 20px 0 0 100px; "><?php echo $get_product['0']['description']?></pre>
</dev>




<script src="zoomsl.js" type="text/javascript"></script>


<!-- image hower and zoom  -->

<script>


$(document).ready(function(){
		$(".abc").imagezoomsl({
			zoomrange: [3,3]
		});
	});

const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);


</script>


<!-- image hower and zoom -->



<?php 
require('footer.php');
?>