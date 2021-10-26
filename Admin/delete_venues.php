<?php

    include_once '../connection.php';
    
    $temp_veune_id = $_REQUEST['id'];
    
    $delete_query = "UPDATE `tbl_venue` SET `status`= 'Not-Availiable' WHERE `venue_id` = '$temp_veune_id'";
    $delete_result = mysqli_query($conn, $delete_query);
    
    if($delete_result)
    {
        echo "<script>alert('Venue Deleted Successfully')</script>";
       echo "<script>window.location.href='show_venues.php'</script>";
    }
 else {
        echo "<script>alert('Venue Not Deleted Successfully')</script>";
        echo "<script>window.location.href='show_venues.php'</script>";
}
?>