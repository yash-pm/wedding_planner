<?php
    include_once '../connection.php';
    
    $sid = $_REQUEST['id'];
    //echo $sid;
    
    $staff_query = "UPDATE `tbl_staff` SET `status`= 'Not-Active' WHERE `staff_id` = '$sid'";
    $staff_result = mysqli_query($conn, $staff_query);
    
    if($staff_result)
    {
        echo "<script>alert('Employee Deleted Successfully')</script>";
        echo "<script>window.location.href='show_staff.php'</script>";
    }
    else
    {
        echo "<script>alert('Employee Not Deleted Successfully')</script>";
    }
?>
