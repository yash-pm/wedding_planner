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
        
    </head>
    <body>
    <?php
            include_once './header.php';
            include_once './connection.php';
            
            $temp_venue_id = $_REQUEST['venue_id'];
            $venue_main_image_query = "SELECT * FROM tbl_venue WHERE venue_id='$temp_venue_id'";
            $venue_main_image_result = mysqli_query($conn,$venue_main_image_query);
            while ($venue_main_image_row = mysqli_fetch_assoc($venue_main_image_result))
            {
                $venue_name = $venue_main_image_row['name'];
                $venue_address = $venue_main_image_row['address'];
                $venue_capacity = $venue_main_image_row['capacity'];
                $venue_price = $venue_main_image_row['price'];
            }
                                  
            $venue_extra_image_query = "SELECT * FROM `tbl_venue_pictures` WHERE venue_id='$temp_venue_id'";
            $venue_extra_image_result = mysqli_query($conn,$venue_extra_image_query);
            
           
    ?>
        <br>
        
    <div class="container">
        <center><h1 style="color: #FF0033">Wedding Venues</h1></center>
        <br><hr>
        <div class="row">
            <div class="col-md-6">
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
                        <?php
                            $venue_main_image_query1 = "SELECT * FROM tbl_venue WHERE venue_id='$temp_venue_id'";
                            $venue_main_image_result1 = mysqli_query($conn,$venue_main_image_query1);
                            while ($venue_main_image_row1 = mysqli_fetch_assoc($venue_main_image_result1))
                            {
                                echo "<img src='Admin/".$venue_main_image_row1['picture_path']."' alt='venue_picture' height='500' width='600'/>";
                            }
                        ?>
                      </div>
                        <?php
                        while ($venue_extra_image_row = mysqli_fetch_assoc($venue_extra_image_result))
                        {
                            echo "<div class='item'>"
                                ."<img src='Admin/".$venue_extra_image_row['picture_path']."' alt='venue_picture' height='500' width='600'/>"
                                ."</div>";
                        }
                    ?>
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
                <br><br>
                
            </div>
            <div class="col-md-6">
                <h2><?php echo $venue_name;?></h2>
                <br><br>
                <div class="row">
                <div class="col-md-9">
                    <address>
                        <span class='glyphicon glyphicon-map-marker'></span>&nbsp;
                        <?php echo $venue_address;?>        
                    </address>
                </div>
                    <div class="col-md-3"></div>
                </div>
                <br><br>
                <h3 class="label_color"><i class="fas fa-male" style="font-size:36px"></i> Capacity</h3>
                <p><?php echo $venue_capacity;?> Peoples</p>
                <br>
                <h3 class="label_color"><i class="fas fa-rupee-sign" style="font-size:30px"></i> Price</h3>
                <p><?php echo $venue_price;?> /- </p>
            </div>
        </div>
    </div>
    </body>
</html>
<?php
    include_once './footer.php';
?>
