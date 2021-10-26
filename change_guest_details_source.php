<?php
    include_once './connection.php';
    
    if(isset($_POST['guest_id']))
    {
        $guest_id = $_POST['guest_id'];
    }
    if(isset($_POST['guest_name']))
    {
        $guest_name = $_POST['guest_name']; 
    }
    if(isset($_POST['guest_address']))
    {
        $guest_address = $_POST['guest_address']; 
    }
    if(isset($_POST['city']))
    {
        $city_id = $_POST['city']; 
    }
    if(isset($_POST['contact_no']))
    {
        $contact_no = $_POST['contact_no']; 
    }
    if(isset($_POST['email']))
    {
        $email = $_POST['email']; 
    }
    
    $change_detail_query = "UPDATE `tbl_guest` SET `name`= '$guest_name',`address`='$guest_address',`city_id`= '$city_id',`contact_no`= '$contact_no',`email`= '$email' WHERE `guest_id` = '$guest_id'";
    $change_detail_result = mysqli_query($conn, $change_detail_query);
    if($change_detail_result)
    {
        echo "<script>alert('Details Changed Successfully')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
    else
    {
        echo "<script>alert('Details Not Changed Successfully')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
?>