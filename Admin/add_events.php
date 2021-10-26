<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Event</title>
    </head>
    <body>
        <?php
            include_once './admin_header.php';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <center><h1>Add Event</h1></center>
                    <hr>
                    <br>
                    <form action="#" method="post" onsubmit="return validation()">
                        <center><label for="event_name" class="label_color">Event Name:</label></center>
                        <input type="text" id="event_name" name="event_name" class="form-control" >
                        <span id="name_error" class="text-danger"></span>
                        <br>                             
                                                                       
                        <center><input type="submit" name="add_venue" value="Add" class="btn btn-success"/>
                        <input type="reset" name="reset" value="Reset" class="btn btn-danger"/></center>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function validation(){ 
        var event_name=document.getElementById('event_name').value;
       
            //event name condition
            if(event_name=="")
            {
                document.getElementById("name_error").innerHTML="this field is required";
                return false;
            }
            else{
                document.getElementById("name_error").innerHTML="";

            }
        }
        </script>
    </body>
</html>
<?php

    include_once '../connection.php';
    
    if(isset($_POST['add_venue']))
    {
        $event_name = $_POST['event_name'];
        
        $event_query = "INSERT INTO `tbl_events`(`event_id`, `event_name`) VALUES ('','$event_name')";
        $event_result = mysqli_query($conn,$event_query);
        
        if($event_result)
        {
            echo "<script>alert('Event Added')</script>";
            echo "<script>window.location.href='admin_home.php'</script>";
        }
        else
        {
            echo "<script>alert('Event Not Added')</script>";
        }
        
    }
    
    include_once './admin_footer.php';
?>
