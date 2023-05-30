<?php
require('connection.inc.php');
/*
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from categories where id='$id'");
    $row=mysqli_fetch_assoc($res);
    $categories=$row['categories'];
}*/

if(isset($_POST['updatedata'])){

    $id = $_POST['catupdate_id'];
    $categories = $_POST['catedit'];

    $query = "UPDATE categories SET categories='$categories' WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        echo '<script>alert ("Data Updated")</script>';
        header("location:categories.php");
        
    }else{
        echo '<script>alert ("Data Not Updated")</script>';
    }
}
?>

