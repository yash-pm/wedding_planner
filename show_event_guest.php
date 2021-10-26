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
                    <a href="add_customer_event_guest.php?ceid=<?php echo $customer_event_id;?>&bid=<?php echo $booking_id;?>"><button class="btn btn-success">Add Guest</button></a><br><br>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
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
                                    $customer_guest_query = "SELECT `guest_id` FROM `tbl_event_guest` WHERE `event_id` = '$customer_event_id'";
                                    $customer_guest_result = mysqli_query($conn, $customer_guest_query);
                                    while($customer_guest_row = mysqli_fetch_assoc($customer_guest_result))
                                    {
                                        $guest_id = $customer_guest_row['guest_id'];
                                        
                                        $guest_query = "SELECT * FROM `tbl_guest` WHERE `guest_id` = '$guest_id'";
                                        $guest_result = mysqli_query($conn, $guest_query);

                                        while($guest_row = mysqli_fetch_assoc($guest_result))
                                        {
                                           echo"<td>".$guest_row['name']."</td>";
                                           echo"<td>".$guest_row['address']."</td>";
                                           echo"<td>".$guest_row['contact_no']."</td>";
                                           echo"<td>".$guest_row['email']."</td>";
                                           echo "<td><center><a href='delete_customer_event_guest.php?gid=".$guest_id."&ceid=".$customer_event_id."'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a></center></td>";
                                        }
                                        
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                               </table>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    include_once './footer.php';
?>