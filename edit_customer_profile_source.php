<?php
    include_once './connection.php';

    session_start();
    $uid = $_SESSION['user_id'];
    
    if(isset($_POST['user_name']))
    {
        $name = $_POST['user_name'];
    }
    if(isset($_POST['user_contact_no']))
    {
        $contact_no = $_POST['user_contact_no'];
    }
    if(isset($_POST['user_email']))
    {
        $email = $_POST['user_email'];
    }
    if(isset($_POST['user_address']))
    {
        $address = $_POST['user_address'];
    }
    if(isset($_POST['city']))
    {
        $city_id = $_POST['city'];
    }
    $update_query = "UPDATE `customer_registration` SET `name`='$name',`contact_no`='$contact_no',`email`='$email',`address`='$address',`city_id`='$city_id' WHERE `user_id` = '$uid'";
    $update_user_query = "UPDATE `tbl_user_details` SET `email`= '$email' WHERE `user_id`= '$uid'";
    
    $update_result = mysqli_query($conn, $update_query);
    $update_user_result = mysqli_query($conn, $update_user_query);
    
    if($update_result && $update_user_result)
    {
        echo "<script>alert('Profile Updated Successfully')</script>";
        echo "<script>window.location.href='surfuer_home.php'</script>";
    }
    else
    {
        echo "<script>alert('Profile Not Updated Successfully')</script>";
    }
?>