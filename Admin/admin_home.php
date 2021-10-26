<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './admin_header.php';
    $uid = $_SESSION['user_id'];
    
    include_once '../connection.php';
    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Home</title>
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
            
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php
                            $wedding_query = "SELECT * FROM `tbl_customer_booking`";
                            $wedding_result = mysqli_query($conn, $wedding_query);

                            $wedding_total_row = mysqli_num_rows($wedding_result);
                        ?>
                        <div style="background-color: #dc3545 !important; border-radius: 0.25rem;box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);display: block;margin-bottom: 20px;position: relative;"> 
                            <div class="" style="padding: 10px; color: white">
                                <h3><?php echo $wedding_total_row;?> +</h3>
                                <p>Total Bookings</p>
                          </div>
                            <a href="#" class="small-box-footer" style="background: rgba(0, 0, 0, 0.1);color: rgba(255, 255, 255, 0.8);display: block;padding: 3px 0;position: relative;text-align: center;text-decoration: none;z-index: 10;">More info <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                        </div>
                    </div>
            
                    <div class="col-md-3">
                        <?php
                            $staff_query = "SELECT * FROM `tbl_staff`";
                            $staff_result = mysqli_query($conn, $staff_query);

                            $staff_total_row = mysqli_num_rows($staff_result);
                        ?>
                        <div style="background-color: #007bff !important; border-radius: 0.25rem;box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);display: block;margin-bottom: 20px;position: relative;">
                            <div style="padding: 10px; color: white">
                                <h3><?php echo $staff_total_row;?> +</h3>
                                <p>Total Staff</p>
                            </div>
                            <a href="show_staff.php" class="small-box-footer" style="background: rgba(0, 0, 0, 0.1);color: rgba(255, 255, 255, 0.8);display: block;padding: 3px 0;position: relative;text-align: center;text-decoration: none;z-index: 10;">More info <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                         <?php
                            $venue_query = "SELECT * FROM `tbl_venue`";
                            $venue_result = mysqli_query($conn, $venue_query);

                            $venue_total_row = mysqli_num_rows($venue_result);
                        ?>
                        <div style="background-color: #ffc107 !important; border-radius: 0.25rem;box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);display: block;margin-bottom: 20px;position: relative;">
                            <div style="padding: 10px; color: white">
                                <h3><?php echo $venue_total_row;?> +</h3>
                                <p>Venues</p>
                            </div>
                            <a href="show_venues.php" class="small-box-footer" style="background: rgba(0, 0, 0, 0.1);color: rgba(255, 255, 255, 0.8);display: block;padding: 3px 0;position: relative;text-align: center;text-decoration: none;z-index: 10;">More info <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <?php
                            $wedding_query1 = "SELECT * FROM `tbl_customer_booking` WHERE `status` = 'Complited'";
                            $wedding_result1 = mysqli_query($conn, $wedding_query1);

                            $wedding_total_row1 = mysqli_num_rows($wedding_result1);
                        ?>
                        <div style="background-color: #28a745 !important; border-radius: 0.25rem;box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);display: block;margin-bottom: 20px;position: relative;">
                            <div style="padding: 10px;color: white">
                                <h3><?php echo $wedding_total_row1;?> +</h3>
                                <p>Completed Wedding</p>
                            </div>
                            <a href="#" class="small-box-footer" style="background: rgba(0, 0, 0, 0.1);color: rgba(255, 255, 255, 0.8);display: block;padding: 3px 0;position: relative;text-align: center;text-decoration: none;z-index: 10;">More info <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                        </div>
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                <th>Event Id</th>
                                <th>Events Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                        include_once '../connection.php';
                                        
                                        $event_query = "SELECT * FROM `tbl_events`";
                                        $event_result = mysqli_query($conn, $event_query);
                                        
                                        while ($event_row = mysqli_fetch_assoc($event_result))
                                        {
                                            echo "<td>".$event_row['event_id']."</td>";
                                            echo "<td>".$event_row['event_name']."</td></tr>";
                                        }
                                    ?>
                                    
                            </tbody>
                        </table> 
                        <a class="btn btn-success" href="add_events.php">Add Event</a>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-condensed table-hover">
                        <thead>
                        <tr>
                        <th>Team ID</th>
                        <th>Team Type</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                     
                                        $team_query = "SELECT * FROM `tbl_team`";
                                        $team_result = mysqli_query($conn, $team_query);
                                        
                                        while ($team_row = mysqli_fetch_assoc($team_result))
                                        {
                                            echo "<td>".$team_row['team_id']."</td>";
                                            echo "<td>".$team_row['team_type']."</td></tr>";
                                        }
                                    ?>
                            
                        </tbody>
                        </table>
                        <a class="btn btn-success" href="add_team.php">Add Team</a>
                    </div>
                </div>
            </div>
        </div>
            </div>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>
