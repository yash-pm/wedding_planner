<?php
       include_once './connection.php';
        
        if (isset($_POST['user_email']))
        {
            $temp_user=$_POST['user_email'];
        }
        
        $query="SELECT `user_id` FROM `tbl_user_details` WHERE `email`='$temp_user'";
        $result=@mysqli_query($conn, $query);
        $data=$result->fetch_all();
        if($data)
        {
            try{
            $otp=mt_rand(100000,999999);
            session_start();
            $_SESSION['temp_user_email']=$temp_user;
            //echo $temp_user;
            $_SESSION['temp_otp']=$otp;
            //echo $otp;
            $msg = "Your One Time OTP IS";
            $rec = "17bmiit044@gmail.com";
            $sub="OTP";
            mail($rec,$sub,$msg);
                
            echo "Mail sent";
            header("Location:forget_password_2.php");
            }
            catch (Exception $e){
                echo "mail is not sent".$e;
            }
        }
        else
        {
            echo "You Are Not Registered User".$conn->error;
            header("Location:forget_password_1.php");
        }
            
        
        
