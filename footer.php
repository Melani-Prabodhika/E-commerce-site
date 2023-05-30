<style>
    
.fcontainer{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #000000;
    padding: 70px 0;
	bottom: 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #1800f3;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: blue;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	background-color: blue;
}

.copyrght{
	text-align: center;
	color: rgb(206, 206, 206);
	margin-top: 50px;
	font-size: small;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}

.footer{
	align-items: center;
	justify-content: center;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;

}

.footer{
	align-items: center;
	justify-content: center;
}

}





</style>

<footer class="footer">
    <div class="wrapper fcontainer">
        <div class="row">
            <div class="footer-col">
                <h4>our information</h4>
                <ul>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">contact us</a></li>
                    <li><a href="#">our services</a></li>
                    <li><a href="#">customer support</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">shipping</a></li>
                    <li><a href="#">returns</a></li>
                    <li><a href="#">order status</a></li>
                    <li><a href="#">payment options</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>site terms</h4>
                <ul>
                    <li><a href="#">sitemap</a></li>
                    <li><a href="privacy_policy.php">Privacy Policy</a></li>
                    <li><a href="returns_refunds.php">return policy</a></li>
                    <li><a href="Terms_and_conditions.php">terms & conditions</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="https://www.facebook.com/chamara.dhanushaka.560"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrght">
        <p>Copyright © 2021. C D J TECHNOLOGIES</p>
    </div>
</footer>
<script>
    $(function(){
        $('.srchdrag i').draggable({
            revert: true,
            containment : 'body',
            start :function(event, ui){
                $(this).css('background-color','white');
                $(this).css('color','blue');
            },

            stop :function(event, ui){
                $(this).css('background-color','rgb(0, 3, 201, 0.774)');
                $(this).css('color','white');
            },
        });
    });

    
  
</script>
<script src="js/searchscript.js"></script>
<script src="js/heroscript.js"></script>
<script src="js/sliderscript.js" type="text/javascript"></script>
<script src="js/main.js"></script>



<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>