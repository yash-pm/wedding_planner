<?php
    include_once './connection.php';
    
    
    if(!empty($_POST["city_id"]) && !empty($_POST["type_id"]))
    {
            $city_id = $_POST['city_id'];
            $type_id = $_POST['type_id'];
            
            
            $venue_query =  "SELECT * FROM `tbl_venue` WHERE `city_id` = '$city_id' AND `type_id` = '$type_id' AND `status` = 'Availiable'";
            $venue_result = mysqli_query($conn, $venue_query);
            
            while ($venue_row = mysqli_fetch_assoc($venue_result))
            {                
                $venue_id = $venue_row['venue_id'];
                $picture_path = $venue_row['picture_path'];
                $name = $venue_row['name'];
                $address = $venue_row['address'];
                $capacity = $venue_row['capacity'];
                $price = $venue_row['price'];
            
                echo "
                    <div class='col-md-4'>
                        <center><img src='Admin/".$picture_path."' alt='' height='200' width='280' class='img-rounded'/>
                        <h2 class='label_color'><a href='venue_details.php?venue_id=".$venue_id."'>".$name."</a></h2></center>
                    </div>
                ";
            }
    }
?>

