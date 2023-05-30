<?php
    require('connection.inc.php');
	require('functions.inc.php');
	$added_on=date('Y-m-d');
	$added_on2=date('h:i:s');
	$status = "$added_on";
    mysqli_query($con, "UPDATE users SET status = '{$status}', status3 = '{$added_on2}' WHERE unique_id='1'");
    mysqli_query($con, "UPDATE admin_users SET status = '{$status}', status3 = '{$added_on2}' WHERE unique_id='1'");
    unset ($_SESSION['ADMIN_LOGIN']);
	unset ($_SESSION['ADMIN_USERNAME']);
	unset($_SESSION['admin_unique_id']);
	header ('location:login.php');
	die();
?>