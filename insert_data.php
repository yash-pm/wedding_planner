<?php
            include_once './connection.php';
            
            $name="";
            $contact_no="";
            $email="";
            $address="";
            
            $city_id="";
            $password="";
            
            if(isset($_POST['user_name']))
            {
                $name = $_POST['user_name'];
            }
            if(isset($_POST['user_contact_no']))
            {
                $contact_no = $_POST['user_contact_no'];
            }
            if(isset($_POST['user_email']))
            {
                $email = $_POST['user_email'];
            }
            if(isset($_POST['user_address']))
            {
                $address = $_POST['user_address'];
            }
            if(isset($_POST['city']))
            {
                $city_id = $_POST['city'];
            }
            if(isset($_POST['user_password']))
            {
                $password = $_POST['user_password'];
            }
            
        $query="INSERT INTO `customer_registration`(`user_id`, `name`, `contact_no`, `email`, `address`, `city_id`) VALUES ('','$name','$contact_no','$email','$address','$city_id')";
        $result=@mysqli_query($conn, $query);
        
        $get_query = "SELECT `user_id` FROM `customer_registration` WHERE `email` = '$email'";
        $get_result = mysqli_query($conn, $get_query);
        while($get_row = mysqli_fetch_assoc($get_result))
        {
            $user_id = $get_row['user_id'];
        }
        
        $user_query = "INSERT INTO `tbl_user_details`(`user_id`,`email`, `password`, `role`) VALUES ('$user_id','$email','$password','customer')";
        $user_query_result= mysqli_query($conn, $user_query);
        
        
        if($result && $user_query_result)
        {
            echo "<script>alert('Sign Up Done Successfully')</script>";
            echo "<script>window.location.href='surfuer_home.php'</script>";
        }
        else
        {
            echo "<script>alert('Sign Up Not Done Successfully')</script>";
            echo"<script>window.location.href='customer_registration.php'</script>";
        }
        
        mysqli_close($conn);
?>
