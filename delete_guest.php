<?php
    include_once './connection.php';
    
    if(isset($_REQUEST['gid']))
    {
        $guest_id = $_REQUEST['gid'];
    }
    
    $delete_guest_query = "DELETE FROM `tbl_guest` WHERE `guest_id` = '$guest_id'";
    $delete_guest_result = mysqli_query($conn, $delete_guest_query);
    
    if($delete_guest_result)
    {
        echo "<script>alert('Guest Deleted Successfully')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
    else
    {
        echo "<script>alert('Guest Not Deleted Successfully')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
?>
