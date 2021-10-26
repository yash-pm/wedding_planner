<?php
    include_once './connection.php';
    $value = 0;
    if(isset($_POST['customer_event']))
        {
            $customer_event = $_POST['customer_event'];
        }
        if(isset($_POST['guest_list']))
        {
            $guest_list = $_POST['guest_list'];
        }
        
        foreach($guest_list as $guest){
            $query = "INSERT INTO `tbl_event_guest`(`event_guest_id`, `guest_id`, `event_id`, `status`) VALUES ('','$guest','$customer_event','Not-Arrived')";
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
          echo "<script>window.location.href='event_booking.php'</script>";
?>
