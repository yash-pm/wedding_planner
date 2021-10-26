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
        <title></title>
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
                    <form action="change_password_source_1.php" method="post" onsubmit="return validation()">
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="email" name="user_email" value="<?php echo $_SESSION['user_email'];?>" class="form-control" readonly="readonly"><br>
                    &nbsp;
                    <label for="new_password">New Password:</label><br>
                    <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Enter Your New Password"/>
                    <span id="password_error" class="text-danger"></span>
                    <br>
                    &nbsp;
                    <label for="re_new_password">Re-New Password:</label><br>
                    <input type="password" id="re_new_password" name="re_new_password" class="form-control" placeholder="Re-Enter Your New Password"/>
                    <span id="repassword_error" class="text-danger"></span>
                    &nbsp;
                    <center><input name="next" value="Done" type="submit" class="btn btn-success"/></center>
                    </form>
                </div>
            </div>
        </div>
            </div>
        </div>
        <script>
            function validation(){
        var pass=document.getElementById('new_password').value;
        var cpass=document.getElementById('re_new_password').value;
        
        //password condition
            if(pass=="")
            {
                document.getElementById("password_error").innerHTML="this field is required";
                return false;
            }
            if(pass.length<6 || pass.length>20)
            {
                document.getElementById("password_error").innerHTML="password length must be between 6 and 20";
                return false;
            }
            else{
                document.getElementById("password_error").innerHTML="";

            }

            //confirm password condition
            if(cpass=="")
            {
                document.getElementById("repassword_error").innerHTML="this field is required";
                return false;
            }
            if(pass!=cpass)
            {
                document.getElementById("repassword_error").innerHTML="Both password not matched";
                return false;
            }
            else{
                document.getElementById("repassword_error").innerHTML="";
            }
    }
        </script>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>

