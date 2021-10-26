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
        $uid = $customer_row['user_id'];
        $name = $customer_row['name'];
        $contact_no = $customer_row['contact_no'];
    }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
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
                <div class="panel-heading panel-style" id="panel1-head">1. Booking<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
                <div class="panel-body" id="panel1-body" style="background-color: #ffe6eb">
                <form action="booking_source_1.php" method="post" onsubmit="return validation()">
                    <input type="hidden" name="uid" value="<?php echo $uid;?>">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="label_color">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>" readonly=""/>
                            <br>
                            
                            <label for="from_date" class="label_color">From Date:</label>
                            <input type="date" class="form-control" id="from_date" name="from_date" min="<?php echo date('Y-m-d');?>"/>
                            <span id="fromerror" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            
                          <label for="contact_no" class="label_color">Contact No:</label>
                          <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $contact_no;?>" readonly=""/>
                          <br>
                          
                          <label for="to_date" class="label_color">To Date:</label>
                          <input type="date" class="form-control" id="to_date" name="to_date" min="<?php echo date('Y-m-d');?>"/>
                          <span id="toerror" class="text-danger"></span>
                        </div>
                    </div>
                    <br>
                </div>
                    <center>
                        <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
                        <input type="reset" name="reset" value="Reset" class="btn btn-danger"/>
                    </center>
                </form>
            </div>
        </div>
            
        <div class="panel" id="panel12">
            <div class="panel-heading panel-style" id="panel2-head">2. Upload Guest List<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
            <div class="panel-body" id="panel2-body" style="background-color: #ffe6eb">
                <div class="form-group">
                    <form action="booking_source_2.php" method="post" name="uploadCSV" enctype="multipart/form-data" onsubmit="return fileValidation()">
                        <center><label for="file">Choose Excel File</label><br><br>
                            <input type="file" name="file" id="file" accept=".csv"><br>
                            <span id="guest_file_error" class="text-danger"></span>
                        <input type="submit" name="submit" value="Upload" class="btn btn-success"/></center>
                    </form>
                </div>
                <br>
            </div>
        </div>
            
        <div class="panel" id="panel3">
            <div class="panel-heading panel-style" id="panel3-head">3. Add Sub Events<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
            <div class="panel-body" id="panel3-body" style="background-color: #ffe6eb">
                <div class="form-group">
                    <form action="booking_source_3.php" method="post" onsubmit="return validation3()">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="event" class="label_color">Select Event:</label>
                            <select id="event" name="event" style="border-color:#ccc" class="btn col-md-12">
                                <?php
                                        $query = "SELECT * FROM tbl_events";
                                        $result = mysqli_query($conn,$query);

                                    while($test = mysqli_fetch_array($result))
                                    {
                                        $eid=$test['event_id'];
                                        $event_name=$test['event_name'];
                                        echo "<option value=".$eid.">".$event_name."</option>";
                                    }
                                    
                                ?>
                            </select>
                            <br><br><br>
                            
                            <?php
                                    
                                    if(isset($_SESSION['booking_id']))
                                    {
                                        $booking_id = $_SESSION['booking_id'];
                                    
                                    
                                    $get_query = "SELECT * FROM `tbl_customer_booking` WHERE `booking_id` = '$booking_id'";
                                    $get_result = mysqli_query($conn, $get_query);
                                    while($get_row = mysqli_fetch_assoc($get_result))
                                    {
                                        $from_date = $get_row['from_date'];
                                        $to_date = $get_row['to_date'];
                                    }
                                    }
                            ?>
                            <label for="date" class="label_color">Date:</label>
                            <input type="date" class="form-control" id="customer_event_date" name="date" min="<?php echo $from_date;?>" max="<?php echo $to_date;?>"/>
                            <span id="customer_event_date_error" class="text-danger"></span>
                            <br>
                            
                        </div>
                        
                        
                        <div class="row">
                            <div class="container">
                            <div class="col-md-6">
                                <label for="from_time" class="label_color">From Time:</label>
                                <input type="time" class="form-control" id="from_time" name="from_time"/>
                                <span id="from_time_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="to_time" class="label_color">To Time:</label>
                                <input type="time" class="form-control" id="to_time" name="to_time"/>
                                <span id="to_time_error" class="text-danger"></span>
                            </div>
                            </div>
                        </div>
                        <br>
                        <center><input type="submit" name="submit" value="Submit" class="btn btn-success"/></center>
                    </form>  
                </div>  
                </div>
            </div>
        </div>
        
        <div class="panel" id="panel14">
            <div class="panel-heading panel-style" id="panel4-head">4. Select Guest For Subevent<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
            <div class="panel-body" id="panel4-body" style="background-color: #ffe6eb">
                <div class="form-group">
                   
                    <form action="booking_source_4.php" method="post"> 
                      <label for="customer_event" class="label_color">Select Event:</label>
                            <select id="customer_event" name="customer_event" style="border-color:#ccc" class="btn col-md-12">
                                <?php
                                        if(isset($_SESSION['booking_id']))
                                        {
                                            $booking_id = $_SESSION['booking_id'];
                                        }
                                        if(isset($booking_id))
                                        {
                                            $cust_event_query = "SELECT * FROM `tbl_customer_events` where `booking_id` = '$booking_id'";
                                            $cust_event_result = mysqli_query($conn,$cust_event_query);

                                            while($cust_event_row = mysqli_fetch_array($cust_event_result))
                                            {
                                                $cust_event_id = $cust_event_row['customer_event_id'];
                                                $event_id=$cust_event_row['event_id'];

                                                $event_name_query = "SELECT `event_name` FROM `tbl_events` WHERE `event_id` = '$event_id'";
                                                $event_name_result = mysqli_query($conn, $event_name_query);

                                                while ($event_name_row = mysqli_fetch_assoc($event_name_result))
                                                {
                                                    $event_name = $event_name_row['event_name'];
                                                }
                                                echo "<option value=".$cust_event_id.">".$event_name."</option>";
                                            }
                                        }
                                ?>
                            </select>
                            <br><br>
                        <br>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                            <table class="table table-condensed table-hover ">
                                <thead>
                                <tr>
                                <th>Select Guest</th>
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
                                if(isset($_POST['customer_event']))
                                {
                                    $customer_event = $_POST['customer_event'];
                                }

                                if(isset($_SESSION['booking_id']))
                                {
                                    $booking_id = $_SESSION['booking_id'];
                                }
                               
                                if(isset($booking_id))
                                {
                                    $guest_query = "SELECT * FROM `tbl_guest` WHERE `booking_id` = '$booking_id'";
                                    $guest_result = mysqli_query($conn, $guest_query);

                                    while($guest_row = mysqli_fetch_assoc($guest_result))
                                    {
                                        $guest_id = $guest_row['guest_id'];

                                       echo "<td><center><input type='checkbox' name='guest_list[]' value=".$guest_id."/></center></td>" ;
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
                                       echo "</tr>";
                                    }
                                }
                                ?>
                               </table>
                        </div>
                        </div>  
                        <center><input type="submit" name="submit" value="Add Guest" class="btn btn-success"/></center>
                    </form>
                </div>
                <br>
            </div>
        </div>
 
        <div class="panel" id="panel5">
            <div class="panel-heading panel-style" id="panel5-head">5. Venue Selection<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
            <div class="panel-body" id="panel5-body" style="background-color: #ffe6eb">
                <div class="form-group">
                    <form action="booking_source_5.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <center><label for="venue_city" class="label_color">Select City:</label></center>
                        <select id="venue_city" name="venue_city" style="border-color:#ccc" class="btn col-md-12" onchange="getVenues()">
                            <?php
                                    $venue_city_query = "SELECT DISTINCT city_master.city_name,city_master.city_id FROM tbl_venue INNER JOIN city_master ON tbl_venue.city_id=city_master.city_id";
                                    $venue_city_result = mysqli_query($conn,$venue_city_query);
                                    
                                while($venue_city_row = mysqli_fetch_array($venue_city_result))
                                {
                                    $city_id=$venue_city_row['city_id'];
                                    $city_name=$venue_city_row['city_name'];
                                    echo "<option value=".$city_id.">".$city_name."</option>";
                                }
                            ?>
                        </select>
                        </div>
                        <div class="col-md-6">
                            <label for="venue_type" class="label_color">Select Venue Type:</label>
                            <select id="venue_type" name="venue_type" style="border-color:#ccc" class="btn col-md-12" onchange="getVenues()">
                               <option value="1">Banquet Hall</option>
                               <option value="2">Plote</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    
                    <div id="response">
                    </div>
                    
                    <br>
                    <center><input type="submit" name="done_venue" value="Done Venue" class="btn btn-success"></center>    
                    </form>
                </div>
            </div>
            
        </div>
            
        <div class="panel" id="panel6">
            <div class="panel-heading panel-style" id="panel6-head">6. Payment<span class="glyphicon glyphicon-circle-arrow-down" style="float: right"></span></div>
            <div class="panel-body" id="panel6-body" style="background-color: #ffe6eb">
                <?php
                    
                    if(isset($_SESSION['booking_id']))
                    {
                       $booking_id = $_SESSION['booking_id'];
                    
                    $data_query = "SELECT * FROM `tbl_customer_booking` WHERE `booking_id` = '$booking_id'";
                    $data_result = mysqli_query($conn, $data_query);
                    
                    while ($data_row = mysqli_fetch_assoc($data_result))
                    {
                        $from_date = $data_row['from_date'];
                        $to_date = $data_row['to_date'];
                        $temp_venue_id = $data_row['venue_id'];
                        
                        $venue_details_query = "SELECT * FROM `tbl_venue` WHERE `venue_id` = '$temp_venue_id'";
                        $venue_details_result = mysqli_query($conn, $venue_details_query);
                        while ($venue_details_row = mysqli_fetch_assoc($venue_details_result))
                        {
                            $duration = $venue_details_row['duration'];
                            $price = $venue_details_row['price'];
                        }
                    }
                    
                    $date1=$from_date;
                    $date2=$to_date;
                    function dateDiff($date1, $date2) 
                    {
                      $date1_ts = strtotime($date1);
                      $date2_ts = strtotime($date2);
                      $diff = $date2_ts - $date1_ts;
                      $final_diff = round($diff / 86400) + 1;
                      return $final_diff;
                    }
                    $dateDiff= dateDiff($date1, $date2);
                    
                    $one_day_price=1*$price/$duration;
                    $venue_amount = $one_day_price*$dateDiff;
                    $total_amount = $venue_amount + 50000;
                    $advace_amount = $total_amount * 30 / 100;
                    
                    $payment_query = "UPDATE `tbl_customer_booking` SET `advance_payment`= '$advace_amount' ,`total_amount`= '$total_amount' WHERE `booking_id` = '$booking_id'";
                    $payment_result = mysqli_query($conn, $payment_query);
                    if(!$payment_result)
                    {
                        echo "<script>alert('Amount Not Added')</script>";
                    }
                    }
                ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <label for="card_type" class="label_color">Select Card Type:</label>
                            <select id="card_type" name="card_type" style="border-color:#ccc" class="btn col-md-12">
                               <option value="1">Credit Card</option>
                               <option value="2">Debit Card</option>
                            </select>
                            <br><br><br>
                            
                            <label for="card_number" class="label_color">Card Number:</label>
                            <input type="text" name="card_number" id="card_number" class="form-control" placeholder="Enter Card Number"/>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="expiry_date" class="label_color">Expiry date:</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select id="expiry_month" name="expiry_month" style="border-color:#ccc" class="btn col-md-12">
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">Auguest</option>
                                                <option value="09">September</option>
                                                <option value="10">Octomber</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                             </select>
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="expiry_year" id="expiry_year" class="form-control" placeholder="Year"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="cvv_number" class="label_color">CVV Number:</label><br>
                                    <input type="text" name="cvv_number" id="cvv_number" class="form-control" placeholder="Enter CVV Number"/>
                                </div>
                            </div>
                            
                            <br>
                            <center><input type="submit" name="payment" value="Pay &nbsp;<?php if (isset($advace_amount)){echo $advace_amount;}?>" class="btn btn-success col-md-3"></center>
                        </div>
                        <div class="col-md-6">
                            <span class="label_color"><h3>Booking Details</h3></span>
                            <br>
                            <span class="label_color"><p><b>From Date</b> : <?php if(isset($from_date)){$from=date_create($from_date); echo date_format($from,"d/m/Y");}?></p></span>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="label_color"><p><b>To Date</b> : <?php if(isset($to_date)){$to=date_create($to_date); echo date_format($to,"d/m/Y");}?></p></span>
                                </div>
                                <div class="col-md-6">
                                    <span class="label_color"><p style="float: right"><b>Booking ID</b> : <?php if(isset($_SESSION['booking_id'])){echo $_SESSION['booking_id'];}?></p></span>
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
                                        if(isset($_SESSION['booking_id']))
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
                            <span class="label_color"><p><b>Advance Amount</b>(*Must Pay Now) : <?php if(isset($advace_amount)){echo $advace_amount;}?></p></span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        </div>
        
        <script type="text/javascript">
		$(document).ready(function(){
			$("#panel1-body").hide();
                        $("#panel2-body").hide();
                        $("#panel3-body").hide();
                        $("#panel4-body").hide();
                        $("#panel5-body").hide();
                        $("#panel6-body").hide();
		});
		$(document).ready(function(){
                    $("#panel1-head").click(function(){
                      $("#panel1-body").toggle();
                    });
                  });
                $(document).ready(function(){
                    $("#panel2-head").click(function(){
                      $("#panel2-body").toggle();
                    });
                  });
                $(document).ready(function(){
                    $("#panel3-head").click(function(){
                      $("#panel3-body").toggle();
                    });
                  });
                $(document).ready(function(){
                    $("#panel4-head").click(function(){
                      $("#panel4-body").toggle();
                    });
                  });
                $(document).ready(function(){
                    $("#panel5-head").click(function(){
                      $("#panel5-body").toggle();
                    });
                  });
                $(document).ready(function(){
                    $("#panel6-head").click(function(){
                      $("#panel6-body").toggle();
                    });
                  });  
	</script>
        <script>
	 	$(document).ready(function(){
		 	$.ajax({
				type: "POST",
				url: "get_city.php",
				data:'state_id='+document.getElementById('state').value,
				beforeSend: function() {
					$("#cityList").addClass("loader");
				},
				success: function(data){
					$("#cityList").html(data);
					$("#cityList").removeClass("loader");
				}
			});
                        var temp_city_id = document.getElementById('venue_city').value;
                        var temp_type_id = document.getElementById('venue_type').value;
		 	$.ajax({
				type : "POST",
				url : "get_venue_for_booking.php",
				data : {city_id:temp_city_id, type_id:temp_type_id},
				success: function(data){
					$("#response").html(data);
				}
			});
		});
		function getCity(){
			$.ajax({
				type: "POST",
				url: "get_city.php",
				data:'state_id='+document.getElementById('state').value,
				beforeSend: function() {
					$("#cityList").addClass("loader");
				},
				success: function(data){
					$("#cityList").html(data);
					$("#cityList").removeClass("loader");
				}
			});
		}
                function getVenues(){
                    var temp_city_id = document.getElementById('venue_city').value;
                    var temp_type_id = document.getElementById('venue_type').value;
			$.ajax({
				type : "POST",
				url : "get_venue_for_booking.php",
				data : {city_id:temp_city_id, type_id:temp_type_id},
				success: function(data){
					$("#response").html(data);
				}
			});
		}
                
                function validation(){
        var from_date=document.getElementById('from_date').value;
        var to_date=document.getElementById('to_date').value;

            //from date condition
            if(from_date=="")
            {
                document.getElementById("fromerror").innerHTML="this field is required";
                return false;
            }
            else{
                document.getElementById("fromerror").innerHTML="";
            }
            
            //to date condition
            if(to_date=="")
            {
                document.getElementById("toerror").innerHTML="this field is required";
                return false;
            }
            if(to_date<=from_date)
            {
                document.getElementById("toerror").innerHTML="To date Must be Bigger Then From Date";
                return false;
            }
            else{
                document.getElementById("toerror").innerHTML="";
            }
            
        }
        
        function fileValidation() { 
            var filePath = document.getElementById('file').value; 
          
            var allowedExtensions = /(\.csv)$/; 
              
            if (!allowedExtensions.exec(filePath)) { 
                document.getElementById("guest_file_error").innerHTML="Format Of File Is Not Sutable";
                return false; 
            }
            else
            {
                document.getElementById("guest_file_error").innerHTML="";
            }
        }
        
        
        function validation3(){
        var date=document.getElementById('customer_event_date').value;
        var from_time=document.getElementById('from_time').value;
        var to_time=document.getElementById('to_time').value;
       
            //date condition
            if(date=="")
            {
                document.getElementById("customer_event_date_error").innerHTML="this field is required";
                return false;
            }
            else{
                document.getElementById("customer_event_date_error").innerHTML="";
            }
            
            //from time condition
            if(from_time=="")
            {
                document.getElementById("from_time_error").innerHTML="this field is required";
                return false;
            }
            else{
                document.getElementById("from_time_error").innerHTML="";
            }
            
            //to time condition
            if(to_time=="")
            {
                document.getElementById("to_time_error").innerHTML="this field is required";
                return false;
            }
            if(to_time<=from_time)
            {
                document.getElementById("to_time_error").innerHTML="Your Ending Time Is Not Proper";
                return false;
            }
            else{
                document.getElementById("to_time_error").innerHTML="";
            }
        }
        
        function validation6(){
        var venue_id=document.getElementById('venue_id').value;
       
            //Venue codition
            if(venue_id)
            {
                document.getElementById("venue_error").innerHTML="Please, Select The Venue";
                return false;
            }
            else{
                document.getElementById("venue_error").innerHTML="";
            }
        }
	 </script>
         
    </body>
</html>
<?php
    include_once './footer.php';
?>
