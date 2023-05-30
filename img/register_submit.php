<?php
require('connection.inc.php');
require('functions.inc.php');

$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$password=get_safe_value($con,$_POST['password']);

$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
$check_mobile=mysqli_num_rows(mysqli_query($con,"select * from users where mobile='$mobile'"));
if($check_user>0){
	echo "email_present";
}elseif($check_mobile>0){
	echo "mobile_present";
}else{
	$ran_id = rand(time(), 100000000);
    $status = "Active now";
	$encrypt_pass = password_hash($password, PASSWORD_BCRYPT);
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into users(unique_id,name,email,mobile,password,added_on,status) values('$ran_id','$name','$email','$mobile','$encrypt_pass','$added_on','$status')");
	echo "insert";
}
?>