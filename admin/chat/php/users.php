<?php
    require('../../connection.inc.php');
    $outgoing_id = $_SESSION['admin_unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND msged='1' ORDER BY msged_time DESC";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>