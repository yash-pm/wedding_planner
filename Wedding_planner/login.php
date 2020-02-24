<?php
include './header.php';
?>
	<!-- Login -->
<div class="Login" id="log">
	<div class="container">
		<br>
		<h1 class="animated wow zoomIn" data-wow-delay=".5s" align="center" style="font-weight: bold; font-size: 35px"><span>LOGIN</span></h1>
		<div class="login-grids">
			<div class="col-md-3"></div>
				<div class="col-md-6 login-grid-center animated wow slideInCenter" data-wow-delay=".5s">
					<form action="check_authentication.php" method="post">
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="email" name="user_email" class="form-control" required="required"><br>
                    &nbsp;
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="user_password" class="form-control" required="required"><br>
                    &nbsp;
                    <input name="login" value="Login" type="submit" class="btn btn-success"/>
                    &nbsp;
                    <br>
                    <br>
                    <h3><a href="forget_password_1.php" style=" color: #FF353B; font-weight: bolder; ">Forget Password ?.</a></h3>
                    
                                </form>
						<br>
					
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