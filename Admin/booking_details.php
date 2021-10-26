<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        include_once './admin_header.php';
        include_once '../connection.php';
        
        if(isset($_REQUEST['bid']))
        {
            $booking_id = $_REQUEST['bid'];
        }
        
        $details_query = "SELECT * FROM `tbl_customer_booking` WHERE `booking_id` = '$booking_id'";
        $details_result = mysqli_query($conn, $details_query);
        while($details_row = mysqli_fetch_assoc($details_result))
        {
            $customer_id = $details_row['customer_id'];
            $from_date = $details_row['from_date'];
            $to_date = $details_row['to_date'];
            $venue_id = $details_row['venue_id'];
            $advance_payment = $details_row['advance_payment'];
            $total_payment = $details_row['total_amount'];
        }      
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
            <center><h1 style="color: #FF0033">Bookings Details</h1></center>
            <br>
                <div class="container-fluid">
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                           
                                $customer_query = "SELECT * FROM `customer_registration` WHERE `user_id` = '$customer_id'";
                                $customer_result = mysqli_query($conn, $customer_query);
                                while($customer_row = mysqli_fetch_assoc($customer_result))
                                {
                                    $customer_name = $customer_row['name'];
                                    $customer_contact_no = $customer_row['contact_no'];
                                    $customer_email = $customer_row['email'];
                                }
                            ?>
                            <span class="label_color"><p><b>Name : </b><?php echo $customer_name;?></p></span>
                            <br>
                            <span class="label_color"><p><b>Contact No. : </b><?php echo $customer_contact_no;?></p></span>
                            <br>
                            <span class="label_color"><p><b>E-mail : </b><?php echo $customer_email;?></p></span>
                        </div>
                        <div class="col-md-6">
                            <span class="label_color"><p><b>Date</b> : <?php if(isset($from_date)){$from=date_create($from_date); echo date_format($from,"d/m/Y");}?> <b>To</b> <?php if(isset($to_date)){$to=date_create($to_date); echo date_format($to,"d/m/Y");}?></p></span>
                            <br>
                            <span class="label_color"><p><b>Advance Payment : </b><?php echo $advance_payment;?></p></span>
                            <br>
                            <span class="label_color"><p><b>Total Amount : </b><?php echo $total_payment;?></p></span>
                            <br>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="label_color"><p style="font-size: 30px"><b>Events</b></p></span>
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <th>Events</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                            $event_query = "SELECT tbl_events.event_name,tbl_customer_events.date,tbl_customer_events.from_time,tbl_customer_events.to_time FROM tbl_customer_events INNER JOIN tbl_events ON tbl_customer_events.event_id=tbl_events.event_id WHERE tbl_customer_events.booking_id='$booking_id'";
                                            $event_result = mysqli_query($conn,$event_query);
                                            while ($event_row = mysqli_fetch_assoc($event_result))
                                            {
                                                $event_date=date_create($event_row['date']);

                                                echo "<td>".$event_row['event_name']."</td>";
                                                echo "<td>".date_format($event_date,"d / m / Y")."</td>";
                                                echo "<td>".date('h:i A', strtotime($event_row['from_time']))." - ".date('h:i A', strtotime($event_row['to_time']))."</td></tr>";  
                                            }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <span class="label_color"><p style="font-size: 30px"><b>Guest List</b></p></span>
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact No.</th>
                                    <th>E-Mail</th>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                            $guest_query = "SELECT * FROM `tbl_guest` WHERE `booking_id` = '$booking_id'";
                                            $guest_result = mysqli_query($conn,$guest_query);
                                            while ($guest_row = mysqli_fetch_assoc($guest_result))
                                            {
                                                echo "<td>".$guest_row['name']."</td>";
                                                echo "<td>".$guest_row['address']."</td>";
                                                echo "<td>".$guest_row['contact_no']."</td>";
                                                echo "<td>".$guest_row['email']."</td>";
                                                echo "</tr>";
                                            }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>
<?php
        include_once './admin_footer.php';
?>