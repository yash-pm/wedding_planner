<?php
    include_once '../connection.php';
    
    if(isset($_POST['staff_id']))
    {
        $staff_id = $_POST['staff_id'];
    }
    //echo "<script>alert($staff_id)</script>";
    //echo "<h1>".$staff_id."</h1>";
    
    $staff_details_query = "SELECT * FROM `tbl_staff` WHERE `staff_id` = '$staff_id'";
    $staff_details_result = mysqli_query($conn, $staff_details_query);
    while($staff_details_row = mysqli_fetch_assoc($staff_details_result))
    {
        $status = $staff_details_row['status'];
    }
    
    if($status == "Active")
    {
        $update_query = "UPDATE `tbl_staff` SET `status`= 'Not-Active' WHERE `staff_id` = '$staff_id'";
        $update_ressult = mysqli_query($conn, $update_query);
        echo "<script>alert('staff Deactivate')</script>";
    }
    else
    {
        $update_query = "UPDATE `tbl_staff` SET `status`= 'Active' WHERE `staff_id` = '$staff_id'";
        $update_ressult = mysqli_query($conn, $update_query);
        echo "<script>alert('staff Activate')</script>";
    }
?>