<?php
    
    include_once '../connection.php';
    
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
        $main_image_path = $directory.$file;
        if(is_uploaded_file($_FILES["main_image"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["main_image"]["tmp_name"],$main_image_path);
        }
        else
        {
            echo "<script>alert('First Image Not Uploaded')</script>";
        }
    }
    else
    {
        echo "<script>alert('First Image Not selected')</script>";
    }
    
    if ($_FILES["image_1"]["size"] > 0) 
    {
        $num = mt_rand(0000, 9999);
        $fileName = $_FILES["image_1"]["name"];
        $file = $num.$fileName;
        $directory = 'venue_photo/';
        $image_1_path = $directory.$file;
        if(is_uploaded_file($_FILES["image_1"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["image_1"]["tmp_name"],$image_1_path);
        }
        else
        {
            echo "<script>alert('Second Image Not Uploaded')</script>";
        }
    }
    else
    {
        echo "<script>alert('Second Image Not selected')</script>";
    }
    
    if ($_FILES["image_2"]["size"] > 0) 
    {
        $num = mt_rand(0000, 9999);
        $fileName = $_FILES["image_2"]["name"];
        $file = $num.$fileName;
        $directory = 'venue_photo/';
        $image_2_path = $directory.$file;
        if(is_uploaded_file($_FILES["image_2"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["image_2"]["tmp_name"],$image_2_path);
        }
        else
        {
            echo "<script>alert('Thired Image Not Uploaded')</script>";
        }
    }
    else
    {
        echo "<script>alert('Thired Image Not selected')</script>";
    }
    
    if ($_FILES["image_3"]["size"] > 0) 
    {
        $num = mt_rand(0000, 9999);
        $fileName = $_FILES["image_3"]["name"];
        $file = $num.$fileName;
        $directory = 'venue_photo/';
        $image_3_path = $directory.$file;
        if(is_uploaded_file($_FILES["image_3"]["tmp_name"]))
        {
            move_uploaded_file($_FILES["image_3"]["tmp_name"],$image_3_path);
        }
        else
        {
            echo "<script>alert('Fourth Image Not Uploaded')</script>";
        }
    }
    else
    {
        echo "<script>alert('Fourth Image Not selected')</script>";
    }
            
    $venue_query = "INSERT INTO `tbl_venue`(`venue_id`, `name`, `address`, `city_id`, `capacity`, `duration`, `price`, `type_id`, `picture_path`, `status`) VALUES ('','$venue_name','$venue_address','$city_id','$capacity','$duration','$price','$venue_type','$main_image_path','Availiable')";
    $result = mysqli_query($conn, $venue_query);
    
    if($result)
    {
        $get_venue_query = "SELECT * FROM `tbl_venue`";
        $get_venue_result = mysqli_query($conn, $get_venue_query);
        
        while ($venue_row = mysqli_fetch_assoc($get_venue_result))
        {
            $venue_id = $venue_row['venue_id'];
        }
        
        $venue_image_query1 = "INSERT INTO `tbl_venue_pictures`(`venue_id`, `picture_path`) VALUES ('$venue_id','$image_1_path')";
        $result_venue_image1 = mysqli_query($conn, $venue_image_query1);
        
        $venue_image_query2 = "INSERT INTO `tbl_venue_pictures`(`venue_id`, `picture_path`) VALUES ('$venue_id','$image_2_path')";
        $result_venue_image2 = mysqli_query($conn, $venue_image_query2);
        
        $venue_image_query3 = "INSERT INTO `tbl_venue_pictures`(`venue_id`, `picture_path`) VALUES ('$venue_id','$image_3_path')";
        $result_venue_image3 = mysqli_query($conn, $venue_image_query3);
        
        if($result_venue_image1 && $result_venue_image2 && $result_venue_image3)
        {
            echo "<script>alert('Venue Added')</script>";
            echo "<script>window.location.href='admin_home.php'</script>";
        }
        else
        {
            echo "<script>alert('Venue Not Added')</script>";
            echo "<script>window.location.href='add_venue.php'</script>";
        }
    }
    else
    {
        echo "<script>alert('Venue Not Added')</script>";
        echo "<script>window.location.href='add_venue.php'</script>";
    }
?>