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
            <div class="panel" id="panel">
                <div class="panel-heading panel-style" id="panel-head">Guest Of Events</div>
                <div class="panel-body" id="panel-body" style="background-color: #ffe6eb">
                    <form action="add_customer_event_guest_source.php" method="post">
                        <input type="hidden" name="customer_event_id" value="<?php echo $customer_event_id;?>">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>E-Mail</th>
                                </tr>
                                </thead>
                                <tbody>
                            <tr>
                                <?php
                               
                                if(isset($customer_event_id))
                                {
                                    $customer_guest_query = "SELECT * FROM `tbl_guest` WHERE `booking_id` = '$booking_id'";
                                    $customer_guest_result = mysqli_query($conn, $customer_guest_query);
                                    while($customer_guest_row = mysqli_fetch_assoc($customer_guest_result))
                                    {
                                        $guest_id = $customer_guest_row['guest_id'];
                                        
                                        $guest_query = "SELECT COUNT(1) FROM `tbl_event_guest` WHERE `event_id` = '$customer_event_id' AND `guest_id` = '$guest_id'";
                                        $guest_result = mysqli_query($conn, $guest_query);
                                        $guest_row = mysqli_fetch_row($guest_result);

                                        if(!$guest_row[0] >= 1)
                                        {
                                            $guest_query = "SELECT * FROM `tbl_guest` WHERE `guest_id` = '$guest_id'";
                                            $guest_result = mysqli_query($conn, $guest_query);

                                            while($guest_row = mysqli_fetch_assoc($guest_result))
                                            {
                                               echo "<td><center><input type='checkbox' name='guest_list[]' value=".$guest_row['guest_id']."/></center></td>" ; 
                                               echo"<td>".$guest_row['name']."</td>";
                                               echo"<td>".$guest_row['address']."</td>";
                                               echo"<td>".$guest_row['contact_no']."</td>";
                                               echo"<td>".$guest_row['email']."</td>";
                                               echo "</tr>";
                                            }
                                        }
                                    }
                                }
                                ?>
                                </tbody>
                               </table>
                    <center><input type="submit" name="add_team" id="add_team" class="btn btn-success" value="Add Guest"/></center>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    include_once './footer.php';
?>
