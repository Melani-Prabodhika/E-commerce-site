<?php 
require('top.php');
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}



$cart_total=0;

if(isset($_POST['submit'])){
	$address=get_safe_value($con,$_POST['address']);
	$city=get_safe_value($con,$_POST['city']);
	$pincode=get_safe_value($con,$_POST['pincode']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);
	$user_id=$_SESSION['USER_ID'];
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
		
	}
	$total_price=$cart_total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='success';
	}
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
	
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		
	
	mysqli_query($con,"insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid')");
	
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		
		mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
	}
	
	unset($_SESSION['cart']);
	
	if($payment_type=='payu'){
		$MERCHANT_KEY = "gtKFFx"; 
		$SALT = "wia56q6O";
		$hash_string = '';
		$PAYU_BASE_URL = "https://test.payu.in";
		$action = '';
		$posted = array();
		if(!empty($_POST)) {
		  foreach($_POST as $key => $value) {    
			$posted[$key] = $value; 
		  }
		}
		
		$userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
		
		$formError = 0;
		$posted['txnid']=$txnid;
		$posted['amount']=$total_price;
		$posted['firstname']=$userArr['name'];
		$posted['email']=$userArr['email'];
		$posted['phone']=$userArr['mobile'];
		$posted['productinfo']="productinfo";
		$posted['key']=$MERCHANT_KEY ;
		$hash = '';
		$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		if(empty($posted['hash']) && sizeof($posted) > 0) {
		  if(
				  empty($posted['key'])
				  || empty($posted['txnid'])
				  || empty($posted['amount'])
				  || empty($posted['firstname'])
				  || empty($posted['email'])
				  || empty($posted['phone'])
				  || empty($posted['productinfo'])
				 
		  ) {
			$formError = 1;
		  } else {    
			$hashVarsSeq = explode('|', $hashSequence);
			foreach($hashVarsSeq as $hash_var) {
			  $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
			  $hash_string .= '|';
			}
			$hash_string .= $SALT;
			$hash = strtolower(hash('sha512', $hash_string));
			$action = $PAYU_BASE_URL . '/_payment';
		  }
		} elseif(!empty($posted['hash'])) {
		  $hash = $posted['hash'];
		  $action = $PAYU_BASE_URL . '/_payment';
		}


		$formHtml ='<form method="post" name="payuForm" id="payuForm" action="'.$action.'"><input type="hidden" name="key" value="'.$MERCHANT_KEY.'" /><input type="hidden" name="hash" value="'.$hash.'"/><input type="hidden" name="txnid" value="'.$posted['txnid'].'" /><input name="amount" type="hidden" value="'.$posted['amount'].'" /><input type="hidden" name="firstname" id="firstname" value="'.$posted['firstname'].'" /><input type="hidden" name="email" id="email" value="'.$posted['email'].'" /><input type="hidden" name="phone" value="'.$posted['phone'].'" /><textarea name="productinfo" style="display:none;">'.$posted['productinfo'].'</textarea><input type="hidden" name="surl" value="'.SITE_PATH.'payment_complete.php" /><input type="hidden" name="furl" value="'.SITE_PATH.'payment_fail.php"/><input type="submit" style="display:none;"/></form>';
		echo $formHtml;
		echo '<script>document.getElementById("payuForm").submit();</script>';
	}else{	
		sentInvoice($con,$order_id);
		?>
		<script>
			window.location.href='thank_you.php';
		</script>
		<?php
	}	
	
}
?>

<link rel="stylesheet" href="sstyle.css">

<style>
	.field_error{color:red;}
.accordion .accordion__hide {
    background: #f4f4f4;
    height: 65px;
    line-height: 65px;
    display: flex;
    align-items: center;
    padding: 0 30px;
    position: relative;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 10px;
    font-family: "Poppins";
    cursor: pointer;
}



.order-details{
    background: #c99494;
    background-color: #000;
}
.order-details .order-details__title{
    padding: 30px 0;
    margin: 0 15px;
    border-bottom: 1px solid #414141;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 1px;
    font-family: "poppins";
    font-size: 16px;
    font-weight: 600;
    color: #d6d6d6;
}
.order-details .order-details__item{
    padding: 15px 0;
    margin: 0 30px;
    border-bottom: 1px solid #414141;
    background: #000;

}
.order-details .order-details__item .single-item{
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
    -ms-align-items: center;
    align-items: center;
    padding: 5px;
}
.order-details .order-details__item .single-item .single-item__content{
    flex-grow: 2;
}
.order-details .order-details__item .single-item .single-item__content a{
    font-size: 16px;
    font-family: "Poppins";
    letter-spacing: 1px;
    color: #d6d6d6;
    transition: all 0.3s ease-in-out 0s;
}

.order-details .order-details__item .single-item .single-item__content a:hover{
	color:blue;
}

.order-details .order-details__item .single-item .single-item__content span{
    font-family: "Poppins";
    display: block;
	color: #d6d6d6;
	font-weight:normal;
}
.order-details .order-details__item .single-item .single-item__thumb{
    text-align: center;
    width: 60px;
    overflow: hidden;
    margin-right: 20px;
}
.order-details .order-details__item .single-item .single-item__remove{
    width: 35px;
    text-align: center;
    font-size: 22px;
    color: #212121;
}
.order-details .order-details__item .single-item .single-item__remove a:hover{
    color: #f10;
}
.order-details .order-details__count{
    margin: 0 30px;
    padding: 15px 0;
    border-bottom: 1px solid #ebebeb;
}
.order-details .order-details__count .order-details__count__single{
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
    -ms-align-items: center;
    align-items: center;
    padding: 5px 0;
}
.order-details .order-details__count .order-details__count__single h5{
    color: #d6d6d6;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1px;
    font-weight: 600;
}
.order-details .order-details__count .order-details__count__single span.price{
    width: 30%;
    text-align: left;
    font-weight: 600;
    font-family: "Poppins";
    
}
.order-details .ordre-details__total{
    margin: 0 30px;
    padding: 30px 0;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    -ms-align-items: center;
    align-items: center;
    justify-content: space-between;
}
.order-details .ordre-details__total h5{
    color: #d6d6d6;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1px;
    font-weight: 700;
}
.order-details .ordre-details__total span.price{
    width: 30%;
    text-align: left;
    font-weight: 700;
    font-family: "Poppins";
    letter-spacing: 1px;
	color: #d6d6d6;
}

</style>
        <div class="wrapper checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
									<?php 
									$accordion_class='accordion__title';
									if(!isset($_SESSION['USER_LOGIN'])){
									$accordion_class='accordion__hide';
									?>
									<div  style ="color:#fff; background:#000;" class="accordion__title">
                                        Checkout Method
                                    </div>
                                    <div class="accordion__body">
                                        <div class="accordion__body__form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkout-method__login">
													<form id="login-form" method="post">
                                                            <h5 style ="color:#fff;" class="checkout-method__title">Login</h5>
                                                            <div class="c-inputs">
                                                                <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
																<span class="field_error" id="login_email_error"></span>
                                                            </div>
															
                                                            <div class="c-inputs">
                                                                <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
																<span class="field_error" id="login_password_error"></span>
                                                            </div>
															
                                                            <p class="require">* Required fields</p>
															<div class="form-output login_msg">
																<p class="form-messege field_error"></p>
															</div>
                                                            <div class="dark-btn">
                                                                <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                                            </div>
															
                                                        </form>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
									<?php } ?>
                                    <div style ="color:#fff; background:#000;" class="<?php echo $accordion_class?>">
                                        Address Information
                                    </div>
									<form method="post">
										<div class="accordion__body">
											<div class="bilinfo">
												
													<div class="row">
														<div class="col-md-12">
															<div class="single-input">
																<input type="text" name="address" placeholder="Street Address" required>
															</div>
														</div>
														<div class="col-md-6">
															<div class="single-input">
																<input type="text" name="city" placeholder="City/State" required>
															</div>
														</div>
														<div class="col-md-6">
															<div class="single-input">
																<input type="text" name="pincode" placeholder="Post code/ zip" required>
															</div>
														</div>
														
													</div>
												
											</div>
										</div>
										<div style ="color:#fff; background:#000;"  class="<?php echo $accordion_class?>">
											payment information
										</div>
										<div class="accordion__body">
											<div class="paymentinfo">
												<div style ="color:#fff;" class="single-method">
													COD <input type="radio" name="payment_type" value="COD" required/>
													&nbsp;&nbsp;PayU <input type="radio" name="payment_type" value="payu" required/>
												</div>
												<div class="single-method">
												  
												</div>
											</div>
										</div>
										 <input type="submit" name="submit"/>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style = "background:#000;" class="col-md-4">
                        <div style = "background:#000;"  class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                                <?php
								$cart_total=0;
								foreach($_SESSION['cart'] as $key=>$val){
								$productArr=get_product($con,'','',$key);
								$pname=$productArr[0]['name'];
								$mrp=$productArr[0]['mrp'];
								$price=$productArr[0]['price'];
								$image=$productArr[0]['image'];
								$qty=$val['qty'];
								$cart_total=$cart_total+($price*$qty);
								?>
								<div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"  />
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname?></a>
                                        <span class="price"><?php echo number_format($price*$qty)?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
								<?php } ?>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price"><?php echo number_format($cart_total)?>.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<script>
			function user_login(){
	jQuery('.field_error').html('');
	var email=jQuery("#login_email").val();
	var password=jQuery("#login_password").val();
	var is_error='';
	if(email==""){
		jQuery('#login_email_error').html('Please enter email');
		is_error='yes';
	}if(password==""){
		jQuery('#login_password_error').html('Please enter password');
		is_error='yes';
	}
	if(is_error==''){
		jQuery.ajax({
			url:'login_submit.php',
			type:'post',
			data:'email='+email+'&password='+password,
			success:function(result){
				if(result=='wrong'){
					jQuery('.login_msg p form-messege').html('Please enter valid login details');
				}
				if(result=='valid'){
					window.location.href=window.location.href;
				}
			}	
		});
	}	
}

		</script>


<script src="jsn/owl.carousel.min.js"></script>
<script src="jsn/slink.min.js"></script>
<script src="jsn/plugins.js"></script>
<script src="jsn/style-customizer.js"></script>
<script src="jsn/waypoints.min.js"></script>
        						
<?php require('footer.php')?>        