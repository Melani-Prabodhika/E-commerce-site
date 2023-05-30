<?php
require('connection.inc.php');
require('functions.inc.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$current_password=get_safe_value($con,$_POST['current_password']);
$new_password=get_safe_value($con,$_POST['new_password']);
$uid=$_SESSION['USER_ID'];

$row=mysqli_fetch_assoc(mysqli_query($con,"select password from users where id='$uid'"));
$databasepassword = $row['password'];

if(password_verify($current_password, $databasepassword)){
	$encpass = password_hash($new_password, PASSWORD_BCRYPT);
	mysqli_query($con,"update users set password='$encpass' where id='$uid'");
	echo "Password updated";
}else{
	
	echo "Please enter your current valid password";
}
?>