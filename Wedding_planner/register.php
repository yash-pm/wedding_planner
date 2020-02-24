<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Nuptials Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- script -->
	<script src="js/jquery.chocolat.js"></script>
		<!--light-box-files-->
	<script type="text/javascript" charset="utf-8">
		$(function() {
			$('.portfolio-grids a').Chocolat();
		});
	</script>
<!-- script -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<!-- timer -->
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //timer -->
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
<body>
	<div class="banner" id="home1">
		<div class="container">
			<div class="banner-phone animated wow slideInLeft" data-wow-delay=".5s">
				<p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+0000 123 456</p>
			</div>
			<div class="logo animated wow zoomIn" data-wow-delay=".5s">
                            <h1><a href="index.php" style="font-size: 40px;"><span></span>&nbsp;&nbsp;Dream Wedding</a></h1>
			</div>
			<div class="banner-social animated wow slideInRight" data-wow-delay=".5s">
				<ul class="social-icons">
					<li><a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a></li>
					<li><a href="#" class="icon-button instagram"><i class="icon-instagram"></i><span></span></a></li>
					<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
					<li><a href="#" class="icon-button g-plus"><i class="icon-g-plus"></i><span></span></a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			
			<br>
			<br>
			
			<div class="navigation">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-14" id="link-effect-14">
							<ul class="nav navbar-nav">
                                                            <li class="active"><a href="index.php"><span>Home</span></a></li>
                                                            <li><a href="login.php"><span>Login</span></a></li>
                                                            <li><a href="register.php" ><span>Sign Up</span></a></li>
								<li><a href="#team" class="scroll"><span>Team</span></a></li>
								<li><a href="#services" class="scroll"><span>Services</span></a></li>								
								<li><a href="#gallery" class="scroll"><span>Gallery</span></a></li>
								<li><a href="#mail" class="scroll"><span>Contact Us</span></a></li>
							</ul>
						</nav>
					</div>
					<!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>
	<!-- Login -->
<div class="register" id="reg" >
	<div class="container" >
		<br>
		<h1 class="animated wow zoomIn" data-wow-delay=".5s" align="center"><span>REGISTRATION</span></h1>
		<div class="register-grids">
			<div class="col-md-3"></div>
				<div class="col-md-6 register-grid-center animated wow slideInLeft" data-wow-delay=".5s">
                                    <form action="insert_data.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name"  name="name" class="form-control"  required="required"><br>
                    &nbsp;
                    <label for="contact_no">Contact No:</label><br>
                    <input type="text" id="contact_no" name="contact_no" class="form-control" required="required"><br>
                    &nbsp;
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="e_mail" name="e_mail" class="form-control" required="required"><br>
                    &nbsp;
                    <label for="address">Address:</label><br>
                    <textarea type="text" id="address" name="address"  class="form-control" rows="5" required="required"></textarea><br>
                    &nbsp;
                    <label for="state">State:</label><br>
                    <select id="state" name="state" class="col-md-12" required="required">
                        <option value="Gujarat">Gujarat</option>
                        <option value="Maharastra">Maharastra</option>
                        <option value="Goa">Goa</option>
                        <option value="Chennai">Chennai</option>
                        <option value="Himmachal">Himmachal</option>
                    </select>
                    &nbsp;
                    <label for="city">City:</label><br>
                    <select id="city" name="city" class=" col-md-12" required="required">
                        <option value="Surat">Surat</option>
                        <option value="Bharuch">Bharuch</option>
                        <option value="Ahmedabad">Ahmedabad</option>
                        <option value="Rajkot">Rajkot</option>
                        <option value="Vadodara">Vadodara</option>
                    </select>
                    &nbsp;
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" maxlength="8" required="required" class="form-control" required="required"><br>
                    &nbsp;
                    <label for="re-password">Re-Password:</label><br>
                    <input type="password" id="re-password" name="re-password" maxlength="8" required="required" class="form-control" required="required"><br>
                    &nbsp;
                    <input name="submit" value="submit" type="submit" class="btn btn-success"/>
                </div>
                </form>
						<br>
					</form>
					<br>
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<br>
</div>

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-pos">
				<a href="#home1" class="scroll"><img src="images/7.png" alt=" " class="img-responsive" /></a>
			</div>
			<div class="footer-logo">
                            <a href="index.php" class="animated wow zoomIn" data-wow-delay=".5s">Dream Wedding</a>
				<p class="animated wow slideInUp" data-wow-delay=".5s">Follow us on</p>
			</div>
			<ul class="social-icons animated wow slideInUp" data-wow-delay=".6s">
				<li><a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a></li>
				<li><a href="#" class="icon-button instagram"><i class="icon-instagram"></i><span></span></a></li>
				<li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
				<li><a href="#" class="icon-button g-plus"><i class="icon-g-plus"></i><span></span></a></li>
			</ul>
			<div class="copyright">
				<p class="animated wow slideInLeft" data-wow-delay=".5s">Design by Weddingz</p>
			</div>
		</div>
	</div>
<!-- //footer -->
<?php
?>
</body>
</html>