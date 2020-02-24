<?php
        define('db_server','localhost');
        define('db_user','root');
        define('db_password','');
        define('db_name','demo');
        $conn=@mysqli_connect(db_server,db_user,db_password,db_name) or exit('could not connect to mysqli' . mysqli_connect_errno());
        
        if (isset($_POST['new_user_password']))
        {
            $temp_pass=$_POST['new_user_password'];
        }
        if(isset($_POST['re_new_user_password']))
        {
            $temp_re_pass=$_POST['re_new_user_password'];
        }
        
        
        session_start();
        $user_email=$_SESSION['user_email'];
        $query="UPDATE `registration` SET `password`='$temp_pass' WHERE `email`='$user_email'";
        $result=@mysqli_query($conn, $query);
        if($result)
        {
            ?>
                <script>alert('Password Changed')</script>
            <?php
            header("Location:login.php");
        }
         else {
            ?>
                <script>alert('Password Not Changed')</script>
            <?php
            
        }
        ?>