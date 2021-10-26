<?php
    include_once './connection.php';
    
    if(isset($_POST['booking_id']))
    {
        $booking_id = $_POST['booking_id']; 
    }
    
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
    
    $add_event_query = "INSERT INTO `tbl_customer_events`(`customer_event_id`, `event_id`, `booking_id`, `date`, `from_time`, `to_time`, `status`) VALUES ('','$event_id','$booking_id','$date','$from_time','$to_time','Pending')";
    $add_event_result = mysqli_query($conn, $add_event_query);
    
    if($add_event_result)
    {
        echo "<script>alert('Event Added')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
    else
    {
        echo "<script>alert('Event Not Added')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
?>