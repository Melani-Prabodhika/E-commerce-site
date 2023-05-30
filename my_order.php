<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
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
    .crttble tr:hover{
        background:#363636;
    }
</style>
<div class="wrapper table-responsive">
    <form action="#">
        <div class="cart-page">
                <table class="crttble">
                    
                    <thead>
                        <tr>
                            <th class="product-thumbnail">Order ID</th>
                            <th class="product-name"><span class="nobr">Order Date</span></th>
                            <th class="product-price"><span class="nobr"> Address </span></th>
                            <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                            <th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
                            <th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $uid=$_SESSION['USER_ID'];
                        $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status");
                        while($row=mysqli_fetch_assoc($res)){
                        ?>
                        
                        <tr class='clickable-row' data-href="my_order_details.php?id=<?php echo $row['id']?>">
                            <td class="product-add-to-cart"><?php echo $row['id']?><br><a style="background:blue;color:#fff;padding:2px 5px;top:5px;border-radius:5px;" href="order_pdf.php?id=<?php echo $row['id']?>"> PDF</a></td>
                            <td class="product-name"><?php echo $row['added_on']?></td>
                            <td class="product-name">
                            <?php echo $row['address']?><br/>
                            <?php echo $row['city']?><br/>
                            <?php echo $row['pincode']?>
                            </td>
                            <td class="product-name"><?php echo $row['payment_type']?></td>
                            <td class="product-name"><?php echo ucfirst($row['payment_status'])?></td>
                            <td class="product-name"><?php echo $row['order_status_str']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
            </div> 
        </div>  
    </form>
</div>

<script>
    jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
        
        						
<?php require('footer.php')?>        