<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/personal_style.css" rel="stylesheet" type="text/css"/>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
        <script src="../js/npm.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="sidenav">
            <center><h3 style="color: white">Dream Wedding</h3></center>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="dropdown col-md-12">
                        <button class="btn dropdown-toggle col-md-12" type="button" data-toggle="dropdown"><img src="../images/user_pic_admin.png" alt="" height="30" width="30" class="img-circle"/>&nbsp;<?php echo $_SESSION['user_email'];?>&nbsp;&nbsp;
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="change_password.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Change Password</a></li>
                          <li><a href="../logout.php"><span class="glyphicon glyphicon-off"></span>&nbsp; Logout</a></li>
                        </ul>
                  </div>
                </div>
            </div>
            <br>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <ul class="nav nav-pills nav-stacked">
                      <li class="active"><a href="admin_home.php">DashBoard</a></li>
                      
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Venue <span style="float: right"class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu col-md-12">
                          <li><a href="add_venue.php">Add Venue</a></li>
                          <li><a href="show_venues.php">Show Venues</a></li>
                        </ul>
                      </li>
                      
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Staff <span style="float: right"class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu col-md-12">
                            <li><a href="add_staff.php">Add Staff</a></li>
                            <li><a href="show_staff.php">Show Staff</a></li>
                        </ul>
                      </li>
                      
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Bookings<span style="float: right"class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu col-md-12">
                            <li><a href="customer_bookings.php">Show Bookings</a></li>
                        </ul>
                      </li>
                      
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Event - Team & Status<span style="float: right"class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu col-md-12">
                            <li><a href="create_event_team_1.php">Create Team</a></li>
                            <li><a href="team_details_1.php">Show Teams</a></li>
                            <li><a href="update_event_status_1.php">Update Status</a></li>
                        </ul>
                      </li>
                      
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Online Invitation<span style="float: right"class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu col-md-12">
                            <li><a href="online_invitation_1.php">Send Invitation</a></li>
                        </ul>
                      </li>
                  </ul>
                </div>
            </nav>
          </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
