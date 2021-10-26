<?php
    include_once './connection.php';
    
    
    if(!empty($_POST["city_id"]) && !empty($_POST["type_id"]))
    {
            $city_id = $_POST['city_id'];
            $type_id = $_POST['type_id'];
            
            
            $venue_query =  "SELECT * FROM `tbl_venue` WHERE `city_id` = '$city_id' AND `type_id` = '$type_id'";
            $venue_result = mysqli_query($conn, $venue_query);
            
            while ($venue_row = mysqli_fetch_assoc($venue_result))
            {                
                $venue_id = $venue_row['venue_id'];
                $picture_path = $venue_row['picture_path'];
                $name = $venue_row['name'];
                $address = $venue_row['address'];
                $capacity = $venue_row['capacity'];
                $price = $venue_row['price'];
            
                echo "<div class='container'>
                    <div class='row'>
                    <div class='col-md-3'>
                        <img src='Admin/".$picture_path."' alt='' height='200' width='280' class='img-rounded'/>
                    </div>
                    <div class='col-md-4'>
                        <h2 class='label_color'>".$name."</h2>
                        <br>
                        <address>
                            <span class='glyphicon glyphicon-map-marker'></span>&nbsp;
                            ".$address."
                        </address>
                    </div>  
                    <div class='col-md-3'>
                        <br><br>
                        <center>
                            <h3 class='label_color'><i class='fas fa-male' style='font-size:36px'></i> Capacity</h3>
                            <p>".$capacity." Peoples</p>
                            <br>
                            <h3 class='label_color'><i class='fas fa-rupee-sign' style='font-size:30px'></i> Price</h3>
                            <p>".$price." /- </p>
                        </center>
                    </div>
                    <div class='col-md-2'>
                        <br><br><br>
                        <center><button class='btn' style='background-color:#ff0033; color:white'>Select &nbsp;<input type='radio' class='' id='venue_id' name='venue_id' value=".$venue_id."/></button></center>
                    </div>
                </div>
                </div>
                <br>";
                    }
    }
?>

