<?php
require('top.inc.php');
$categories='';
$msg='';
$sub_categories='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from sub_categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$sub_categories=$row['sub_categories'];
		$categories=$row['categories_id'];
	}else{
		header('location:sub_categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories_id']);
	$sub_categories=get_safe_value($con,$_POST['sub_categories']);
	$res=mysqli_query($con,"select * from sub_categories where categories_id='$categories' and sub_categories='$sub_categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Sub Categories already exist";
			}
		}else{
			$msg="Sub Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update sub_categories set categories_id='$categories',sub_categories='$sub_categories' where id='$id'");
		}else{
			
			mysqli_query($con,"insert into sub_categories(categories_id,sub_categories,status) values('$categories','$sub_categories','1')");
		}
		header('location:sub_categories.php');
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
                        <div class="card-header"><strong>Sub</strong> Category</div>
                        <form method="post" enctype="multipart/form-data">
                           <div class="card-body card-block">
                              <div class="modal-body">
                                <input type="hidden" name="catupdate_id" id="catupdate_id">
                                <div class="mb-3">
                                    <label for="categories" class="form-label">Category Name</label>
                                    <select class="form-select" name="categories_id">
                                       <option value="">Select Category</option>

                                       <?php
                                       $res=mysqli_query($con,"select * from categories where status='1'");
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
                                    <label for="categories" class="form-label">Sub Category Name</label>
                                    <input type="text"  name="sub_categories" class="form-control" placeholder="Enter Sub Category Name" required value="<?php echo $sub_categories?>">
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



