<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './staff_header.php';
    include_once '../connection.php';
    
    if(isset($_SESSION['user_id']))
    {
        $staff_id = $_SESSION['user_id'];
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
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <table class="table table-condensed table-hover">
             <thead>
             <tr>
             <th>Team</th>
             <th>Event</th>
             <th>Date</th>
             <th>Time</th>
             <th>Place</th>
             <th>Address</th>
             </tr>
             </thead>
             <tbody>
             <tr>
             <?php
             $get_query = "SELECT * FROM `tbl_event_team` WHERE `staff_id` = '$staff_id'";
             $get_result = mysqli_query($conn,$get_query);

             while($get_row = mysqli_fetch_assoc($get_result))
             {
                 $team_id = $get_row['team_id'];
                 $customer_event_id = $get_row['customer_event_id'];
                 echo "<td>".$team_id = $get_row['team_id']."</td>";
                 echo "<td>".$customer_event_id."</td>";
                echo "</tr>";
             }
             
             ?>
             </tbody>
            </table>
            </div>
        </div>
    </body>
</html>
