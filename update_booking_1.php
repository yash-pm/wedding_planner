<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
            include_once './header.php';
            include_once './connection.php';
            
            if(isset($_REQUEST['bid']))
            {
                $temp_booking_id = $_REQUEST['bid'];
            }
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
        <style>
            .panel-style{
                background-color: #ff0033;
                color: white;
            }
        </style>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <br><br>
        <div class="container">
            <div class="panel" id="panel1">
                <div class="panel-heading panel-style" id="panel1-head">Change Dates</div>
                <div class="panel-body" id="panel1-body" style="background-color: #ffe6eb">
                    <form action="update_booking_1_source.php" method="post" onsubmit="return validation()">
                    <input type="hidden" name="booking_id" value="<?php echo $temp_booking_id;?>">
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
        </div>
        <script>
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
        </script>
    </body>
</html>
<?php
    include_once './footer.php';
?>
