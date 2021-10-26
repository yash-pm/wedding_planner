<?php
    include_once './connection.php';
    
    if(isset($_POST['customer_event_id']))
    {
        $customer_event_id = $_POST['customer_event_id']; 
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
    
    $update_event_query = "UPDATE `tbl_customer_events` SET `event_id`= '$event_id',`date`= '$date',`from_time`='$from_time',`to_time`='$to_time' WHERE `customer_event_id` = '$customer_event_id'";
    $update_event_result = mysqli_query($conn, $update_event_query);
    
    if($update_event_result)
    {
        echo "<script>alert('Events Details Changed')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
    else 
    {
        echo "<script>alert('Events Details Not Changed')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
?>