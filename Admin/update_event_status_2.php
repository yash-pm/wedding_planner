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
        <meta http-equiv="refresh" content="7">
        <title></title>
    </head>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
            
            $event_query = "SELECT * FROM `tbl_customer_events` WHERE `booking_id` = '$booking_id'";
            $event_result = mysqli_query($conn,$event_query);
            while ($event_row = mysqli_fetch_assoc($event_result))
            {
                $event_status[] = $event_row['status'];
                
                $customer_event_id = $event_row['customer_event_id'];
                $event_date=date_create($event_row['date']);
                $event_id = $event_row['event_id'];
                
                $get_query = "SELECT * FROM `tbl_events` WHERE `event_id` = '$event_id'";
                $get_result = mysqli_query($conn, $get_query);
                while ($get_row = mysqli_fetch_assoc($get_result))
                {
                    echo "<td>".$get_row['event_name']."</td>";
                }

                echo "<td>".date_format($event_date,"d / m / Y")."</td>";
                echo "<td>".date('h:i A', strtotime($event_row['from_time']))." - ".date('h:i A', strtotime($event_row['to_time']))."</td>";  
                
                ?>
                 <td><select id="event_status<?php echo $customer_event_id;?>" name="event_status<?php echo $customer_event_id;?>" style='border-color:#ccc' class='btn' onchange="updateStatus(this.id)">
                        <option value="Pending.<?php echo $customer_event_id;?>">Pending</option>
                        <option value="Running.<?php echo $customer_event_id;?>">Running</option>
                        <option value="Complited.<?php echo $customer_event_id;?>">Complited</option>
                   </select></td>
               <?php     
                echo "</tr>";
            }
            
            
            foreach($event_status as $status)
            {
                if($status == "Complited")
                {
                    $value = 1;
                }
                if($status == "Pending")
                {
                    $value = 0;
                }
            }
            
            if($value == 1)
            {
                $update_query = "UPDATE `tbl_customer_booking` SET `status`= 'Complited' WHERE `booking_id` = '$booking_id'";
                $update_result = mysqli_query($conn, $update_query);
            }
            if($value == 0)
            {
                $update_query = "UPDATE `tbl_customer_booking` SET `status`= 'Pending' WHERE `booking_id` = '$booking_id'";
                $update_result = mysqli_query($conn, $update_query);
            }
        ?>
        </tbody>
        </table>
        </div>
        </div>
        <script>
            function updateStatus(clicked){
		$.ajax({
				type: "POST",
				url: "change_event_status.php",
				data:'status_data='+$('#'+clicked).val(),
				success: function(data){
					$("res").html(data);
				}
			});
		}
        </script>
    </body>
</html>
<?php
        include_once './admin_footer.php';
?>
