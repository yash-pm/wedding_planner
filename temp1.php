<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            /*$conn = mysqli_connect("localhost", "root", "", "wedding_planner") or die("Cant Connect");
        
        if (isset($_POST["import"])) {

            $fileName = $_FILES["file"]["tmp_name"];

            if ($_FILES["file"]["size"] > 0) {

                $file = fopen($fileName, "r");

                while (($column = fgetcsv($file,1000,",")) !== FALSE) {
                    
                    $state_name = $column[0];
                   
                    $sqlInsert = "insert into city_master(`city_id`,`state_id`,`state_name`) values('','$state_id','$city_name')";
                    $result = mysqli_query($conn, $sqlInsert);
                    
                    if (! empty($result)) {
                        echo 'CSV Data Imported into the Database';
                        ?><br><?php
                    } else {
                        echo 'Problem in Importing CSV Data';
                        ?><br><?php
                    }
                    //$stmt->close();
                }
                
                fclose($file);  
            }
}*/
        
        /*$conn = mysqli_connect("localhost", "root", "", "wedding_planner") or die("Cant Connect");
        
        if (isset($_POST["import"])) {

            $fileName = $_FILES["file"]["tmp_name"];

            if ($_FILES["file"]["size"] > 0) {

                $file = fopen($fileName, "r");

                while (($column = fgetcsv($file,1000,",")) !== FALSE) {
                    
                    $city_name = $column[0];
                    $state_id = $column[1];
                    
                    //echo $city_name;
                    //echo $state_id."<br>";
                    $sqlInsert = "insert into city_master(`city_id`,`city_name`,`state_id`) values('','$city_name','$state_id')";
                    $result = mysqli_query($conn, $sqlInsert);
                    
                    if (! empty($result)) {
                        echo 'CSV Data Imported into the Database';
                        ?><br><?php
                    } else {
                        echo 'Problem in Importing CSV Data';
                        ?><br><?php
                    }
                    
                }
                
                fclose($file);  
            }
}*/
        
/*include './connection.php';
        if (isset($_POST["import"])) {
            if ($_FILES["image"]["size"] > 0) {
                $fileName = $_FILES["image"]["name"];
                $directory = 'Admin/venue_photo/';
                $path = $directory.$fileName;
                echo $path;
                if(is_uploaded_file($_FILES["image"]["tmp_name"]))
                {
                    move_uploaded_file($_FILES["image"]["tmp_name"],$directory.$fileName);
                    echo "<script>alert('Image Uploaded')</script>";
                }
            }
            else
            {
                echo "<script>alert('Image Not selected')</script>";
            }
            
            }
*/
        /*$guest_id = $_POST['guest_id'];
        $customer_event_id = $_POST['customer_event_id'];
        
        $query = "INSERT INTO `tbl_event_guest`(`event_guest_id`, `guest_id`, `event_id`, `status`) VALUES ('','$guest_id','$customer_event_id','Not-Arrived')";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            echo "<script>alert('Added')</script>";
        }
        else
        {
            echo "<script>alert('Not Added')</script>";
        }*/
        
        if(isset($_POST['customer_event']))
        {
            $customer_event = $_POST['customer_event'];
        }
        if(isset($_POST['guest_list']))
        {
            print_r($_POST['guest_list']);
        }
        echo $customer_event;
        ?>
    </body>
</html>
