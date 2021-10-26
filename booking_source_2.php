<?php
    include_once './connection.php';
    
    session_start();
    $booking_id = $_SESSION['booking_id'];
        
    if (isset($_POST["submit"])) {

            $fileName = $_FILES["file"]["tmp_name"];

            if ($_FILES["file"]["size"] > 0) {

                $file = fopen($fileName, "r");

                while (($column = fgetcsv($file,1000,",")) !== FALSE) {
                    
                    $guest_name = $column[0];
                    $guest_address = $column[1];
                    $guest_state = $column[2];
                    $guest_city = $column[3];
                    $guest_contact_no = $column[4];
                    $guest_email = $column[5];
                   
                    $city_query = "SELECT `city_id` FROM `city_master` WHERE `city_name` = '$guest_city'";
                    $city_result = mysqli_query($conn, $city_query);
                    while ($city_row = mysqli_fetch_assoc($city_result))
                    {
                        $city_id = $city_row['city_id'];
                    }
                    
                    $sqlInsert = "INSERT INTO `tbl_guest`(`guest_id`, `booking_id`, `name`, `address`, `city_id`, `contact_no`, `email`, `status`) VALUES ('','$booking_id','$guest_name','$guest_address','$city_id','$guest_contact_no','$guest_email','Not-arrived')";
                    $result = mysqli_query($conn, $sqlInsert);
                    
                    if (! empty($result)) {
                        echo "<script>alert('Guest Added')</script>";
                    } else {
                       echo "<script>alert('Guest Not Added')</script>";
                    }
                    
                    echo "<script>window.location.href='event_booking.php'</script>";
                }
                
                fclose($file);  
            }
            else
            {
                echo "<script>window.location.href='event_booking.php'</script>";
            }
    }
?>
