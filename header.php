<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(isset($_SESSION['user_email']))
    {
        $user_email=$_SESSION['user_email'];
    }
?>
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
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
                    <div class="col-md-12">
                        <nav class="navbar navbar-default">   
                            <ul class="nav navbar-nav">
                                <li><a href="user_home.php">Home</a></li>
                                <li>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="color: white; font-size: 19px"><b>BOOKING</b></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="event_booking.php">Add Booking</a></li>
                                            <li><a href="show_customer_bookings_1.php">Show Bookings</a></li>
                                        </ul>
                                      </div>
                                </li>
                                <li><a href="venues.php">Venus</a></li>
                                <li><a href="testimonials.php">Testimonials</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-user" style="float:right; color: #FFFFFF; font-size: 20px;" data-toggle="modal" data-target="#modalLoginForm"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                            <center><label for="user_email" style="color: black">User : <?php if(isset($user_email)){echo $user_email;}?></label></center>
                                            </li><hr>
                                            <li>
                                                <a href="edit_customer_profile.php"><span class="glyphicon glyphicon-edit"></span>&nbsp; Edit Profile</a>
                                            </li>
                                            <li>
                                                <a href="change_password.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Change Password</a>
                                            </li>
                                            <li>
                                                <a href="logout.php"><span class="glyphicon glyphicon-off"></span>&nbsp; Logout</a>
                                            </li>
                                        </ul>
                                    </div>
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

