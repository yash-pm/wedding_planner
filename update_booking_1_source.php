<?php
    include_once './connection.php';
    
    if(isset($_POST['booking_id']))
    {
        $booking_id = $_POST['booking_id'];
    }
    if(isset($_POST['from_date']))
    {
        $from_date = $_POST['from_date'];
    }
    if(isset($_POST['to_date']))
    {
        $to_date = $_POST['to_date'];
    }
    
    $date_update_query = "UPDATE `tbl_customer_booking` SET `from_date`= '$from_date',`to_date`= '$to_date' WHERE `booking_id` = '$booking_id'";
    $date_update_result = mysqli_query($conn, $date_update_query);
    if($date_update_result)
    {
        echo "<script>alert('Dates Changed')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
    else 
    {
        echo "<script>alert('Dates Not Changed')</script>";
        echo "<script>window.location.href='update_booking_1.php'</script>";
    }
?>
