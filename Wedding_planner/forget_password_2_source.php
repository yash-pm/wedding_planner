<?php
        define('db_server','localhost');
        define('db_user','root');
        define('db_password','');
        define('db_name','demo');
        $conn=@mysqli_connect(db_server,db_user,db_password,db_name) or exit('could not connect to mysqli' . mysqli_connect_errno());
        
        if (isset($_POST['send_otp']))
        {
            $temp_otp=$_POST['send_otp'];
        }
        
        session_start();
        $check_otp=$_SESSION['temp_otp'];
        if($temp_otp==$temp_otp)
        {
            header("Location:forget_password_3.php");
        }
        else
        {
            header("Location:forget_password_2.php");
        }