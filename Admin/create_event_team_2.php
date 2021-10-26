<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './admin_header.php';
    include_once '../connection.php';  
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
        <center><h1 style="color: #FF0033">Events</h1></center>
        <br>
        <div class="container-fluid">
            <hr>
        <table class="table table-condensed table-hover">
        <thead>
            <th>Events</th>
            <th>Date</th>
            <th>Time</th>
        </thead>
        <tbody>
        <tr>
        <?php
        
            if(isset($_REQUEST['bid']))
            {
                $booking_id = $_REQUEST['bid'];
            }
            
            $event_query = "SELECT tbl_customer_events.customer_event_id,tbl_events.event_name,tbl_customer_events.date,tbl_customer_events.from_time,tbl_customer_events.to_time FROM tbl_customer_events INNER JOIN tbl_events ON tbl_customer_events.event_id=tbl_events.event_id WHERE tbl_customer_events.booking_id='$booking_id'";
            $event_result = mysqli_query($conn,$event_query);
            while ($event_row = mysqli_fetch_assoc($event_result))
            {
                $customer_event_id = $event_row['customer_event_id'];
                
                $customer_event_query = "SELECT COUNT(1) FROM `tbl_event_team` WHERE `customer_event_id` = '$customer_event_id'";
                $customer_event_result = mysqli_query($conn, $customer_event_query);
                $customer_event_row = mysqli_fetch_row($customer_event_result);
                
                $event_date = date_create($event_row['date']);

                echo "<td>".$event_row['event_name']."</td>";
                echo "<td>".date_format($event_date,"d / m / Y")."</td>";
                echo "<td>".date('h:i A', strtotime($event_row['from_time']))." - ".date('h:i A', strtotime($event_row['to_time']))."</td>";  
                echo "<td><center><a href='create_event_team_3.php?eid=".$customer_event_id."'><button class='btn btn-success'>Create</button></a></center></td>";
                
                /*if($customer_event_row[0] >= 1)
                {
                    echo "<td><center><a href='create_event_team_3.php?eid=".$customer_event_id."'><button class='btn btn-danger' disabled>Created</button></a></center></td>";   
                }
                else
                {
                    echo "<td><center><a href='create_event_team_3.php?eid=".$customer_event_id."'><button class='btn btn-success'>Create</button></a></center></td>";
                }*/
                echo "</tr>";
            }
        ?>
        </tbody>
        </table>
        </div>
        </div>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>
