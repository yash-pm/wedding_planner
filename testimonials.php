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
        <style>
            .panel-style{
                background-color: #ff0033;
                color: white;
            }
        </style>
    </head>
    <body style="background-image: url('images/body_background.jpg')">
        <br><br>
        <div class="container">
            <center>
                <h1>Meet Our Customers</h1>
                <br>
                <h3>Meet our wonderful customers and learn the magical journey they went through, with us.</h3>
                <br>
            </center>
            <center><button type="button" style="color: white; background-color: #FF0033; width: 20%"class="btn btn-default" data-toggle="modal" data-target="#myModal">Write A Review</button></center>
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center><h4 class="modal-title" style="color: #FF0033">Share Your Fellings With Us</h4></center>
                  </div>
                  <div class="modal-body">
                      <form action="testimonials_source.php" method="post">
                          <textarea name="comment" class="form-control" rows="5" placeholder="Write Here...." required="required"></textarea>
                        <br>
                        <center><input type="submit" name="submit_review" style="background-color: #FF0033; color: white" class="btn btn-default"></center>
                      </form>
                  </div>
                </div>
              </div>
            </div>
            <br><hr>
            
            <?php
                $get_query = "SELECT * FROM `tbl_feedback`";
                $get_result = mysqli_query($conn, $get_query);
                while($get_row = mysqli_fetch_assoc($get_result))
                {
                    $user_id = $get_row['customer_id'];
                    $comment = $get_row['comment'];
                    
                    $name_query = "SELECT * FROM `customer_registration` WHERE `user_id` = '$user_id'";
                    $name_result = mysqli_query($conn, $name_query);
                    while($name_row = mysqli_fetch_assoc($name_result))
                    {
                        $name = $name_row['name'];
                    }
                    echo "<div class='col-md-6'><div class='panel' id='panel'>
                            <div class='panel-heading panel-style' id='panel-head'>$name</div>
                            <div class='panel-body' id='panel-body' style='background-color: #ffe6eb'>
                                <h4>$comment</h4>
                            </div>
                        </div></div>";
                }
            ?>
          </div>
        <br><br>
    </body>
</html>
<?php
    include_once './footer.php';
?>
