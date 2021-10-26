<?php
    include_once '../connection.php';
    //include_once './admin_header.php';
    
    //session_start();
    //$temp_veune_id = $_SESSION['temp_venue_id'];
    if(isset($_POST['submit']))
    {
        if(isset($_POST['main_path']))
        {
            $main_old_path = $_POST['main_path'];
        }
        
        if(isset($_POST['venue_id']))
        {
            $venue_id = $_POST['venue_id'];
        }
    
    if(isset($_POST['venue_name']))
    {
        $venue_name = $_POST['venue_name'];
    }
    
    if(isset($_POST['venue_address']))
    {
        $venue_address = $_POST['venue_address'];
    }
    
    if(isset($_POST['city']))
    {
        $city_id = $_POST['city'];
    }
    
    if(isset($_POST['capacity']))
    {
        $capacity = $_POST['capacity'];
    }
    
    if(isset($_POST['duration']))
    {
        $duration = $_POST['duration'];
    }
    
    if(isset($_POST['price']))
    {
        $price = $_POST['price'];
    }
    
    if(isset($_POST['venue_type']))
    {
        $venue_type = $_POST['venue_type'];
    }
    
    if ($_FILES["main_image"]["size"] > 0) 
    {
        $num = mt_rand(0000, 9999);
        $fileName = $_FILES["main_image"]["name"];
        $file = $num.$fileName;
        $directory = 'venue_photo/';
        $new_main_image_path = $directory.$file;
        if(is_uploaded_file($_FILES["main_image"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["main_image"]["tmp_name"],$new_main_image_path);
        }
        else
        {
            echo "<script>alert('Image Not Uploaded')</script>";
        }
    }
    else
    {
        $new_main_image_path = $main_old_path;
    }

    /*$venue_picture_query = "SELECT `picture_path` FROM `tbl_venue_pictures` WHERE `venue_id` = '$venue_id '";
    $venue_picure_result = mysqli_query($conn, $venue_picture_query);
            
    while($venue_picure_row = mysqli_fetch_assoc($venue_picure_result))
    {
        $image[] = $venue_picure_row['picture_path'];
    }
    
    $image_1_path = $image[0];
    $image_2_path = $image[1];
    $image_3_path = $image[2];

    if ($_FILES["image_1"]["size"] > 0) 
    {
        $num = mt_rand(0000, 9999);
        $fileName = $_FILES["image_1"]["name"];
        $file = $num.$fileName;
        $directory = 'venue_photo/';
        $new_image_1_path = $directory.$file;
        if(is_uploaded_file($_FILES["image_1"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["image_1"]["tmp_name"],$new_image_3_path);
            echo "<script>alert('Image Uploaded')</script>";
        }
        else
        {
            echo "<script>alert('Image Not Uploaded')</script>";
        }
    }
    else
    {
        $new_image_1_path = $image_1_path;
    }
    
    if ($_FILES["image_2"]["size"] > 0) 
    {
        $num = mt_rand(0000, 9999);
        $fileName = $_FILES["image_2"]["name"];
        $file = $num.$fileName;
        $directory = 'venue_photo/';
        $new_image_2_path = $directory.$file;
        if(is_uploaded_file($_FILES["image_2"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["image_2"]["tmp_name"],$new_image_2_path);
            echo "<script>alert('Image Uploaded')</script>";
        }
        else
        {
            echo "<script>alert('Image Not Uploaded')</script>";
        }
    }
    else
    {
        $new_image_2_path = $image_2_path;
    }
    
    if ($_FILES["image_3"]["size"] > 0) 
    {
        $num = mt_rand(0000, 9999);
        $fileName = $_FILES["image_3"]["name"];
        $file = $num.$fileName;
        $directory = 'venue_photo/';
        $new_image_3_path = $directory.$file;
        if(is_uploaded_file($_FILES["image_3"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["image_3"]["tmp_name"],$new_image_3_path);
            echo "<script>alert('Image Uploaded')</script>";
        }
        else
        {
            echo "<script>alert('Image Not Uploaded')</script>";
        }
    }
    else
    {
        $new_image_3_path = $image_3_path;
    }
    */
    $update_query = "UPDATE `tbl_venue` SET `name`= '$venue_name',`address`= '$venue_address',`city_id`= '$city_id',`capacity`= '$capacity',`duration`= '$duration',`price`= '$price',`type_id`= '$venue_type',`picture_path`= '$new_main_image_path' WHERE `venue_id` = '$venue_id'";
    $update_result = mysqli_query($conn, $update_query);
    
    if($update_result)
    {
        echo "<script>alert('Data Updated Successfully')</script>";
        echo "<script>window.location.href='show_venues.php'</script>";
    }
    else
    {
        echo "<script>alert('Data Not Updated Successfully')</script>";
        echo "<script>window.location.href='edit_venue_deatails.php'</script>";
    }
    }
?>