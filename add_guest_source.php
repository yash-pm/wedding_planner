<?php
    include_once './connection.php';
    
    if(isset($_POST['booking_id']))
    {
        $booking_id = $_POST['booking_id']; 
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
    
    $add_guest_query = "INSERT INTO `tbl_guest`(`guest_id`, `booking_id`, `name`, `address`, `city_id`, `contact_no`, `email`, `status`) VALUES ('','$booking_id','$guest_name','$guest_address','$city_id','$contact_no','$email','Not-arrived')";
    $add_query_result = mysqli_query($conn, $add_guest_query);
    
    if($add_query_result)
    {
        echo "<script>alert('Guest Added')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
    else
    {
        echo "<script>alert('Guest Not Added')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
?>
