<?php
    include_once './connection.php';
    
    if(isset($_REQUEST['gid']))
    {
        $guest_id = $_REQUEST['gid'];
    }
    
    if(isset($_REQUEST['ceid']))
    {
        $customer_event_id = $_REQUEST['ceid'];
    }
    
    $delete_guest_query = "DELETE FROM `tbl_event_guest` WHERE `guest_id` = '$guest_id' AND `event_id` = '$customer_event_id'";
    $delete_guest_result = mysqli_query($conn, $delete_guest_query);
    
    if($delete_guest_result)
    {
        echo "<script>alert('Guest Deleted')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
    else
    {
        echo "<script>alert('Guest Not Deleted')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
?>