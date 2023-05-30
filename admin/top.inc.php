<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
		header('location:login.php');
		die();
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDJ Admin Panel</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <input type="checkbox" class ="check1" id="check" checked="true">
    <!--hearder area-->
    <header>
        <label for="check">
            <i class="fas fa-bars" id ="side_btn"></i>
        </label>
        <div class="left_area">
            <a href="#">Cdj <span>Admin</span></a>
        </div>
        <div class="right_panel">
        <button class='btn btn-primary btn-sm logout_btn'><a href="logout.php">Logout</a></button>
        </div>
    </header>
    <!--hearder end-->


    <!--mobile nav-->
    <div class="mobile_nav">
        <div class="nav_bar">
            <img src="a.jpg" class="mobile_admin_profile" alt="">
            <i class="fas fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
            <a href=""><i class="fas fa-comments"></i><span>Chat</span></a>
            <a href="banner.php"><i class="fas fa-home"></i><span>Banner</span></a>
            <a href="categories.php"><i class="fas fa-sitemap"></i><span>Categories</span></a>
            <a href="product.php"><i class="fab fa-product-hunt"></i><span>Products</span></a>
            <a href="order.php"><i class="fas fa-file-invoice-dollar"></i><span>Orders</span></a>
            <a href="user.php"><i class="fas fa-users"></i><span>Users</span></a>
            <a href="addadmin.php"><i class="fas fa-user-shield"></i><span>Add Admin</span></a>
            <a href="contact_us.php"><i class="fas fa-headset"></i><span>Contact Us</span></a>

        </div>
    </div>
    <!--mobile nav end-->
    
    <!--side bar-->
    <div class="sidebar">
        <div class="profile_info">
            <img src="a.jpg" class="admin_profile" alt="">
        <h5>Chamara</h5>
        </div>
        <a href="chat/users.php"><i class="fas fa-comments"></i><span>Dashboard</span></a>
        <a href="banner.php"><i class="fas fa-home"></i><span>Banner</span></a>
        <a href="categories.php"><i class="fas fa-sitemap"></i><span>Categories</span></a>
        <a href="sub_categories.php"><i class="fas fa-hashtag"></i><span>Sub Categories</span></a>
        <a href="product.php"><i class="fab fa-product-hunt"></i><span>Products</span></a>
        <a href="order_master.php"><i class="fas fa-file-invoice-dollar"></i><span>Orders</span></a>
        <a href="users.php"><i class="fas fa-users"></i><span>Users</span></a>
        <a href="addadmin.php"><i class="fas fa-user-shield"></i><span>Add Admin</span></a>
        <a href="contact_us.php"><i class="fas fa-headset"></i><span>Contact Us</span></a>
    </div>
    <!--side bar end-->