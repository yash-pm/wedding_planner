<?php
    include_once '../connection.php';
    
    if(isset($_POST['uid']))
    {
        $uid = $_POST['uid'];
    }
    
    if(isset($_POST['picture_path']))
    {
        $picture_path = $_POST['picture_path'];
    }
    
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
    
    if ($_FILES["image"]["size"] > 0) 
    {
        $num = mt_rand(0000, 9999);
        $fileName = $_FILES["image"]["name"];
        $file = $num.$fileName;
        $directory = '../Admin/staff_photo/';
        $path = $directory.$file;
        //echo $path;
        if(is_uploaded_file($_FILES["image"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["image"]["tmp_name"],$path);
            echo "<script>alert('Image Uploaded')</script>";
        }
        else
        {
            echo "<script>alert('Image Not Uploaded')</script>";
        }
    }
    else
    {
        $path = $picture_path;
    }
    
    /*echo "<h1>".$staff_name."</h1>";
    echo "<h1>".$staff_address."</h1>";
    echo "<h1>".$city_id."</h1>";
    echo "<h1>".$gender."</h1>";
    echo "<h1>".$contact_no."</h1>";
    echo "<h1>".$staff_name."</h1>";
    echo "<h1>".$email."</h1>";
    echo "<h1>".$path."</h1>";*/
    
    $profile_query = "UPDATE `tbl_staff` SET `name`= '$staff_name',`address`='$staff_address',`city_id`='$city_id',`gender`='$gender',`contact_no`='$contact_no',`email`='$email',`picture_path`='$path' WHERE `staff_id`= '$uid'";
    $profile_result = mysqli_query($conn, $profile_query);
    
    $user_query = "UPDATE `tbl_user_details` SET `email`= '$email' WHERE `user_id`= '$uid'";
    $user_result  = mysqli_query($conn, $user_query);
    
    if($profile_result && $user_result)
    {
        echo "<script>alert('Profile Updated Successfully')</script>";
        echo "<script>window.location.href='../logout.php'</script>";
    }
    else
    {
        echo "<script>alert('Profile Not Updated Successfully')</script>";
        echo "<script>window.location.href='edit_staff_profile.php'</script>";
    }
?>
