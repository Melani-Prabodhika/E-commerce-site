<?php 
require('top.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='my_order.php';
	</script>
	<?php
}
?>
<link rel="stylesheet" href="css/lg2style.css">
<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" name="name" id="name" placeholder="Username">
				<span class="field_error" id="name_error"></span>
			</div>
			
			<div class="input-group">
				<input type="email" name="email" id="email" placeholder="Email">
				<button type="button" class="fv-btn email_sent_otp height_60px" onclick="email_sent_otp()">Send OTP</button>
				<span class="field_error" id="email_error"></span>
			</div>
			<div class="input-group email_verify_otp">
			<input type="text" id="email_otp" placeholder="OTP" style="width:45%" class="email_verify_otp">
			<button type="button" class="fv-btn email_verify_otp height_60px" onclick="email_verify_otp()">Verify OTP</button>
			<span id="email_otp_result"></span>
			</div>

			<div class="input-group">
				<input type="text" name="mobile" id="mobile" placeholder="mobile">
				<span class="field_error" id="mobile_error"></span>
			</div>
			<div class="input-group">
				<input type="password" name="password" id="password" placeholder="Password" name="password">
				<span class="field_error" id="password_error"></span>
            </div>
			<div class="input-group">
				<button type="button"  class="btn" onclick="user_register()" disabled id="btn_register">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
			<div class="register_msg"><p class="form-messege field_error"></p></div>

		</form>
		
	</div>

	<script>
		function email_sent_otp(){
			jQuery('#email_error').html('');
			var email=jQuery('#email').val();
			if(email==''){
				jQuery('#email_error').html('Please enter email id');
			}else{
				jQuery('.email_sent_otp').html('Please wait..');
				jQuery('.email_sent_otp').attr('disabled',true);
				jQuery.ajax({
					url:'send_otp.php',
					type:'post',
					data:'email='+email+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('#email').attr('disabled',true);
							jQuery('.email_verify_otp').show();
							jQuery('.email_sent_otp').hide();
							
						}else if(result=='email_present'){
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Email id already exists');
						}else{
							jQuery('.email_sent_otp').html('Send OTP');
							jQuery('.email_sent_otp').attr('disabled',false);
							jQuery('#email_error').html('Please try after sometime');
						}
					}
				});
			}
		}
		function email_verify_otp(){
			jQuery('#email_error').html('');
			var email_otp=jQuery('#email_otp').val();
			if(email_otp==''){
				jQuery('#email_error').html('Please enter OTP');
			}else{
				jQuery.ajax({
					url:'check_otp.php',
					type:'post',
					data:'otp='+email_otp+'&type=email',
					success:function(result){
						if(result=='done'){
							jQuery('.email_verify_otp').hide();
							jQuery('#email_otp_result').html('Email id verified');
							jQuery('#is_email_verified').val('1');
							jQuery('#btn_register').attr('disabled',false);
							
						}else{
							jQuery('#email_error').html('Please enter valid OTP');
						}
					}
					
				});
			}
		}
		
		</script>

<script src="js/main.js"></script>
<?php require('footer.php')?>        