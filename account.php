<?php 
require('top.php');?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>
		Account
	</title>
	
</head>

<style>
body{
  background-color: rgb(0, 0, 0);

}
.container{
  text-align: center;
}

.btn{
  border: 1px solid #3498db;
  background: none;
  padding: 10px 20px;
  font-size: 20px;
  font-family: "montserrat";
  cursor: pointer;
  margin: 10px;
  transition: 0.8s;
  position: relative;
  overflow: hidden;
}
.btn1,.btn2{
  color: #3498db;
}
.btn3,.btn4{
  color: #fff;
}
.btn1:hover,.btn2:hover{
  color: #fff;
}
.btn3:hover,.btn4:hover{
  color: #3498db;
}
.btn::before{
  content: "";
  position: absolute;
  left: 0;
  width: 100%;
  height: 0%;
  background: #3498db;
  z-index: -1;
  transition: 0.8s;
}
.btn1::before,.btn3::before{
  top: 0;
  border-radius: 0 0 50% 50%;
}
.btn2::before,.btn4::before{
  bottom: 0;
  border-radius: 50% 50% 0 0;
}
.btn3::before,.btn4::before{
  height: 180%;
}
.btn1:hover::before,.btn2:hover::before{
  height: 180%;
}
.btn3:hover::before,.btn4:hover::before{
  height: 0%;
}





.login-box{
  margin-top: 500px;
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
}
.login-box h2{
  float: left;
  font-size: 30px;
  border-bottom: 6px solid #4caf50;
  margin-bottom: 50px;
  padding: 13px 0;
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
}
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
}
.textbox input{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.btnn{
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}






</style>

<div class="wrapper">
<div class="container">
        
        <button onClick="location.href='wishlist.php'" class="btn btn1"><i class="fas fa-heart" style="color:red;"></i> Wishlist</button>
        <button onClick="location.href='my_order.php'" class="btn btn2"><i class="fab fa-jedi-order" style="color:rgb(255, 14, 235);"></i> Order</button>
        <button onClick="location.href='logout.php'" class="btn btn3"><i class="fas fa-sign-out-alt" style="color:rgb(36, 255, 44);"></i> Logout</button>
   
</div>

<div style="display:flex; align-items:center; justify-content:center;" class="cntctfrm">
<div style="margin-right:250px;" class="c-inputs">
  <center><h3 style="color:#fff; margin-bottom:30px;">Change Username</h3></center>
	<form id="login-form" method="post">
	<input type="password" name="name" id="name" placeholder="New Name"/>
  <span class="field_error" id="name_error"></span>
  <br>
	<!--sumbit-btn----------->
	<button type="button" onclick="update_profile()" id="btn_submit">Update</button>
	</form>
</div>

<div class="c-inputs">
  <center><h3 style="color:#fff; margin-bottom:30px">Change Password</h3></center>
	<form method="post" id="frmPassword">
	<input type="password" name="current_password" id="current_password" placeholder="Current Password"/>
  <span class="field_error" id="current_password_error"></span>
	<input type="password" name="new_password" id="new_password" placeholder="New Password"/>
  <span class="field_error" id="new_password_error"></span>
	<input type="password" name="confirm_new_password" id="confirm_new_password" placeholder="Confrim New Password"/>
	<span class="field_error" id="confirm_new_password_error"></span>
  <br>
  <!--sumbit-btn----------->
	<button type="button" onclick="update_password()" id="btn_update_password">Change Password</button>
	</form>
</div>

</div>

</div>  

<script>
		function update_profile(){
			jQuery('.field_error').html('');
			var name=jQuery('#name').val();
			if(name==''){
				jQuery('#name_error').html('Please enter your name');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'update_profile.php',
					type:'post',
					data:'name='+name,
					success:function(result){
						jQuery('#name_error').html(result);
						jQuery('#btn_submit').html('Update');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
		
		function update_password(){
			jQuery('.field_error').html('');
			var current_password=jQuery('#current_password').val();
			var new_password=jQuery('#new_password').val();
			var confirm_new_password=jQuery('#confirm_new_password').val();
			var is_error='';
			if(current_password==''){
				jQuery('#current_password_error').html('Please enter password');
				is_error='yes';
			}if(new_password==''){
				jQuery('#new_password_error').html('Please enter password');
				is_error='yes';
			}if(confirm_new_password==''){
				jQuery('#confirm_new_password_error').html('Please enter password');
				is_error='yes';
			}
			
			if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
				jQuery('#confirm_new_password_error').html('Please enter same password');
				is_error='yes';
			}
			
			if(is_error==''){
				jQuery('#btn_update_password').html('Please wait...');
				jQuery('#btn_update_password').attr('disabled',true);
				jQuery.ajax({
					url:'update_password.php',
					type:'post',
					data:'current_password='+current_password+'&new_password='+new_password,
					success:function(result){
						jQuery('#current_password_error').html(result);
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled',false);
						jQuery('#frmPassword')[0].reset();
					}
				})
			}
			
		}
		</script>
    

<?php 
require('footer.php');?>