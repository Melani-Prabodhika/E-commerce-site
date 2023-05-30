<?php 
require('top.php');?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>
		ABOUT US 
	</title>
	
</head>

<style>
body{
  background-color: rgb(0, 0, 0);

}
.container{
    text-align: center;
    margin-top: 60px;
  }


.btn{
  border: 1px solid #3498db;
  background: none;
  padding: 10px 20px;
  font-size: 20px;
  font-family: "montserrat";
  cursor: pointer;
  margin: 10px;
  transition: 0.8s;
  position: relative;
  overflow: hidden;
}
.btn1{
  color: #3498db;
}

.btn1:hover{
  color: #fff;
}

.btn::before{
  content: "";
  position: absolute;
  left: 0;
  width: 100%;
  height: 0%;
  background: #3498db;
  z-index: -1;
  transition: 0.8s;
}
.btn1::before,.btn3::before{
  top: 0;
  border-radius: 0 0 50% 50%;
}


.btn1:hover::before,.btn2:hover::before{
  height: 180%;
}
.btn3:hover::before,.btn4:hover::before{
  height: 0%;
}




</style>
<body class="wrapper" background="1.jpg" link="#000" alink="#017bf5" vlink="#000">

	<br />
	<h1 align="center">
		<font face="Lato" color="#017bf5" size="7">
			ABOUT US 
		</font>
	</h1>
	<br />
	<p>
		<font face="Lato" color=white >
		
		cdjtechnologies.lk brings you the convenience of selecting, purchasing or reserving products and services from across the CDJ Technologies all online. Not only that, but CDJ Technologies endeavours to deliver these products (and some services) to any location across Sri Lanka.  CDJ Technologies of reliability, value-for-money and honesty in service. We aim to give you the best online service available, helping you select the best product or service for your needs.
		<br /><br />
		Our goal with service is to supply highly recommended, branded and quality products for your needs. We are providing electric items and computer accessories service since more than a year with high quality service and customer feedback. We give you all more than one year warranties and garrent for all types of products what we have.
		<br /><br />
		We continuously innovate information available on our products and are in a constant state of updating and improving the range of services available online to our customers.

		<br /><br />
		Not only does CDJ Technologies aim to become a valuable tool for customer contact, but, also, a method for customers to obtain any product or service offered throughout the CDJ Technologies.

	
		
		</font>
		</p>
		
		</h2>


	
	<br />
	
	<div class="container">
		<button class="btn btn1"><i class="fas fa-heart" style="color:red;"></i> Back to Homepage</button>
	</div>
</body>
</html>

<?php 
require('footer.php');?>