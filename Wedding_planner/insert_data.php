<?php
        define('db_server','localhost');
        define('db_user','root');
        define('db_password','');
        define('db_name','demo');
        $conn= mysqli_connect(db_server,db_user,db_password,db_name) or exit('could not connect to mysqli' . mysqli_connect_errno());
    
        /*$name = $_POST['name'];
        $contact_no = $_POST['contact_no'];
        $email = $_POST['e_mail'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $password = $_POST['password'];
        */
        
            $name="";
            $contact_no="";
            $email="";
            $address="";
            $state="";
            $city="";
            $password="";
            
            if(isset($_POST['name']))
            {
                $name = $_POST['name'];
            }
            if(isset($_POST['contact_no']))
            {
                $contact_no = $_POST['contact_no'];
            }
            if(isset($_POST['e_mail']))
            {
                $email = $_POST['e_mail'];
            }
            if(isset($_POST['address']))
            {
                $address = $_POST['address'];
            }
            if(isset($_POST['state']))
            {
                $state = $_POST['state'];
            }
            if(isset($_POST['city']))
            {
                $city = $_POST['city'];
            }
            if(isset($_POST['password']))
            {
                $password = $_POST['password'];
            }
         
           $a=$_POST['password']; 
           $b=$_POST['re-password'];
           if($a==$b)
           {
                $query="INSERT INTO `registration`(`uid`, `name`, `contact_no`, `email`, `address`, `state`, `city`, `password`, `status`) VALUES ('','$name','$contact_no','$email','$address','$state','$city','$password','active')";
                $result=@mysqli_query($conn, $query);
                if($result)
                {
                    echo "Data inserted";
                    header("Location:register.php");
                }
                 else {
                    echo "Fail to insert".$conn->error;
                }   
           }
           else
           {
               echo "Password does not matched";
               header("Location:register.php");
           }
        
        /*$query1="select * from student";
        $result=$conn->query($query1);
        $data=$result->fetch_all();
        print_r($data);*/
        mysqli_close($conn);
        
        ?>