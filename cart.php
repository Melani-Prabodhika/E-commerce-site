<?php 
require('top.php');?>
<style>


</style>

<div class="cart-page">
    <table id ="crttble" class="crttble">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Sub Total</th>
            <th></th>
        </tr>

        <?php
            $cart_total=0;
            if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key=>$val){
            $productArr=get_product($con,'','',$key);
            $pname=$productArr[0]['name'];
            $mrp=$productArr[0]['mrp'];
            $price=$productArr[0]['price'];
            $image=$productArr[0]['image'];
            $qty=$val['qty'];
            $cart_total=$cart_total+($price*$qty);
        ?>

        <tr>
            <td>
                <div class="cart-info">
                    <a href=""><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"></a>
                    <div>
                        <a class="crtpnme" href=""><p><?php echo $pname?></p></a>
                        <small>Rs. <?php echo number_format($price)?></small>
                    </div>
                </div>
            </td>
            <td>
                <input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>">
                <br>
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
            </td>
            <td>Rs. <?php echo number_format($qty*$price)?></td>
            <td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')" class="fas fa-times"></a></td>
        </tr>
        <?php } } ?>
    </table>
    
    <div id="totce" class="total-price">
        <div class="crtsts">
            <div class="hddfa"><h1>Total</h4></div>
            <div class="crtttl"><p><?php echo number_format($cart_total)?></p></div>
            <div class="chckiy"><a href="checkout.php">Checkout</a></div>
        </div>
    </div>
</div>
<div class="total-price2">
        <div class="crtsts2">
            <div class="hddfa2"><h3>Total</h3></div>
            <div class="crtttl2"><p><?php echo number_format($cart_total)?></p></div>
            
        </div>
        <center><div class="chckiy2"><a href="">Checkout</a></div></center>
    </div>



<?php 
require('footer.php');?>