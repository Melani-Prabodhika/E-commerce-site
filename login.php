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
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="login_email" id="login_email">
				<span class="field_error" id="login_email_error"></span>
			</div>
			<span class="field_error" id="login_email_error"></span>
			<div class="input-group">
				<input type="password" placeholder="Password" name="login_password" id="login_password">
				<span class="field_error" id="login_password_error"></span>
			</div>
			<div class="input-group">
				<button class="btn" onclick="user_login()">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
			<div class="login_msg"><p class="form-messege field_error"></p></div>
		</form>
</div>

<script src="js/main.js"></script>
<?php require('footer.php')?>        