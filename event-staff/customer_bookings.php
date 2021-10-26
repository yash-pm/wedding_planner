<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        include_once './staff_header.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="col-md-2"></div>
        <div class="col-md-10">
        <br>
        <center><h1 style="color: #FF0033">Bookings</h1></center>
        <br>
        <div class="container-fluid">
            <hr>
            <table class="table table-condensed table-hover">
             <thead>
             <tr>
             <th>Name</th>
             <th>From Date</th>
             <th>To Date</th>
             <th>Venue</th>
             </tr>
             </thead>
             <tbody>
             <tr>
             <?php
             
             include_once '../connection.php';
             
             $booking_query = "SELECT * FROM `tbl_customer_booking` WHERE `status` = 'Pending'";
             $booking_result = mysqli_query($conn,$booking_query);

             while($booking_row = mysqli_fetch_assoc($booking_result))
             {
                 $booking_id = $booking_row['booking_id'];
                 $customer_id = $booking_row['customer_id'];
                 $customer_query = "SELECT * FROM `customer_registration` WHERE `user_id`= '$customer_id'";
                 $customer_result = mysqli_query($conn, $customer_query);
                 while($customer_row = mysqli_fetch_assoc($customer_result))
                 {
                     $customer_name = $customer_row['name'];
                 }
                 
                 $venue_id = $booking_row['venue_id'];
                 $venue_query = "SELECT * FROM `tbl_venue` WHERE `venue_id` = '$venue_id'";
                 $venue_result = mysqli_query($conn, $venue_query);
                 while($venue_row = mysqli_fetch_assoc($venue_result))
                 {
                     $venue_name = $venue_row['name'];
                 }
                 
                 echo "<td>".$customer_name."</td>";
                 echo "<td>".$booking_row['from_date']."</td>";
                 echo "<td>".$booking_row['to_date']."</td>";
                 echo "<td>".$venue_name."</td>";
                 echo "<td><center><a href='booking_details.php?bid=".$booking_id."'><button class='btn btn-success'>Details</button></a></center></td>";
                 echo "</tr>";
             }
             
             ?>
            </table>
            </div>
        </div>
    </body>
</html>
<?php
        include_once './staff_footer.php';
?>