<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con,$_GET['id']);
?>
<style>
    .srchdrag{
        display: none;
    }

    .crttble {
    width: 100%;
    text-align:center;
    }

    .crttble th{
        text-align:center;
    }



    .tttlbrd{
        border-top: 1px solid #fff;
    }

    .tttlbrd td:last-child{
        text-align:right;
    }

    .crttble th:last-child{
        text-align:right;
    }

    .product-name{
        text-align:right;
    }


</style>
        
<div class="wrapper table-responsive">
    <form action="#">
        <div class="cart-page">
            <table class="crttble">
                <thead>
                    <tr>
                        <th class="product-thumbnail">Product Name</th>
                        <th class="product-thumbnail">Product Image</th>
                        <th class="product-name">Qty</th>
                        <th class="product-price">Price</th>
                        <th class="product-price">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $uid=$_SESSION['USER_ID'];
                    $res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
                    $total_price=0;
                    while($row=mysqli_fetch_assoc($res)){
                    $total_price=$total_price+($row['qty']*$row['price']);
                    ?>
                    <tr>
                        <td><?php echo $row['name']?></td>
                        <td> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
                        <td><?php echo $row['qty']?></td>
                        <td><?php echo $row['price']?></td>
                        <td class="product-name"><?php echo $row['qty']*$row['price']?></td>
                        
                    </tr>
                    <?php } ?>
                    <tr class="tttlbrd">
                        <td colspan="3"></td>
                        <td class="product-name">Total Price</td>
                        <td class="product-name"><?php echo $total_price?></td>
                    </tr>
                </tbody>
                
            </table>
        </div>  
    </form>
</div>                            
        						
<?php require('footer.php')?>        