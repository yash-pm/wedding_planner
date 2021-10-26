<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './header.php'; 
    include_once './connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body style="background-image: url('images/body_background.jpg')">
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <center><h1 style="color: #ff0033" class="label_color">Why Dream Wedding</h1></center><br>
                    <b><p style="font-size: 20px">Dream Wedding specializes in managing just these occasions from small, intimate family events to large, spectacular celebrations: weddings are the only thing we do! We can plan your entire wedding from venue bookings, vendor management to the overall design and execution.  We offer a personal service, accompanying you not only on your initial viewing of possible venues but on any subsequent visits and for the duration of your wedding, ensuring total dedication to you.</p></b>
                </div>
                <div class="col-md-4">
                    <img src="images/body-1.jpg" alt="" height="300" width="450" class="img-rounded"/>
                </div>
            </div>
            <br>
        </div>
        <div class="container-fluid" style="background-image: url('images/why-weddingz.jpg')">
            <br><br><br><br>
            <div class="row">
                <div class="col-md-3">
                    <?php
                        $wedding_query = "SELECT * FROM `tbl_customer_booking` WHERE `status` = 'Complited'";
                        $wedding_result = mysqli_query($conn, $wedding_query);
                        
                        $wedding_total_row = mysqli_num_rows($wedding_result);
                    ?>
                    <center>
                        <h1 style="color: white"><?php echo $wedding_total_row;?>+</h1>
                        <h3 style="color: white">Complited Wedding</h3>
                    </center>
                </div>
                <div class="col-md-3">
                    <?php
                        $staff_query = "SELECT * FROM `tbl_staff`";
                        $staff_result = mysqli_query($conn, $staff_query);
                        
                        $staff_total_row = mysqli_num_rows($staff_result);
                    ?>
                    <center>
                        <h1 style="color: white"><?php echo $staff_total_row;?>+</h1>
                        <h3 style="color: white">Total Vendors</h3>
                    </center>
                </div>
                <div class="col-md-3">
                    <?php
                        $venue_query = "SELECT * FROM `tbl_venue`";
                        $venue_result = mysqli_query($conn, $venue_query);
                        
                        $venue_total_row = mysqli_num_rows($venue_result);
                    ?>
                    <center>
                        <h1 style="color: white"><?php echo $venue_total_row;?>+</h1>
                        <h3 style="color: white">Total Venues</h3>
                    </center>
                </div>
                <div class="col-md-3">
                    <center>
                        <h1 style="color: white">1+</h1>
                        <h3 style="color: white">Years Of Experienced</h3>
                    </center>
                </div>
            </div>
            <br><br><br><br>
        </div>
        <br>
        <div class="container">
            <center><h1 style="color: #ff0033" class="label_color">Services</h1></center><br>
            <div class="row">
                <div class="col-md-4">
                    <b><h3 class="label_color"><span class="glyphicon glyphicon-list-alt" style="color: #ff0033"></span> Complete Wedding Planning</h3></b>
                    <br>
                    <b><p>Our Full Service Wedding Planning includes every aspect of planning your wedding. No detail is left undone, as our team will be there for you in every step of the way</p></b>
                </div>
                <div class="col-md-4">
                    <b><h3 class="label_color"><span class="glyphicon glyphicon-file" style="color: #ff0033"></span> Venue Booking</h3></b>
                    <br>
                    <b><p>Dream Wedding plans sevral weddings in year. This avail us to get discounted rates from venues which are not available to you. Get benefits of our Banquet halls and party lawns tie-up.</p></b>
                </div>
                <div class="col-md-4">
                    <b><h3 class="label_color"><span class="glyphicon glyphicon-grain" style="color: #ff0033"></span> Wedding Decor</h3></b>
                    <br>
                    <b><p>From the moment your guests walk in, they should experience your vision and personality through the stunning customized décor and unique touches that the  our wedding decorators will provide.</p></b>
                </div>
            </div>
            
            <br>
            
            <div class="row">
                <div class="col-md-4">
                    <b><h3 class="label_color"><span class="glyphicon glyphicon-user" style="color: #ff0033"></span> Vendor Sourcing</h3></b>
                    <br>
                    <b><p>Special prices and exclusive discounts with our partners (Decorators, Entertainment, Bridal Makeup, Mehendi etc) and priority access to events sponsored by Dream Wedding.</p></b>
                </div>
                <div class="col-md-4">
                    <b><h3 class="label_color"><span class="glyphicon glyphicon-adjust" style="color: #ff0033"></span> Partial Wedding Planning</h3></b>
                    <br>
                    <b><p>Our partial planning services is perfect for those couples who have already started their wedding planning process and need professional guidance regarding some elements of their wedding like decor designing or  planning a theme.</p></b>
                </div>
                <div class="col-md-4">
                    <b><h3 class="label_color"><span class="glyphicon glyphicon-envelope" style="color: #ff0033"></span> Onine Invitation</h3></b>
                    <br>
                    <b><p>Threw the service of online invitation we can send invitations to your all guests on behalf of you. so you don't need to worried about the invitations.this is one of the best facilities provide by us.</p></b>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                      <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            
                        </div>
                        <div class='item'>
                            
                        </div>
                        <div class='item'>
                            
                        </div>
                        <div class='item'>
                            
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
        </div>
        <br>
    </body>
</html>
<?php
    include_once './footer.php';
?>
