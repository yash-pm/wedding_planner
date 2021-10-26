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
    <body>
        <br>
        <div class="container">
            <center><h1 style="color: #FF0033">Your Bookings</h1></center>
            <br>
            <div class="panel" id="panel">
                <div class="panel-heading panel-style" id="panel-head" style="background-color: #FF0033">.</div>
            <div class="panel-body" id="panel-body" style="background-color: #ffe6eb">
                <div class="form-group">
                    <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Venue</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                    
                        if(isset($_SESSION['user_id']))
                        {
                            $temp_user_id = $_SESSION['user_id'];
                        }
                        
                        $booking_details_query = "SELECT * FROM `tbl_customer_booking` WHERE `customer_id` = '$temp_user_id'";
                        $booking_details_result = mysqli_query($conn, $booking_details_query);
                        while($booking_details_row = mysqli_fetch_assoc($booking_details_result))
                        {
                            $status = $booking_details_row['status'];
                            
                            if($status != "cancelled")
                            {
                                echo "<td>".$booking_details_row['booking_id']."</td>";
                                echo "<td>".$booking_details_row['from_date']."</td>";
                                echo "<td>".$booking_details_row['to_date']."</td>";

                                $venue_id = $booking_details_row['venue_id'];
                                $venue_query = "SELECT `name` FROM `tbl_venue` WHERE `venue_id` = '$venue_id'";
                                $venue_result = mysqli_query($conn, $venue_query);
                                while($venue_row = mysqli_fetch_assoc($venue_result))
                                {
                                    echo "<td>".$venue_row['name']."</td>";
                                }
                                echo "<td><a href='show_customer_bookings_2.php?bid=".$booking_details_row['booking_id']."'><center><button class='btn btn-success'>Details</button></center></a></td>";
                                echo "<td><a href='delete_booking.php?bid=".$booking_details_row['booking_id']."'><center><button class='btn btn-danger'>Delete</button></center></a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
                </div>
                <br>
            </div>
        </div>
            
                
            
        </div>
    </body>
</html>
<?php
    include_once './footer.php';
?>
