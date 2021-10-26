<?php
    include_once './connection.php';
    
    if(isset($_REQUEST['bid']))
    {
        $booking_id = $_REQUEST['bid'];
    }
    
    session_start();
    if(isset($_SESSION['user_id']))
    {
        $temp_user_id = $_SESSION['user_id'];
    }
    
    $booking_query = "SELECT * FROM `tbl_customer_booking` WHERE `customer_id` = '$temp_user_id' AND `booking_id` = '$booking_id'";
    $booking_result = mysqli_query($conn, $booking_query);
    while($booking_details_row = mysqli_fetch_assoc($booking_result))
    {
        $from_date = $booking_details_row['from_date'];
    }
    
    $current_date = date('Y-m-d');
    if($current_date < $from_date)
    {
        $booking_query = "UPDATE `tbl_customer_booking` SET `status`= 'cancelled' WHERE `booking_id` = '$booking_id'";
        $booking_result = mysqli_query($conn, $booking_query);

       if($booking_result)
       {
            echo "<script>alert('Your Bookings Cancelled Successfully')</script>";
            echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
       }
       else 
       {
           echo "<script>alert('Your Bookings Can't Cancelled Successfully')</script>";
           echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
       }
    }
    else
    {
        echo "<script>alert('Sorry! You cant Cancel Your Booking')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
?>
