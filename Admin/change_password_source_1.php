<?php
    include_once '../connection.php';
    
    if (isset($_POST['user_email']))
    {
        $temp_user=$_POST['user_email'];
    }
    if(isset($_POST['new_password']))
    {
        $temp_new_password=$_POST['new_password'];
    }
    if(isset($_POST['re_new_password']))
    {
        $temp_re_new_password=$_POST['re_new_password'];
    }
    
    $password_update_query = "UPDATE `tbl_user_details` SET `password`= '$temp_new_password' WHERE `email` = '$temp_user'";
    $password_update_result = mysqli_query($conn,$password_update_query);
    
    if($password_update_result)
    {
        echo "<script>alert('Password Changed Successfully')</script>";
        echo "<script>window.location.href='../surfuer_home.php'</script>";
    }
    else
    {
        echo "<script>alert('Password Not Changed Successfully')</script>";
        echo "<script>window.location.href='change_password_1.php'</script>";
    }
    ?>
