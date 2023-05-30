<?php 
require('top.php');
$link="wishlist.php";
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='login-user.php?continue=<?php echo $link ?>';
	</script>
	<?php
}
$uid=$_SESSION['USER_ID'];

$res=mysqli_query($con,"select product.name,product.image,product.price,product.mrp,product.id as pid,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
?>

<style>
.crttble {
    width: 100%;
}
</style>

<div class="cart-page">
    <table class="crttble">
        <tr>
            <th>Product</th>
            <th>Add to Cart</th>
            <th></th>
        </tr>

        
        <?php
        while($row=mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td>
                <div class="cart-info">
                    <a href=""><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></a>
                    <div>
                        <a class="crtpnme" href=""><p><?php echo $row['name']?></p></a>
                        <small>Rs. <?php echo number_format($row['price'])?></small>
                    </div>
                </div>
            </td>
            <td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $row['pid']?>','add')"><ion-icon name="cart-outline"></a></td>
            <td><a href="wishlist.php?wishlist_id=<?php echo $row['id']?>" class="fas fa-times"></a></td>
        </tr>
        <?php } ?>
    </table>
    
    </div>
        
<input type="hidden" id="qty" value="1"/>						
<?php require('footer.php')?>        