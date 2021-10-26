<?php
    include_once '../connection.php';
    
    if(isset($_POST['staff_name']))
    {
        $staff_name = $_POST['staff_name'];
    }
    
    if(isset($_POST['staff_address']))
    {
        $staff_address = $_POST['staff_address'];
    }
    
    if(isset($_POST['city']))
    {
        $city_id = $_POST['city'];
    }
    
    if(isset($_POST['gender']))
    {
        $gender = $_POST['gender'];
    }
    
    if(isset($_POST['contact_no']))
    {
        $contact_no = $_POST['contact_no'];
    }
    
    if(isset($_POST['email']))
    {
        $email = $_POST['email'];
    }
    
    if(isset($_POST['designation']))
    {
        $designation = $_POST['designation'];
    }
    
    if ($_FILES["image"]["size"] > 0) 
    {
        $num = mt_rand(0000, 9999);
        $fileName = $_FILES["image"]["name"];
        $file = $num.$fileName;
        $directory = 'staff_photo/';
        $path = $directory.$file;
        //echo $path;
        if(is_uploaded_file($_FILES["image"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["image"]["tmp_name"],$path);
        }
        else
        {
            echo "<script>alert('Image Not Uploaded')</script>";
        }
    }
    else
    {
        echo "<script>alert('Image Not selected')</script>";
    }
    
    if(isset($_POST['password']))
    {
        $password = $_POST['password'];
    }
    
    
    $staff_query = "INSERT INTO `tbl_staff`(`staff_id`, `name`, `address`, `city_id`, `gender`, `contact_no`, `email`, `designation`, `picture_path`, `status`) VALUES ('','$staff_name','$staff_address','$city_id','$gender','$contact_no','$email','$designation','$path','Active')";
    $staff_result = mysqli_query($conn,$staff_query);
    
    $get_query = "SELECT `staff_id` FROM `tbl_staff` WHERE `email` = '$email'";
    $get_result = mysqli_query($conn, $get_query);
    while($get_row = mysqli_fetch_assoc($get_result))
    {
        $user_id = $get_row['staff_id'];
    }
    print_r($user_id);
    
    $staff_password = "INSERT INTO `tbl_user_details`(`user_id`,`email`, `password`, `role`) VALUES ('$user_id','$email','$password','event-staff')";
    $password_result = mysqli_query($conn, $staff_password);
    
    if($staff_result && $password_result)
    {
        echo "<script>alert('Employee Added Successfully')</script>";
        echo "<script>window.location.href='show_staff.php'</script>";
    } 
    else
    {
        echo "<script>alert('Employee Not Added Successfully')</script>";
        //echo "<script>window.location.href='show_staff.php'</script>";
    }
?>
