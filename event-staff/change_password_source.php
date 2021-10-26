<?php
    include_once '../connection.php';
    
        if (isset($_POST['user_email']))
        {
            $temp_user=$_POST['user_email'];
        }
        if(isset($_POST['old_password']))
        {
            $temp_password=$_POST['old_password'];
        }
        
        $query="SELECT * FROM `tbl_user_details` WHERE `email` = '$temp_user' AND `password` = '$temp_password'";
        $result=@mysqli_query($conn, $query);
        $data=$result->fetch_all();
        if($data)
        {
            echo "<script>window.location.href='change_password_1.php'</script>";
        }
        else
        {
            echo "<script>alert('Sorry But You Are Not Authenticated User')</script>";
            echo "<script>window.location.href='change_password.php'</script>";
        }
?>
