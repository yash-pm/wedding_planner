<?php
        define('db_server','localhost');
        define('db_user','root');
        define('db_password','');
        define('db_name','demo');
        $conn=@mysqli_connect(db_server,db_user,db_password,db_name) or exit('could not connect to mysqli' . mysqli_connect_errno());
        
        if (isset($_POST['user_email']))
        {
            $temp_user=$_POST['user_email'];
        }
        if(isset($_POST['user_password']))
        {
            $temp_password=$_POST['user_password'];
        }
        
        $query="SELECT * FROM `registration` WHERE `email`='".$temp_user."' AND `password`='".$temp_password."';";
        $result=@mysqli_query($conn, $query);
        $data=$result->fetch_all();
        if($data)
        {
            echo "User found";
            session_start();
            $_SESSION['user_email']=$temp_user;
            header("Location:userhome.php");
        }
         else {
            echo "user Not found".$conn->error;
            header("Location:login.php");
        }
        ?>