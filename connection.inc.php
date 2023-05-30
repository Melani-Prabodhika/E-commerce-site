<?php
session_start();
$con=mysqli_connect("localhost","root","","ecom");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/cdj/');
define('SITE_PATH','http://127.0.0.1/cdj/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

define('CATEGORY_IMAGE_SERVER_PATH',SERVER_PATH.'media/category/');
define('CATEGORY_IMAGE_SITE_PATH',SITE_PATH.'media/category/');

define('BANNER_IMAGE_SERVER_PATH',SERVER_PATH.'media/banner/');
define('BANNER_IMAGE_SITE_PATH',SITE_PATH.'media/banner/');
?>