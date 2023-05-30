<?php
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($con,"update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	}else{
		mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
	}
	
}
?>

<style>
table .product-name img{
    width: 130px;
	object-fit:contain;
}

#address_details{
	margin:10px;
	color:#fff;
}

#address_details p{
	margin:10px;
}

.ordrfrm{
	width:250px;
	margin-top:30px;
}
</style>
<div class="content">
   <!-- Button trigger modal -->
	<div class="jumbotron">
		<div class="card">
			<h4>Orders</h4>
		</div>
		

		<div class="card">
			<div class="card_body">
				<div class="table-responsive">
					<table id ="example" class="table table-dark table-hover ">
						<thead>
							<tr>
							<th>Name</th>
							<th>Image</th>
							<th>Qty</th>
							<th>Price</th>
							<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image,`order`.address,`order`.city,`order`.pincode from order_detail,product ,`order` where order_detail.order_id='$order_id' and  order_detail.product_id=product.id GROUP by order_detail.id");
							$total_price=0;
							
							$userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from `order` where id='$order_id'"));
							
							$address=$userInfo['address'];
							$city=$userInfo['city'];
							$pincode=$userInfo['pincode'];
							
							while($row=mysqli_fetch_assoc($res)){
							
							$total_price=$total_price+($row['qty']*$row['price']);
							?>
							<tr>
								<td class="product-name"><?php echo $row['name']?></td>
								<td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
								<td class="product-name"><?php echo $row['qty']?></td>
								<td class="product-name">Rs. <?php echo number_format($row['price'])?></td>
								<td class="product-name">Rs. <?php echo number_format($row['qty']*$row['price'])?></td>
								
							</tr>
							<?php } ?>
							<tr>
								<td colspan="3"></td>
								<td class="product-name">Total : </td>
								<td class="product-name">Rs. <?php echo number_format($total_price)?></td>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div id="address_details">
			<strong>Address :</strong>
			<p><?php echo $address?>, <?php echo $city?></p>
			<strong>Zip Code</strong>
			<p><?php echo $pincode?></p>
			<strong>Order Status :</strong>
			<?php 
			$order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
			echo $order_status_arr['name'];
			?>
			
			<div>
				<form class="ordrfrm" method="post">
					<select class="form-control" name="update_order_status" required>
						<option value="">Select Status</option>
						<?php
						$res=mysqli_query($con,"select * from order_status");
						while($row=mysqli_fetch_assoc($res)){
							if($row['id']==$categories_id){
								echo "<option selected value=".$row['id'].">".$row['name']."</option>";
							}else{
								echo "<option value=".$row['id'].">".$row['name']."</option>";
							}
						}
						?>
					</select>
					<input type="submit" style="margin-top:20px; width:100px;" class="form-control"/>
				</form>
			</div>
		</div>
		</div>
		
	</div>    
</div>

    <script type="text/javascript">
    $(document).ready(function(){
        $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
        });

        $('.content').click(function(){
            $('.check1').prop('checked', true);
        });

     
});
        
$(document).ready(function() {
    $('#example').DataTable({
        lengthMenu: [ 05, 10, 25 ]
    });
} );
   

          

    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>