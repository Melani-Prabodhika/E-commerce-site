<?php
require('connection.inc.php');
require('functions.inc.php');

$email=get_safe_value($con,$_POST['email']);
$password=get_safe_value($con,$_POST['password']);

$res=mysqli_query($con,"select * from users where email='$email'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row=mysqli_fetch_assoc($res);
    $enc_pass = $row['password'];
    if(password_verify($password, $enc_pass)){
		$status = "Active now";
        $sql2 = mysqli_query($con, "UPDATE users SET status = '{$status}' WHERE id = '{$row['id']}'");
                
		$_SESSION['USER_LOGIN']='yes';
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['name'];
		$_SESSION['unique_id'] = $row['unique_id'];
	if(isset($_SESSION['WISHLIST_ID']) && $_SESSION['WISHLIST_ID']!=''){
		wishlist_add($con,$_SESSION['USER_ID'],$_SESSION['WISHLIST_ID']);
		unset($_SESSION['WISHLIST_ID']);
	}
	
	echo "valid";
	}else{
		echo "wrong";
	}
}else{
	echo "wrong";
}
?>


