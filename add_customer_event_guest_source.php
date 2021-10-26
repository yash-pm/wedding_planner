<?php
    include_once './connection.php';
    
    if(isset($_POST['guest_list']))
    {
        $guest_list = $_POST['guest_list'];
    }
    if(isset($_POST['customer_event_id']))
    {
        $customer_event_id = $_POST['customer_event_id'];
    }
    
            foreach($guest_list as $guest){
            $query = "INSERT INTO `tbl_event_guest`(`event_guest_id`, `guest_id`, `event_id`, `status`) VALUES ('','$guest','$customer_event_id','Not-Arrived')";
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
          echo "<script>window.location.href='show_customer_bookings_1.php'</script>";
?>
