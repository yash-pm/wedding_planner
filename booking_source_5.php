<?php
    include_once './connection.php';
    
    session_start();
    $booking_id = $_SESSION['booking_id'];
    
    if(isset($_POST['venue_id']))
    {
        $venue_id = $_POST['venue_id'];
    }
    
    $venue_query =  "UPDATE `tbl_customer_booking` SET `venue_id`='$venue_id' WHERE `booking_id` = '$booking_id'";
    $venue_result = mysqli_query($conn, $venue_query);
    
    if($venue_result)
    {
        echo "<script>alert('Venue Selection Done Successfully')</script>";
        echo "<script>window.location.href='event_booking.php'</script>";
    }
    else
    {
        echo "<script>alert('Venue Selection Not Done Successfully')</script>";
        echo "<script>window.location.href='event_booking.php'</script>";
    }
?>
