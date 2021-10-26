<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './admin_header.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Change Password</title>
    </head>
    <body>
        <br>
        <div class="container">
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <h1 style="color: #FF0033"><center>Change Password</center></h1>
                <hr>
                <div class="form-group">
                    <form action="change_password_source.php" method="post" onsubmit="return validation()">
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="email" name="user_email" value="<?php echo $_SESSION['user_email'];?>" class="form-control" readonly="readonly"><br>
                    &nbsp;
                    <label for="new_password">Old Password:</label><br>
                    <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Enter Your Old Password"/>
                    <span id="password_error" class="text-danger"></span>
                    &nbsp;
                    <center><input name="next" value="Next" type="submit" class="btn btn-success"/></center>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
        <script>
            function validation(){ 
        var password=document.getElementById('old_password').value;
       
            //password condition
            if(password=="")
            {
                document.getElementById("password_error").innerHTML="this field is required";
                return false;
            }
            if(password.length<6 || password.length>20)
            {
                document.getElementById("password_error").innerHTML="password length must be between 6 and 20";
                return false;
            }
            else{
                document.getElementById("password_error").innerHTML="";

            }
        }
        </script>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>
