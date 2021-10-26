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
                    <form action="forget_password_3_source.php" method="post">
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="email" name="user_email" value="<?php session_start(); echo $_SESSION['temp_user_email']?>" class="form-control" readonly="readonly"><br>
                    &nbsp;
                    <label for="new_password">New Password:</label><br>
                    <input type="password" id="new_password" name="new_user_password" class="form-control"><br>
                    &nbsp;
                    <label for="re_new_password">Re-New Password:</label><br>
                    <input type="password" id="re_new_password" name="re_new_user_password" class="form-control"><br>
                    &nbsp;
                    <input name="change_password" value="Change" type="submit" class="btn btn-success"/>
                    </form>
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
