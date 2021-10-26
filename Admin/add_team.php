<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Team</title>
    </head>
    <body>
        <?php
            include_once './admin_header.php';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <center><h1>Add Team</h1></center>
                    <hr>
                    <br>
                    <form action="#" method="post" onsubmit="return validation()">
                        <center><label for="team_name" class="label_color">Team Name:</label></center>
                        <input type="text" id="team_name" name="team_name" class="form-control">
                        <span id="team_error" class="text-danger"></span>
                        <br>                             
                                                                       
                        <center><input type="submit" name="add_team" value="Add" class="btn btn-success"/>
                        <input type="reset" name="reset" value="Reset" class="btn btn-danger"/></center>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function validation(){ 
        var team=document.getElementById('team_name').value;
       
            //event name condition
            if(team=="")
            {
                document.getElementById("team_error").innerHTML="this field is required";
                return false;
            }
            else{
                document.getElementById("team_error").innerHTML="";

            }
        }
        </script>
    </body>
</html>
<?php

    include_once '../connection.php';
    
    if(isset($_POST['add_team']))
    {
        $team_name = $_POST['team_name'];
        
        $team_query = "INSERT INTO `tbl_team`(`team_id`, `team_type`) VALUES ('','$team_name')";
        $team_result = mysqli_query($conn,$team_query);
        
        if($team_result)
        {
            echo "<script>alert('Team Added')</script>";
            echo "<script>window.location.href='admin_home.php'</script>";
        }
        else
        {
            echo "<script>alert('Team Not Added')</script>";
        }   
    }
    
    include_once './admin_footer.php';
?>
