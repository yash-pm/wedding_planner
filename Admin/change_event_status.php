<?php
    include_once '../connection.php';
    
    if(isset($_POST['status_data']))
    {
        $status_data = $_POST['status_data'];
    }
    
    $data = explode(".", $status_data);
    
    $event_status = $data[0];
    $customer_event_id = $data[1];
    
    
    $update_query = "UPDATE `tbl_customer_events` SET `status`= '$event_status' WHERE `customer_event_id` = '$customer_event_id'";
    $update_result = mysqli_query($conn, $update_query);
    
    if($update_result)
    {
        echo "<script>alert('Status Updated')</script>";
        echo "<script>window.location.href='update_event_status_1.php'</script>";
    }
    else
    {
        echo "<script>alert('Status Not Updated')</script>";
        echo "<script>window.location.href='update_event_status_1.php'</script>";
    }
?>