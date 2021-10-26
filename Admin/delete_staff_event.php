<?php
    include_once '../connection.php';
    
    if(isset($_REQUEST['sid']))
    {
        $staff_id = $_REQUEST['sid'];
    }
    
    $delete_query = "DELETE FROM `tbl_event_team` WHERE `event_team_staff_id` = '$staff_id'";
    $delete_result = mysqli_query($conn, $delete_query);
    
    if($delete_result)
    {
        echo "<script>alert('Staff Successfully Removed From Team')</script>";
        echo "<script>window.location.href='admin_home.php'</script>";
    }
    else 
    {
        echo "<script>alert('Staff Not Successfully Removed From Team')</script>";
        echo "<script>window.location.href='admin_home.php'</script>";
    }
?>