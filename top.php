<?php 
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');


$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$ban_res=mysqli_query($con,"select * from banner where status=1 order by name");
$ban_arr=array();
while($row=mysqli_fetch_assoc($ban_res)){
	$ban_arr[]=$row;	
}
$wishlist_count=0;
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();

if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['USER_ID'];
	
	if(isset($_GET['wishlist_id'])){
		$wid=get_safe_value($con,$_GET['wishlist_id']);
		mysqli_query($con,"delete from wishlist where id='$wid' and user_id='$uid'");
	}

	$wishlist_count=mysqli_num_rows(mysqli_query($con,"select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}

$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="CDJ Techinologies";
$meta_desc="CDJ Techinologies";
$meta_keyword="CDJ Techinologies";
if($mypage=='product.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_desc=$product_meta['meta_desc'];
	$meta_keyword=$product_meta['meta_keyword'];
}if($mypage=='contact.php'){
	$meta_title='Contact Us';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
	<meta name="keywords" content="<?php echo $meta_keyword?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="js/main.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="css/contactusstyle.css"/>
    <link rel="stylesheet" type="text/css" href="css/lightslider.css"/>
    <link rel="stylesheet" href="bs/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bs/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="dropstyle.css">
    <link rel="stylesheet" href="tststyle.css">
    
  
    <script type="text/javascript" src="js/lightslider.js"></script>
</head>
<body>



    <header>
        <div class="wrapper">
        <nav>
                <div style = "margin-top:1px;" class="menu-toggleddd">
                <a href="wishlist.php"><i style = "font-size: 1.5rem;color:#fff; margin-top:5px;"class="ti-heart"></i></a>
                <?php
										if(isset($_SESSION['USER_ID'])){
										?>
                    
                    <a href="wishlist.php"><span class="htc__wishlist"><?php echo $wishlist_count?></span></a>
                    <?php } ?>
                </div>
                
                <div class="brand">
                    <h3>C D J</h3>
                    <h4>TECHNOLOGIES</h4>
                </div>

                <div class = "cart">
					<button type = "button" id = "cart-btn" onClick="location.href='cart.php'">
					  <i style="color:#fff;" class = "ti-shopping-cart"></i>
					  <a href=""><span class="htc__qua"><?php echo $totalProduct?></span></a>
					</button>
					
					</div>
				 </div>
            </nav>
        </div>

        <style>

.menu-toggleddd a span.htc__wishlist {
		background: #c43b68;
		border-radius: 100%;
		color: #fff;
		font-size: 9px;
		height: 17px;
		line-height: 19px;
		position: absolute;
		text-align: center;
        left: 2px;
		top: 8px;
		width: 17px;
		margin-right:15px;
	}

.cart a span.htc__qua {
  background: #c43b68;
  border-radius: 100%;
  color: #fff;
  font-size: 9px;
  height: 17px;
  line-height: 19px;
  position: absolute;
  right: -12px;
  text-align: center;
  top: -8px;
  width: 17px;
}
        
        .sub-nav .wrapper .links ul{
        position: absolute;
        background: rgba(0, 0, 0, 0.9);
        top: 80px;
        z-index: -1;
        opacity: 0;
        visibility: hidden;
        }
        .sub-nav .wrapper .links li:hover > ul{
        top: 120px;
        opacity: 1;
        visibility: visible;
        transition: all 0.3s ease;
        }
        .sub-nav .wrapper .links ul li {
        display: block;
        width: 100%;
        line-height: 10px;
        padding:15px;
        border-radius: 0px!important;
        }
        .sub-nav .wrapper .links ul ul{
        position: absolute;
        top: 0;
        right: calc(-100% + 8px);
        }
        .sub-nav .wrapper .links ul li{
        position: relative;
        }
        .sub-nav .wrapper .links ul li:hover ul{
        top: 0;
        }

        
        .sub-nav .wrapper .links .submne{
            left:calc(100% + 2px);
        }

        .sub-nav .wrapper .links ul:hover >*{
            opacity: 0.5;
        }

        .sub-nav .wrapper .links ul:hover >*:hover{
        opacity: 1;
        }
        </style>
       
        
        <section class="sub-nav">
            <div class="sub-nav-top">
                <div class="wrapper">
                    <ul class="links">
                        <li class="linksmrg"><a href="index.php">Home</a></li>
                        <li class="linksmrg"><a href="#ctgry">Categories</a>
                        
                            <ul>
                                <?php
                                foreach($cat_arr as $list){
                                ?>
                                <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
                                <?php
                                $cat_id=$list['id'];
                                $sub_cat_res=mysqli_query($con,"select * from sub_categories where status='1' and categories_id='$cat_id'");
                                if(mysqli_num_rows($sub_cat_res)>0){
                                ?>
                                    <ul class="submne">
                                    <?php
									while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){    
                                        echo '<li><a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_rows['id'].'">'.$sub_cat_rows['sub_categories'].'</a></li>';
                                    }
                                ?>
                                    </ul>
                                <?php } ?>
                                </li>
                                <?php } ?>
                            </ul>
                            
                        </li>

                        <li class="linksmrg">
                        <?php if(isset($_SESSION['USER_LOGIN'])){
											?>    
                        <a href="login-user.php">Account</a>
                        <?php
										}else{
											echo '<a href="login-user.php" class="mr15">Login | Register</a>';
										}
										?></li>
                        <li class="linksmrg"><a href="aboutus.php">About Us</a></li>
                        <li class="linksmrg"><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </header>

   <div id="cht"></div>

   <?php 
  if(isset($_SESSION['unique_id'])){
    ?>
	<script>
        
	$('#cht').load('chat.php?id=1');
	</script>
	<?php
  }
  
?>


   
   


    <div class="is-mobile-menu"></div>

<div class="mobile-menu">
    <div class="menu-item">
        <button class="mblebtn"onClick="location.href='index.php'">
            <span class="fas fa-home"></span>
            <p>Home</p>
        </button>
    </div>
    <div class="menu-item">
        <button class="mblebtn">
            <span class="fas fa-store"></span>
            <p>Store</p>
        </button>
    </div>
    <div class="menu-item">
        <button class="mblebtn" onClick="location.href='login-user.php'">
            <span class="fas fa-user"></span>
            <p>Account</p>
        </button>
    </div>
    <div class="menu-item">
        <span id ="search-btn" class="fas fa-search"></span>
        <p>Search</p>
    </div>
</div>

<style>
    .mblebtn{
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    color:white;
    outline:none;
    }
</style>

<script>
function lightbg_clr() {
	$('#qu').val("");
	$('#livesearch').css({"display":"none"});	
	$("#qu").focus();
 };
 
function fx(str)
{
var s1=document.getElementById("qu").value;
var xmlhttp;
if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
	document.getElementById("livesearch").style.display="block";
    return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
	document.getElementById("livesearch").style.display="block";
	
    }
  }
xmlhttp.open("GET","call_ajax.php?n="+s1,true);
xmlhttp.send();	
}
</script>  


    <div class="search-overlay">
    </div>
    <div class="search-popup">
       <form action="search.php" method="get" class="search-form">
          <div class="form-group">
             <input type="text" onKeyUp="fx(this.value)" autocomplete="off" name="str" id="qu" class="form-control textbox" placeholder="Search...." tabindex="1">
             <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
             <div id="livesearch"></div>
          </div>
       </form>
    </div>


    <style>
    #livesearch{
	z-index:9999; 
	background:#0071b4;
	max-height:260px;
	overflow:auto;
    scrollbar-width: thin; 
	width:90%;
	margin-left:5%;
    margin-top:10px;
    background:rgba(0, 0, 0, 0); 
    
	}

    input:focus{
    outline: none!important;
} 

.live-outer{
	width:100%; 
	height:80px;
	border-bottom:1px solid rgb(104, 104, 104); 
	background:rgba(0, 0, 0, 0.5); 
    
	}
#livesearch:hover >*{
	opacity: 0.6;
	}

#livesearch:hover >*:hover{
opacity: 1;
}
.live-im{
	float:left;
	width:10%; 
	height:60px;
    margin-top:10px;
	}
.live-im img{
	width:100%; 
	height:100%;
    object-fit: contain;
	}
.live-product-det{
	float:left; 
	width:80%; 
	height:60px;
    margin-top:10px;
    margin-left:10px;
	}
.live-product-name{
	width:100%; 
	height:22px; 
	margin-top:4px;
	}
.live-product-name p{
	margin:0px;
	color:white;
	font-size:17px;
    text-transform: capitalize;
	}
.live-product-price{
	width:100%;
	height:25px;
	}
.live-product-price-text{
	float:left; 
	width:50%;
	}
.live-product-price-text p{
	margin:0px;
	font-size:16px;
	}
.link-p-colr{
	color:#d8d9da;
	}

    @media only screen and (max-width: 768px) {
        menu {
            display:none;
        }
    }
    </style>

   
<menu class="open">
  <a id="cht1"  class="action"><span class="tooltip">Chat With Us</span><i class="fas fa-comments"></i></a>
  <a href="wishlist.php" class="action"><span class="tooltip">Wishlist</span><i class="fas fa-heart"></i></a>
  <a href="my_order.php" class="action"><span class="tooltip">Orders</span><i class="fas fa-file-invoice-dollar"></i></a>
  <a href="logout.php" class="action"><span class="tooltip">Logout</span><i class="fas fa-sign-out-alt"></i></a>
  <a href="#" class="trigger"><i class="fas fa-plus"></i></a>
</menu>
<script>
    const trigger = document.querySelector("menu > .trigger");
trigger.addEventListener('click', (e) => {
  e.currentTarget.parentElement.classList.toggle("open");
});



</script>
<script>
       var chtlog = '<?php echo isset($_SESSION['unique_id'])?>';
       $("menu > #cht1").click(function(){
           if (chtlog==true){
            $('.chatbody').addClass("active");
           }else {
            window.location.href='login-user.php';
           }
        });
       
</script> 

<?php 
  if(isset($_SESSION['unique_id'])){
    ?>
	<script>
        $("menu").addClass("active");
	</script>
	<?php
  }
  
?>

    <div class="srchdrag">
        <a><i class="fas fa-search search-btn " ></i></a>

    </div>


    <style>
        
        .tst.hide{
        animation: hide_toast 1s ease forwards;
        }
        @keyframes hide_toast {
        0%{
            transform: translateY(-20px);
        }
        40%{
            transform: translateY(-10%);
        }
        80%, 100%{
            opacity: 0;
            pointer-events: none;
            transform: translateY(100%);
        }
        }

        .toast-container{
            bottom:50px;
        }

        @media only screen and (min-width: 768px) {
        .toast-container{
            bottom:0;
        }
        }
    </style>


<div class="tst">
    <div style ="z-index:50;" class="toast-container position-fixed start-50 translate-middle-x p-3">
        <div style="width:220px" class="toast bg-transparent" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header" style="background: rgba(0,0,0,0.9)!important; ">
                <i style="font-size:23px;" class="bi bi-wifi"></i>&nbsp;&nbsp;&nbsp;
                <strong class="me-auto"><span></span></strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div> 
<script>
const tst = document.querySelector(".tst")
var status = 'online';
var current_status = 'online';

function check_internet_connection()
{
    if(navigator.onLine)
    {
        status = 'online';
    }
    else
    {
        status = 'offline';
    }

    if(current_status != status)
    {
        if(status == 'online')
        {
            $('i.bi').addClass('bi-wifi text-success');
            $('i.bi').removeClass('bi-wifi-off text-danger');
            $('.me-auto').html("<span class='text-success'>You are online now</span>");
            

            setTimeout(()=>{ //hide the toast notification automatically after 5 seconds
                tst.classList.add("hide");
                }, 5000);
        }
        else
        {
            tst.classList.remove("hide");
            $('i.bi').addClass('bi-wifi-off text-danger');
            $('i.bi').removeClass('bi-wifi text-success');
            $('.me-auto').html("<span class='text-danger'>  You are offline now</span>");
        }

        current_status = status;

        $('.toast').toast({
            autohide:false
        });

        $('.toast').toast('show');
    }
}

check_internet_connection();

setInterval(function(){
    check_internet_connection();
}, 100);



</script>


<script src="js/searchscript.js"></script>