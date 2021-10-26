<?php
    
    include_once '../connection.php';
    
        if(isset($_POST['team_type']))
        {
            $team_type = $_POST['team_type'];
        }
        if(isset($_POST['staff_list']))
        {
            $staff_list = $_POST['staff_list'];
        }
        if(isset($_POST['customer_event_id']))
        {
            $customer_event_id = $_POST['customer_event_id'];
        }
        
        foreach($staff_list as $staff){
            $query = "INSERT INTO `tbl_event_team`(`event_team_staff_id`, `team_id`, `staff_id`, `customer_event_id`) VALUES ('','$team_type','$staff','$customer_event_id')";
            $result = mysqli_query($conn, $query);
            //print_r($result);
            if($result)
            {
                $value = 1;
            }
            else
            {
                $value = 0;
            }
          }
          if($value == 1)
          {
              echo "<script>alert('Added')</script>";
          }
           else
           {
               echo "<script>alert('Not Added')</script>";
           }
           echo "<script>window.location.href='admin_home.php'</script>";
?>