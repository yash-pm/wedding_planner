<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './surfure_header.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        
        <title>Forget Password</title>
    </head>
    <body>
        <h1><center>Login</center></h1>
        <div class="container">
            <hr>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <form action="forget_password_1_source.php" method="post">
                        <center><label for="email">E-mail:</label></center>
                        <input type="email" id="email" name="user_email" class="form-control"><br>
                    &nbsp;
                    <center><input name="send_otp" value="Send OTP" type="submit" class="btn btn-success"/></center>
                    </form>
                </div>
            </div>
       
    </body>
</html>
