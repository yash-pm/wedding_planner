<?php
    include_once './connection.php';
    
    if(isset($_POST['booking_id']))
    {
        $booking_id = $_POST['booking_id'];
    }
    
    if(isset($_POST['venue_id']))
    {
        $venue_id = $_POST['venue_id'];
    }
    
    $venue_query =  "UPDATE `tbl_customer_booking` SET `venue_id`='$venue_id' WHERE `booking_id` = '$booking_id'";
    $venue_result = mysqli_query($conn, $venue_query);
    
    $data_query = "SELECT * FROM `tbl_customer_booking` WHERE `booking_id` = '$booking_id'";
    $data_result = mysqli_query($conn, $data_query);
                    
    while ($data_row = mysqli_fetch_assoc($data_result))
    {
        $from_date = $data_row['from_date'];
        $to_date = $data_row['to_date'];
        $temp_venue_id = $data_row['venue_id'];
                        
        $venue_details_query = "SELECT * FROM `tbl_venue` WHERE `venue_id` = '$temp_venue_id'";
        $venue_details_result = mysqli_query($conn, $venue_details_query);
        while ($venue_details_row = mysqli_fetch_assoc($venue_details_result))
        {
            $duration = $venue_details_row['duration'];
            $price = $venue_details_row['price'];
        }
    }
                    
    $date1=$from_date;
    $date2=$to_date;
    function dateDiff($date1, $date2) 
    {
        $date1_ts = strtotime($date1);
        $date2_ts = strtotime($date2);
        $diff = $date2_ts - $date1_ts;
        $final_diff = round($diff / 86400) + 1;
        return $final_diff;
    }
        $dateDiff= dateDiff($date1, $date2);
                    
        $one_day_price=1*$price/$duration;
        $venue_amount = $one_day_price*$dateDiff;
        $total_amount = $venue_amount + 50000;
        $advace_amount = $total_amount * 30 / 100;
                    
        $payment_query = "UPDATE `tbl_customer_booking` SET `advance_payment`= '$advace_amount' ,`total_amount`= '$total_amount' WHERE `booking_id` = '$booking_id'";
        $payment_result = mysqli_query($conn, $payment_query);
        if(!$payment_result)
        {
            echo "<script>alert('Amount Not Added')</script>";
        }
    
    if($venue_result && $payment_result)
    {
        echo "<script>alert('Venue Changed')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
    else
    {
        echo "<script>alert('Venue Not Changed')</script>";
        echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
    }
?>
