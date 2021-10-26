<?php
    include_once './connection.php';
    
    session_start();
    $user_id = $_SESSION['user_id'];
    
    if(isset($_POST['uid']))
    {
        $uid = $_POST['uid'];
    }
    
    if(isset($_POST['from_date']))
    {
        $from_date = $_POST['from_date'];
    }
    
    if(isset($_POST['to_date']))
    {
        $to_date = $_POST['to_date'];
    }
    
    $booking_query = "INSERT INTO `tbl_customer_booking`(`booking_id`, `customer_id`, `from_date`, `to_date`, `venue_id`, `advance_payment`, `total_amount`, `status`) VALUES ('','$uid','$from_date','$to_date','16','0','0','pending')";
    $booking_result = mysqli_query($conn, $booking_query);
    
    if($booking_result)
    {
        echo "<script>alert('Details Stored')</script>";
        $booking_query = "SELECT `booking_id` FROM `tbl_customer_booking` WHERE `customer_id` = '$user_id' AND `status` = 'pending'";
        $booking_result = mysqli_query($conn, $booking_query);

        while ($booking_row = mysqli_fetch_assoc($booking_result))
        {
            $booking_id = $booking_row['booking_id'];
        }
        $_SESSION['booking_id'] = $booking_id;
        echo "<script>window.location.href='event_booking.php'</script>";
        
    }
    else
    {
        echo "<script>alert('Details Not Stored')</script>";
        echo "<script>window.location.href='event_booking.php'</script>";
    }
?>
