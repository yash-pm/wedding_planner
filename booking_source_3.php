<?php
    include_once './connection.php';
    
    session_start();
    $booking_id = $_SESSION['booking_id'];
    
    if(isset($_POST['event']))
    {
        $event_id = $_POST['event']; 
    }
    
    if(isset($_POST['date']))
    {
        $date = $_POST['date']; 
    }
    
    if(isset($_POST['from_time']))
    {
        $from_time = $_POST['from_time']; 
    }
    
    if(isset($_POST['to_time']))
    {
        $to_time = $_POST['to_time']; 
    }
    
    $event_query = "INSERT INTO `tbl_customer_events`(`customer_event_id`, `event_id`, `booking_id`, `date`, `from_time`, `to_time`, `status`) VALUES ('','$event_id','$booking_id','$date','$from_time','$to_time','pending')";
    $event_result = mysqli_query($conn, $event_query);
    if($event_result)
    {
        echo "<script>alert('Event Added')</script>";
        echo "<script>window.location.href='event_booking.php'</script>";
    }
    else
    {
        echo "<script>alert('Event Not Added')</script>";
        echo "<script>window.location.href='event_booking.php'</script>";
    }
?>