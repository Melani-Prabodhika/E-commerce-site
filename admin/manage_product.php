<?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$image2='';
$short_desc	='';
$description	='';
$meta_title	='';
$meta_description	='';
$meta_keyword='';
$sub_categories_id='';
$best_seller='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$sub_categories_id=$row['sub_categories_id'];
		$name=$row['name'];
		$mrp=$row['mrp'];
		$price=$row['price'];
		$qty=$row['qty'];
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$best_seller=$row['best_seller'];
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$sub_categories_id=get_safe_value($con,$_POST['sub_categories_id']);
	$name=get_safe_value($con,$_POST['name']);
	$mrp=get_safe_value($con,$_POST['mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);
	$short_desc=get_safe_value($con,$_POST['short_desc']);
	$description=get_safe_value($con,$_POST['description']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
	$best_seller=get_safe_value($con,$_POST['best_seller']);
	
	$res=mysqli_query($con,"select * from product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image2']['type']!='image/png' && $_FILES['image2']['type']!='image/jpg' && $_FILES['image2']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}else{
			if($_FILES['image2']['type']!='image/png' && $_FILES['image2']['type']!='image/jpg' && $_FILES['image2']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!='' && $_FILES['image2']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				$image2=rand(111111111,999999999).'_'.$_FILES['image2']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				move_uploaded_file($_FILES['image2']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image2);
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',image2='$image2',best_seller='$best_seller', sub_categories_id='$sub_categories_id' where id='$id'";
			}
			elseif($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
			}
			elseif($_FILES['image2']['name']!=''){
				$image2=rand(111111111,999999999).'_'.$_FILES['image2']['name'];
				move_uploaded_file($_FILES['image2']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image2);
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image2='$image2',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
			}
			else{
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			$image2=rand(111111111,999999999).'_'.$_FILES['image2']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			move_uploaded_file($_FILES['image2']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image2);
			mysqli_query($con,"insert into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image,image2,best_seller,sub_categories_id) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$image2','$best_seller','$sub_categories_id')");
		}
		header('location:product.php');
		die();
	}
}
?>

<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>


<div id ="frmcntnt" class="content pb-0">
	<div class="card">
		<div class="card-header"><strong>Add</strong> Products</div>
			<form method="post" enctype="multipart/form-data">
				<div class="card-body card-block">
					<div class="mb-3">
						<label for="categories" class="form-label">Category Name</label>
						<select class="form-select" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
							<option selected>Select Category</option>

							<?php
							$res=mysqli_query($con,"select id,categories from categories order by categories asc");
							while($row=mysqli_fetch_assoc($res)){
								if($row['id']==$categories_id){
									echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
								}else{
									echo "<option value=".$row['id'].">".$row['categories']."</option>";
								}
								
							}
							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="categories" class="form-label">Category Name</label>
						<select class="form-select" name="sub_categories_id" id="sub_categories_id">
							<option selected>Select Sub Category</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="categories" class="form-label">Product Name</label>
						<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
					</div>

					<div class="mb-3">
						<label for="categories" class="form-label">Best Seller</label>
						<select class="form-select" name="best_seller" required>
							<option selected>Select</option>
							<?php
							if($best_seller==1){
								echo '<option value="1" selected>Yes</option>
									<option value="0">No</option>';
							}elseif($best_seller==0){
								echo '<option value="1">Yes</option>
									<option value="0" selected>No</option>';
							}else{
								echo '<option value="1">Yes</option>
									<option value="0">No</option>';
							}
							?>
						</select>
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">MRP</label>
						<input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Price</label>
						<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Qty</label>
						<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Image</label>
						<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Image 2</label>
						<input type="file" name="image2" class="form-control" <?php echo  $image_required?>>
					</div>

					<div class="mb-3">
						<label for="categories" class=" form-label">Short Description</label>
						<textarea name="short_desc" placeholder="Enter product short description" class="form-control" required><?php echo $short_desc?></textarea>
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Description</label>
						<textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Meta Title</label>
						<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Meta Description</label>
						<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_description?></textarea>
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Meta Keyword</label>
						<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
						
					</div>
					
					<div style="margin:15px;" class="field_error"><?php echo $msg?></div>
					<div class="modal-footer">
						<button class='btn btn-secondary btn-sm'><a style="color:white;text-decoration:none;" href='product.php'>Close</a></button>
						<button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
        });

        $('#frmcntnt').click(function(){
            $('.check1').prop('checked', true);
        });
});

      
</script>

<script>
function get_sub_cat(sub_cat_id){
var categories_id=jQuery('#categories_id').val();
jQuery.ajax({
	url:'get_sub_cat.php',
	type:'post',
	data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
	success:function(result){
		jQuery('#sub_categories_id').html(result);
	}
});
}
</script>

<script>
	<?php
if(isset($_GET['id'])){
?>
get_sub_cat('<?php echo $sub_categories_id?>');
<?php } ?>
</script>
            
         
