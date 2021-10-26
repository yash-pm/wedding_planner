<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
            include_once './header.php';
            include_once './connection.php';
            
            if(isset($_REQUEST['ceid']))
            {
                $customer_event_id = $_REQUEST['ceid'];
            }
            
            if(isset($_REQUEST['bid']))
            {
                $booking_id = $_REQUEST['bid'];
            }
            
            $event_details_query = "SELECT * FROM `tbl_customer_events` WHERE `customer_event_id` = '$customer_event_id'";
            $event_details_result = mysqli_query($conn, $event_details_query);
            while($event_details_row = mysqli_fetch_assoc($event_details_result))
            {
                $event_id = $event_details_row['event_id'];
                $date = $event_details_row['date'];
                $from_time = $event_details_row['from_time'];
                $to_time = $event_details_row['to_time'];
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
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <br>
        <div class="container">
            <div class="panel" id="panel">
            <div class="panel-heading panel-style" id="panel-head">Change Event Details</div>
            <div class="panel-body" id="panel-body" style="background-color: #ffe6eb">
                <div class="form-group">
                    <form action="update_booking_3_source.php" method="post" onsubmit="return validation3()">
                        <input type="hidden" name="customer_event_id" value="<?php echo $customer_event_id;?>">
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
                                        if($eid == $event_id)
                                        {
                                            echo "<option value=".$eid." selected>".$event_name."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value=".$eid.">".$event_name."</option>";
                                        }
                                        
                                    }
                                    
                                ?>
                            </select>
                            <br><br><br>
                            
                            <?php
                                    
                                    $get_query = "SELECT * FROM `tbl_customer_booking` WHERE `booking_id` = '$booking_id'";
                                    $get_result = mysqli_query($conn, $get_query);
                                    while($get_row = mysqli_fetch_assoc($get_result))
                                    {
                                        $from_date = $get_row['from_date'];
                                        $to_date = $get_row['to_date'];
                                    }
                            ?>
                            <label for="date" class="label_color">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" min="<?php echo $from_date;?>" max="<?php echo $to_date;?>"/>
                            <span id="customer_event_date_error" class="text-danger"></span>
                            <br>
                            
                        </div>
                        
                        
                        <div class="row">
                            <div class="container">
                            <div class="col-md-6">
                                <label for="from_time" class="label_color">From Time:</label>
                                <input type="time" class="form-control" id="fromtime" name="from_time" value="<?php echo $from_time;?>"/>
                                <span id="fromtime_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="to_time" class="label_color">To Time:</label>
                                <input type="time" class="form-control" id="totime" name="to_time" value="<?php echo $to_time;?>"/>
                                <span id="totime_error" class="text-danger"></span>
                            </div>
                            </div>
                        </div>
                        <br>
                        <center><input type="submit" name="submit" value="Change" class="btn btn-success"/></center>
                    </form>  
                </div>  
                </div>
            </div>
        </div>
        </div>
        <script>
            function validation3(){
                var date=document.getElementById('date').value;
                var from_time=document.getElementById('fromtime').value;
                var to_time=document.getElementById('totime').value;

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
                        document.getElementById("fromtime_error").innerHTML="this field is required";
                        return false;
                    }
                    else{
                        document.getElementById("fromtime_error").innerHTML="";
                    }

                    //to time condition
                    if(to_time=="")
                    {
                        document.getElementById("totime_error").innerHTML="this field is required";
                        return false;
                    }
                    if(to_time<=from_time)
                    {
                        document.getElementById("totime_error").innerHTML="Your Ending Time Is Not Proper";
                        return false;
                    }
                    else{
                        document.getElementById("totime_error").innerHTML="";
                    }
                }
        </script>
    </body>
</html>
<?php
    include_once './footer.php';
?>

