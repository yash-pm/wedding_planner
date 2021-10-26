<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/chocolat.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/image_view.css" rel="stylesheet" type="text/css"/>
        <script src="js/npm.js" type="text/javascript"></script>
        <style>
  .affix {
    top: 0px;
    background-color: #222;
    background: #222;
    width: auto;
    margin: auto;
  }
  
        </style>
        <script>
           /* $(document).ready(function(){
              $('.nav').affix({offset: {top: 100} }); 
            });
            */
            </script>
    </head>
    <body>
        <div class="banner">
            <div class="container">
                <div class="banner-phone animated wow slideInLeft" data-wow-delay=".5s">
                    <p><span style="color: white" class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+ 2222 444 666</p>
                </div>
                <div class="logo animated wow zoomIn" data-wow-delay=".5s">
                    <h1><a href="index.php" style="font-size: 40px;"><span></span>&nbsp;&nbsp;Dream Wedding</a></h1>
                </div>
                <div class="banner-social animated wow slideInRight" data-wow-delay=".5s">
                    <ul class="social-icons">
                        <li><a href="#" class="icon-button facebook"><i class="icon-facebook"></i><span></span></a></li>
                        <li><a href="#" class="icon-button instagram"><i class="icon-instagram"></i><span></span></a></li>
                        <li><a href="#" class="icon-button twitter"><i class="icon-twitter"></i><span></span></a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
                <br><br>
                <div class="row">
                    <div class="col-md-11">
                        <nav class="navbar navbar-default">
                            <ul class="nav navbar-nav">
                                <li><a href="surfuer_home.php">Home</a></li>
                                <li><a href="surfuer_testimonials.php" >testimonials</a></li>
                                <li><a href="customer_registration.php" >Sign Up</a></li>
                                <li>
                                    <a href="" data-toggle = "modal" data-target = "#myModal">Login</a>
                                    
                                     <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
                                        aria-labelledby = "myModalLabel" aria-hidden = "true">

                                        <div class = "modal-dialog">
                                           <div class = "modal-content">

                                              <div class = "modal-header">
                                                 <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                                                       &times;
                                                 </button>
                                                  <center><h3 style="color: #FF0033">Login</h3></center> 
                                               </div>

                                              <div class = "modal-body">
                                                  <div class="form-group">
                                                      <form action="check_authentication.php" method="post">
                                                          <center><label for="user_email" class="label_color">E-mail:</label></center>
                                                          <input type="email" id="useremail" name="user_email" class="form-control" required="required">
                                                          <br>
                                                        
                                                        <center><label for="user_password" class="label_color">Password:</label></center>
                                                        <input type="password" id="user_password" name="user_password" class="form-control" required="required">
                                                        <br>
                                                        
                                                        <center><input type="submit" name="login" value="Login" style="background-color: #FF0033; color: white" class="btn btn-default"/>
                                                            <input type="reset" name="reset" value="Reset" style="background-color: #FF0033; color: white" class="btn"/></center>
                                                      </form>
                                                      <br>
                                                      <center><a href="forget_password_1.php">Forget Password</a></center>
                                                  </div>
                                              </div>
                                           </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                     </div><!-- /.modal -->
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <br><br><br><br>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <center><h1 style="color: white">Plan Your Wedding With</h1></center>
                    <center><h1 style="color: white">India’s Largest Wedding Co.</h1></center>
                </div>
            </div>
        </div>
    </body>
</html>

