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
        
        <title></title>
    </head>
    <body>
        <h1><center>Forget Password</center></h1>
        <div class="container">
            <hr>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <form action="forget_password_2_source.php" method="post">
                        <center><label for="otp">Enter OTP:</label></center>
                        <input type="text" id="otp" name="send_otp" class="form-control"><br>
                    &nbsp;
                    <center><input name="submit_otp" value="Submit OTP" type="submit" class="btn btn-success"/></center>
                    </form>
                </div>
            </div>
        <?php
        
        ?>
    </body>
</html>
