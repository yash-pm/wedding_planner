<?php

    include_once './connection.php';
    
        if (isset($_POST['user_email']))
        {
            $temp_user=$_POST['user_email'];
        }
        if(isset($_POST['user_password']))
        {
            $temp_password=$_POST['user_password'];
        }
        
        $query="SELECT * FROM `tbl_user_details` WHERE `email` = '$temp_user' AND `password` = '$temp_password'";
        $result=@mysqli_query($conn, $query);
        $data=$result->fetch_all();
        if($data)
        {
            session_start();
            $_SESSION['user_email']=$temp_user;
            
            $role_query = "SELECT `role` FROM `tbl_user_details` WHERE `email` = '$temp_user' AND `password` = '$temp_password' ";
            $result_role = mysqli_query($conn, $role_query);
            while ($row = mysqli_fetch_assoc($result_role))
            {
                $role = $row['role'];
            }
            if($role == "admin")
            {
                $id_query = "SELECT `user_id` FROM `tbl_user_details` WHERE `email` = '$temp_user' AND `password` = '$temp_password'";
                $id_result = mysqli_query($conn, $id_query);
                
                while ($id_row = mysqli_fetch_assoc($id_result))
                {
                    $id = $id_row['user_id'];
                }
                
                $_SESSION['user_id'] = $id;
                echo "<script>window.location.href='Admin/admin_home.php'</script>";
            }
            elseif ($role == "customer")
            {
                $id_query = "SELECT `user_id` FROM `customer_registration` WHERE `email` = '$temp_user'";
                $id_result = mysqli_query($conn, $id_query);
                
                while ($id_row = mysqli_fetch_assoc($id_result))
                {
                    $id = $id_row['user_id'];
                }
                $_SESSION['user_id'] = $id;
                echo "<script>window.location.href='user_home.php'</script>";
            }
            elseif($role == "event-staff")
            {
                $id_query = "SELECT `staff_id` FROM `tbl_staff` WHERE `email` = '$temp_user'";
                $id_result = mysqli_query($conn, $id_query);
                
                while ($id_row = mysqli_fetch_assoc($id_result))
                {
                    $id = $id_row['staff_id'];
                }
                $_SESSION['user_id'] = $id;
                echo "<script>window.location.href='event-staff/staff_home.php'</script>";
            }
            
        }
         else {
             echo "<script>alert('Sorry You Are Not Authenticated User')</script>";
             echo "<script>window.location.href='surfuer_home.php'</script>";
        }
?>
