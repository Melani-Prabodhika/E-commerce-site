<?php 
    require('../connection.inc.php');
    date_default_timezone_set("Asia/Colombo");
    if(isset($_SESSION['unique_id'])){
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
        $msged='1';
        if(!empty($message)){
            $sql = mysqli_query($con, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
            $msged_time=date('Y-m-d h:i:s');                           
            mysqli_query($con, "update users set msged = '$msged', msged_time ='$msged_time' WHERE unique_id = '$outgoing_id'");
}
    }


    
?>