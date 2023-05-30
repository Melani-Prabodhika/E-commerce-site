<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);
?>

<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>
<div class="content">
    <div class="jumbotron">
        <div class="card">
            <h4>Products</h4>
        </div>
        <div id="crdbtn" class="card">
            <div class="fltrght card_body">
            <button class='btn btn-secondary btn-sm '><a style="color:white;text-decoration:none;" href='manage_product.php'>Add Products</a></button>
            </div>
            <h2></h2>
            <h2></h2>
        </div>

        <div class="card">
            <div class="card_body">
                <div class="table-responsive">
                    <table id ="example" class="table table-dark table-hover">
                        <thead>
                                <tr>
                                <th class="serial">#</th>
                                <th>ID</th>
                                <th>Categories</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Image 2</th>
                                <th>MRP</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th></th>
                                </tr>
                        </thead>
                        <tbody>
                    
                            <tr>
                            <?php 
                            $i=1;
                            while($row=mysqli_fetch_assoc($res)){?>
                                <td class="serial"><?php echo $i++?></td>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['categories']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><img width="100" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
                                <td><img width="100" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image2']?>"/></td>
                                <td><?php echo $row['mrp']?></td>
                                <td><?php echo $row['price']?></td>
                                <td><?php echo $row['qty']?><br/><br/><br/>
							   <?php
							   $productSoldQtyByProductId=productSoldQtyByProductId($con,$row['id']);
							   $pneding_qty=$row['qty']-$productSoldQtyByProductId;
							   
							   ?>
							   Pending Qty <?php echo $pneding_qty?></td>
                                <td>
                                <?php
                                
                                
                                if($row['status'] ==1){
                                    echo "<button class='btn btn-success btn-sm'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></button>&nbsp;";
                                }else{
                                    echo "<button class='btn btn-warning btn-sm'><a class=dbtn href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></button>&nbsp;";
                                }
                                echo "&nbsp;<button class='btn btn-primary btn-sm'><a href='manage_product.php?id=".$row['id']."'>Edit</a></button>&nbsp;";
                                echo "&nbsp;<button class='btn btn-danger btn-sm'><a href='?type=delete&id=".$row['id']."'>Delete</a></button>";
                                
                            ?>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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