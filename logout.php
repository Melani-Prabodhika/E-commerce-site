<?php
require('connection.inc.php');
require('functions.inc.php');
    $status = "Offline now";
    $sql = mysqli_query($con, "UPDATE users SET status = '{$status}' WHERE id='{$_SESSION['USER_ID']}'");
    unset($_SESSION['USER_LOGIN']);
    unset($_SESSION['USER_ID']);
    unset($_SESSION['USER_NAME']);
    unset($_SESSION['unique_id']);
    session_unset();
    session_destroy();
    header('location:index.php');
    die();
?>