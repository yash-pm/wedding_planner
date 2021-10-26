<?php
    session_start();
    $temp_user = $_SESSION['user_email'];
    
    include_once '../connection.php';
   
    $picture_query = "SELECT `picture_path` FROM `tbl_staff` WHERE `email` = '$temp_user'";
    $picture_result = mysqli_query($conn, $picture_query);
    
    while($picture_row = mysqli_fetch_assoc($picture_result))
    {
        $picture_path = $picture_row['picture_path'];
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/personal_style.css" rel="stylesheet" type="text/css"/>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="sidenav">
            <center><h3 style="color: white">Dream Wedding</h3></center>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="dropdown col-md-12">
                        <button class="btn dropdown-toggle col-md-12" type="button" data-toggle="dropdown"><img src="<?php echo '../Admin/'.$picture_path;?>" alt="" height="30" width="30" class="img-circle"/>&nbsp;<?php echo $_SESSION['user_email'];?>&nbsp;&nbsp;
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="edit_staff_profile.php"><span class="glyphicon glyphicon-edit"></span>&nbsp; Edit Profile</a></li>
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
                      <li class="active"><a href="staff_home.php">DashBoard</a></li>
                      
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Booking Details <span style="float: right"class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu col-md-12">
                            <li><a href="customer_bookings.php">Show Bookings</a></li>
                        </ul>
                      </li>
                      
                      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Guest Check-In <span style="float: right"class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu col-md-12">
                            <li><a href="get_guest_list_1.php">Guest List</a></li>
                        </ul>
                      </li>
                  </ul>
                </div>
            </nav>
          </div>
    </body>
</html>
