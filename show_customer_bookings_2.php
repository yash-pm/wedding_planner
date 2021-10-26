<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
            include_once './header.php';
            include_once './connection.php';
            
            if(isset($_SESSION['user_email']))
            {
                $temp_user = $_SESSION['user_email'];

                $customer_query = "SELECT `user_id`,`name`, `contact_no` FROM `customer_registration` WHERE `email` = '$temp_user'";
                $customer_result = mysqli_query($conn, $customer_query);
                while($customer_row = mysqli_fetch_assoc($customer_result))
                {        
                    $customer_name = $customer_row['name'];
                    $contact_no = $customer_row['contact_no'];
                }
            }
            
            if(isset($_REQUEST['bid']))
            {
                $booking_id = $_REQUEST['bid'];
            }
            
            $booking_details_query = "SELECT * FROM `tbl_customer_booking` WHERE `booking_id` = '$booking_id'";
            $booking_details_result = mysqli_query($conn, $booking_details_query);
            while($booking_details_row = mysqli_fetch_assoc($booking_details_result))
            {
                $from_date = $booking_details_row['from_date'];
                $to_date = $booking_details_row['to_date'];
                $venue_id = $booking_details_row['venue_id'];
                $total_amount = $booking_details_row['total_amount'];
                $advance_amount = $booking_details_row['advance_payment'];
            }
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
    <body>
        <br><br>
        <div class="container">
            <div class="panel" id="panel1">
                <div class="panel-heading panel-style" id="panel1-head">Booking Details<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
                <div class="panel-body" id="panel1-body" style="background-color: #ffe6eb">    
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="label_color"><p><b>Name</b> : <?php echo $customer_name;?></p></span><br>
                            <span class="label_color"><p><b>From Date</b> : <?php if(isset($from_date)){$from=date_create($from_date); echo date_format($from,"d/m/Y");}?></p></span>
                        </div>
                        <div class="col-md-6">
                          <span class="label_color"><p><b>Contact No.</b> : <?php echo $contact_no;?></p></span><br>
                          <span class="label_color"><p><b>To Date</b> : <?php if(isset($to_date)){$to=date_create($to_date); echo date_format($to,"d/m/Y");}?></p></span>
                        </div>
                    </div>
                    <br>
                </div>
                    <center>
                        <a href="update_booking_1.php?bid=<?php echo $booking_id;?>"><button class="btn btn-success">Change Dates</button></a>
                    </center>
                </div>
            </div>
                
             <div class="panel" id="panel2">
                <div class="panel-heading panel-style" id="panel2-head">Guest List<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
                <div class="panel-body" id="panel2-body" style="background-color: #ffe6eb">   
                    <a href="add_guest.php?bid=<?php echo $booking_id;?>"><button class="btn btn-success">Add Guest</button></a><br><br>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Contact No.</th>
                                <th>E-Mail</th>
                                </tr>
                                </thead>
                                <tbody>
                            <tr>
                                <?php
                               
                                if(isset($booking_id))
                                {
                                    $guest_query = "SELECT * FROM `tbl_guest` WHERE `booking_id` = '$booking_id'";
                                    $guest_result = mysqli_query($conn, $guest_query);

                                    while($guest_row = mysqli_fetch_assoc($guest_result))
                                    {
                                        $guest_id = $guest_row['guest_id'];
                                        
                                       echo"<td>".$guest_row['name']."</td>";
                                       echo"<td>".$guest_row['address']."</td>";

                                       $temp_city_id = $guest_row['city_id'];
                                       $guest_city_query = "SELECT `city_name`, `state_id` FROM `city_master` WHERE `city_id` = '$temp_city_id'";
                                       $guest_city_result = mysqli_query($conn, $guest_city_query);

                                       while ($city_row = mysqli_fetch_assoc($guest_city_result))
                                       {
                                           $temp_state_id = $city_row['state_id'];
                                           $guest_state_query = "SELECT `state_name` FROM `state_master` WHERE `state_id` ='$temp_state_id'";
                                           $guest_state_result = mysqli_query($conn,$guest_state_query);

                                           while ($state_row = mysqli_fetch_assoc($guest_state_result))
                                           {
                                               echo"<td>".$state_row['state_name']."</td>";
                                           }
                                           echo"<td>".$city_row['city_name']."</td>";
                                       }

                                       echo"<td>".$guest_row['contact_no']."</td>";
                                       echo"<td>".$guest_row['email']."</td>";
                                       echo "<td><center><a href='change_guest_details.php?gid=".$guest_id."'><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></center></td>";
                                       echo "<td><center><a href='delete_guest.php?gid=".$guest_id."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a></center></td>";
                                       echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                               </table>
                </div>
             </div>
            
            <div class="panel" id="panel3">
                <div class="panel-heading panel-style" id="panel3-head">Events<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
                <div class="panel-body" id="panel3-body" style="background-color: #ffe6eb">  
                    <a href="add_customer_event.php?bid=<?php echo $booking_id;?>"><button class="btn btn-success">Add Event</button></a><br><br>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>From Time</th>
                                <th>To Time</th>
                                </tr>
                                </thead>
                                <tbody>
                            <tr>
                                <?php
                               
                                if(isset($booking_id))
                                {
                                    $cust_event_query = "SELECT * FROM `tbl_customer_events` where `booking_id` = '$booking_id'";
                                    $cust_event_result = mysqli_query($conn,$cust_event_query);

                                    while($cust_event_row = mysqli_fetch_array($cust_event_result))
                                    {
                                        $event_id=$cust_event_row['event_id'];

                                        $event_name_query = "SELECT `event_name` FROM `tbl_events` WHERE `event_id` = '$event_id'";
                                        $event_name_result = mysqli_query($conn, $event_name_query);

                                        while ($event_name_row = mysqli_fetch_assoc($event_name_result))
                                        {
                                            echo "<td>".$event_name_row['event_name']."</td>";
                                        }
                                            $from=date_create($cust_event_row['date']);
                                            $date = date_format($from,"d/m/Y");
                                            $customer_event_id = $cust_event_row['customer_event_id'];
                                        
                                            $from_time = date('h:i A', strtotime($cust_event_row['from_time']));
                                            $to_time = date('h:i A', strtotime($cust_event_row['to_time']));
                                            
                                        echo "<td>".$date."</td>";
                                        echo "<td>".$from_time."</td>";
                                        echo "<td>".$to_time."</td>";
                                        echo "<td><center><a href='update_booking_3.php?ceid=".$customer_event_id."&bid=".$booking_id."'><button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></button></a></center></td>";
                                        echo "<td><center><a href='delete_customer_event.php?ceid=".$customer_event_id."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a></center></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                               </table>
                </div>
            </div>
            
            <div class="panel" id="panel4">
                <div class="panel-heading panel-style" id="panel4-head">Guests Of Events<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
                <div class="panel-body" id="panel4-body" style="background-color: #ffe6eb">    
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                
                            </tr>
                                </thead>
                                <tbody>
                            <tr>
                                <?php
                               
                                if(isset($booking_id))
                                {
                                    $cust_event_query1 = "SELECT * FROM `tbl_customer_events` where `booking_id` = '$booking_id'";
                                    $cust_event_result1 = mysqli_query($conn,$cust_event_query1);

                                    while($cust_event_row1 = mysqli_fetch_array($cust_event_result1))
                                    {
                                        $event_id = $cust_event_row1['event_id'];
                                        $customer_event_id = $cust_event_row1['customer_event_id'];

                                        $event_name_query1 = "SELECT `event_name` FROM `tbl_events` WHERE `event_id` = '$event_id'";
                                        $event_name_result1 = mysqli_query($conn, $event_name_query1);

                                        while ($event_name_row1 = mysqli_fetch_assoc($event_name_result1))
                                        {               
                                            echo "<td><span class='label_color' style='font-size: 20px'><p><b>".$event_name_row1['event_name']."</b></p></span><br></td>";
                                        }
                                        echo "<td><a href='show_event_guest.php?ceid=".$customer_event_id."&bid=".$booking_id."'><button class='btn btn-success'>Show Guest</button></a></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="panel" id="panel5">
                <div class="panel-heading panel-style" id="panel5-head">Venue<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
                <div class="panel-body" id="panel5-body" style="background-color: #ffe6eb">
                    <br>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                
                            </tr>
                                </thead>
                                <tbody>
                            <tr>
                                <?php
                               
                                if(isset($booking_id))
                                {
                                    $venue_query = "SELECT * FROM `tbl_venue` WHERE `venue_id` = '$venue_id'";
                                    $venue_result = mysqli_query($conn,$venue_query);

                                    while($venue_row = mysqli_fetch_array($venue_result))
                                    {
                                        $venue_id = $venue_row['venue_id'];
                                        $picture_path = $venue_row['picture_path'];
                                        $name = $venue_row['name'];
                                        $address = $venue_row['address'];
                                        $capacity = $venue_row['capacity'];
                                        $price = $venue_row['price'];

                                        echo "<div class='container'>
                                            <div class='row'>
                                            <div class='col-md-3'>
                                                <img src='Admin/".$picture_path."' alt='' height='200' width='280' class='img-rounded'/>
                                            </div>
                                            <div class='col-md-4'>
                                                <h2 class='label_color'>".$name."</h2>
                                                <br>
                                                <address>
                                                    <span class='glyphicon glyphicon-map-marker'></span>&nbsp;
                                                    ".$address."
                                                </address>
                                            </div>  
                                            <div class='col-md-3'>
                                                <br><br>
                                                <center>
                                                    <h3 class='label_color'><i class='fas fa-male' style='font-size:36px'></i> Capacity</h3>
                                                    <p>".$capacity." Peoples</p>
                                                    <br>
                                                    <h3 class='label_color'><i class='fas fa-rupee-sign' style='font-size:30px'></i> Price</h3>
                                                    <p>".$price." /- </p>
                                                </center>
                                            </div>
                                            <div class='col-md-2'>
                                                
                                            </div>
                                        </div>
                                        </div>
                                        <br>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                    </table>
                    <center><a href="change_venue.php?bid=<?php echo $booking_id;?>"><button class="btn btn-success">Change Venue</button></a></center><br><br>
                </div>
            </div>
            
            <div class="panel" id="panel6">
                <div class="panel-heading panel-style" id="panel6-head">Total Amount<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
                <div class="panel-body" id="panel6-body" style="background-color: #ffe6eb">    
                    <span class="label_color"><h3>Booking Details</h3></span>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <span class="label_color"><p><b>Name</b> : <?php echo $customer_name;?></p></span>
                                    <span class="label_color"><p><b>Booking ID</b> : <?php if(isset($booking_id)){echo $booking_id;}?></p></span>
                                </div>
                                <div class="col-md-6">
                                    <span class="label_color"><p><b>From Date</b> : <?php if(isset($from_date)){$from=date_create($from_date); echo date_format($from,"d/m/Y");}?></p></span>
                                    <span class="label_color"><p><b>To Date</b> : <?php if(isset($to_date)){$to=date_create($to_date); echo date_format($to,"d/m/Y");}?></p></span>
                                </div>
                            </div>
                            <br>
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <th>Events</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        if(isset($booking_id))
                                        {
                                            $event_query = "SELECT tbl_events.event_name,tbl_customer_events.date,tbl_customer_events.from_time,tbl_customer_events.to_time FROM tbl_customer_events INNER JOIN tbl_events ON tbl_customer_events.event_id=tbl_events.event_id WHERE tbl_customer_events.booking_id='$booking_id'";
                                            $event_result = mysqli_query($conn,$event_query);
                                            while ($event_row = mysqli_fetch_assoc($event_result))
                                            {
                                                $event_date=date_create($event_row['date']);

                                                echo "<td>".$event_row['event_name']."</td>";
                                                echo "<td>".date_format($event_date,"d / m / Y")."</td>";
                                                echo "<td>".date('h:i A', strtotime($event_row['from_time']))." - ".date('h:i A', strtotime($event_row['to_time']))."</td></tr>";  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <span class="label_color"><p><b>Total Amount</b> : <?php if(isset($total_amount)){echo $total_amount;}?></p></span>
                            <span class="label_color"><p><b>Advance Amount</b> : <?php if(isset($advance_amount)){echo $advance_amount;}?></p></span>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
<?php
    include_once './footer.php';
?>
