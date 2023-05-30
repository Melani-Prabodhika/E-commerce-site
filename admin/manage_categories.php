<?php
require('top.inc.php');
$categories='';
$image='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from categories where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
    $row=mysqli_fetch_assoc($res);
    $categories=$row['categories'];
   }else{
      header('location:categories.php');
      die();
      }
}

if(isset($_POST['submit'])){
   $categories=get_safe_value($con,$_POST['categories']);
   $res=mysqli_query($con,"select * from categories where categories='$categories'");
   $check=mysqli_num_rows($res);
	if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=mysqli_fetch_assoc($res);
         if($id==$getData['id']){

         }else{
            $msg="Category Already Exist !!!";
         }
      }else{
         $msg="Category Already Exist !!!";
      }
   }
  
   if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],CATEGORY_IMAGE_SERVER_PATH.$image);
				$update_sql="update categories set categories='$categories', image='$image' where id='$id'";
			}else{
				$update_sql="update categories set categories='$categories' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],CATEGORY_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into categories(categories,image,status) values('$categories','$image','1')");
		}
		header('location:categories.php');
		die();
	}
}

?>

<style>
	.content{
		overflow-x: auto;
	}
</style>
    
        <div id="frmcntnt" class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add</strong> Category</div>
                        <form method="post" enctype="multipart/form-data">
                           <div class="card-body card-block">
                              <div class="modal-body">
                                <input type="hidden" name="catupdate_id" id="catupdate_id">
                                <div class="mb-3">
                                    <label for="categories" class="form-label">Category Name</label>
                                    <input type="text"  name="categories" class="form-control" placeholder="Enter Category Name" required value="<?php echo $categories?>">
                                </div>
                                <div class="mb-3">
                                 <label for="categories" class=" form-label">Image</label>
                                 <input type="file" name="image" class="form-control" <?php echo  $image_required?>>
                              </div>
                                <div class="field_error"><?php echo $msg?></div>
                              </div>
                              
                              <div class="modal-footer">
                                 <button class='btn btn-secondary btn-sm'><a style="color:white;text-decoration:none;" href='categories.php'>Close</a></button>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
                              </div>
                            
                           </div>
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

        $('#frmcntnt').click(function(){
            $('.check1').prop('checked', true);
        });
}); 
</script>      



