<?php
        define('db_server','localhost');
        define('db_user','root');
        define('db_password','');
        define('db_name','demo');
        $conn=@mysqli_connect(db_server,db_user,db_password,db_name) or exit('could not connect to mysqli' . mysqli_connect_errno());
        
        if (isset($_POST['user_email']))
        {
            $temp_user=$_POST['user_email'];
        }
        
        $query="SELECT `uid` FROM `registration` WHERE `email`='$temp_user'";
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
            $hader = 'FROM:Wedding Planner 17bmiit044@gmail.com'."\r\n".
 		'Reply-To:17bmiit044@gmail.com'."\r\n".
 		'X-Mailer:PHP/'.phpversion()."\r\n".
 		'Content-type: text/html; charset=iso-8859-1';
            $msg = "Your One Time OTP IS : " . $otp;
            $rec = $temp_user;
            $sub="One Time OTP";
            mail($rec,$sub,$msg);
                
            //echo "Mail sent";
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
            
        
        