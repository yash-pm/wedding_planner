<?php
    include_once '../connection.php';
    
        if(isset($_POST['team_id']))
        {
            $team_id = $_POST['team_id'];
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
            $query = "INSERT INTO `tbl_event_team`(`event_team_staff_id`, `team_id`, `staff_id`, `customer_event_id`) VALUES ('','$team_id','$staff','$customer_event_id')";
            $reult = mysqli_query($conn, $query);
            if($reult)
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
          echo "<script>window.location.href='team_details_1.php'</script>";
?>
