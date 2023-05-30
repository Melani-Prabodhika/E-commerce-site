<?php 
require('top.php');
?>
<div class="wrapper">
<div class="map2">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.5584432462223!2d80.78214507758699!3d7.214152448355455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae363abc67ef75b%3A0xa8ed926ca2b3d1b8!2sMahaweli%20Raja%20Mawatha!5e0!3m2!1sen!2slk!4v1622813985128!5m2!1sen!2slk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
	<section id="contact">
	<!--socail----------->
	<div class="social">
	<!--icons--------->
	<a href="https://www.facebook.com/chamara.dhanushaka.560"><i class="fab fa-facebook-f"></i></a>
	<a href="#"><i class="fab fa-twitter"></i></a>
	<a href="#"><i class="fab fa-instagram"></i></a>
		
	</div>
	
	<!--contact-box------------->
	<div class="contact-box">
	<!--heading---------->
	<div class="c-heading">
	<h1>Get In Touch</h1>
	<p>Call Or Email Us Regarding Question Or Issues</p>
	</div>
	<!--inputs------------------>
	<div class="c-inputs">
	<form id="contact-form" action="#" method="post">
	<input type="text" id="name" name="name" placeholder="Full Name"/>	
	<input type="email" id="email" name="email" placeholder="Example@gmail.com"/>
	<input type="text" id="mobile" name="mobile" placeholder="Mobile"/>
	<textarea name="message" id="message" placeholder="Write Message"></textarea>
	<!--sumbit-btn----------->
	<button type="button" onclick="send_message()">SEND</button>
	</form>
	</div>
		
	</div>
	<!--map------------------->
	<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.5584432462223!2d80.78214507758699!3d7.214152448355455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae363abc67ef75b%3A0xa8ed926ca2b3d1b8!2sMahaweli%20Raja%20Mawatha!5e0!3m2!1sen!2slk!4v1622813985128!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
	</section>
	</div>
	<?php 
require('footer.php');
?>