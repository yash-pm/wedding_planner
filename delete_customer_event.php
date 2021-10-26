<?php
    include_once './connection.php';
    
    if(isset($_REQUEST['ceid']))
    {
        $customer_event_id = $_REQUEST['ceid'];
    }
    
    $delete_guest_query = "DELETE FROM `tbl_event_guest` WHERE `event_id` = '$customer_event_id'";
    $delete_guest_result = mysqli_query($conn, $delete_guest_query);
    
    $delete_team_query = "DELETE FROM `tbl_event_team` WHERE `customer_event_id` = '$customer_event_id'";
    $delete_team_result = mysqli_query($conn, $delete_team_query);
    
    $delete_event_query =  "DELETE FROM `tbl_customer_events` WHERE `customer_event_id` = '$customer_event_id'";
    $delete_event_result = mysqli_query($conn, $delete_event_query);
    
    
    if($delete_guest_result && $delete_team_result && $delete_event_result)
    {
        echo "<script>alert('Event Removed')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
    else
    {
        echo "<script>alert('Event Not Removed')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
?>
