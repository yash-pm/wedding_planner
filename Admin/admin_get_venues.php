<?php
    include_once '../connection.php';
    
    if(isset($_POST['type_id']))
    {
        $type_id = $_POST['type_id'];
    }
?>
        <table class="table table-condensed table-hover">
             <thead>
             <tr>
             <th>Photo</th>
             <th>Venue Name</th>
             <th>Address</th>
             <th>State</th>
             <th>City</th>
             <th>Capacity</th>
             <th>Duration(In Days)</th>
             <th>Price</th>
             </tr>
             </thead>
             <tbody id="myTable">
             <tr>
             <?php
             
             $get_venue_query = "SELECT * FROM `tbl_venue` WHERE `type_id` = '$type_id' AND `status` = 'Availiable'";
             $get_venue_result = mysqli_query($conn,$get_venue_query);

             while($get_venue_row = mysqli_fetch_assoc($get_venue_result))
             {
                 $temp_city_id = $get_venue_row['city_id'];
                 $city_query = "SELECT `city_name`, `state_id` FROM `city_master` WHERE `city_id` = '$temp_city_id'";
                 $city_result = mysqli_query($conn, $city_query);
                 
                echo"<td><img src=".$get_venue_row['picture_path']." height='300' width=300' class='img-rounded'/></td>"; 
                echo"<td>".$get_venue_row['name']."</td>";
                echo"<td>".$get_venue_row['address']."</td>";
                
                while ($row = mysqli_fetch_assoc($city_result))
                {
                    $temp_state_id = $row['state_id'];
                    $state_query = "SELECT `state_name` FROM `state_master` WHERE `state_id` ='$temp_state_id'";
                    $state_result = mysqli_query($conn,$state_query);
                    
                    while ($row1 = mysqli_fetch_assoc($state_result))
                    {
                        echo"<td>".$row1['state_name']."</td>";
                    }
                    echo"<td>".$row['city_name']."</td>";
                }
                
                echo"<td>".$get_venue_row['capacity']."</td>";
                echo"<td>".$get_venue_row['duration']."</td>";
                echo"<td>".$get_venue_row['price']."</td>";
                echo"<td><a class='btn btn-info' href='edit_venue_details.php?id=".$get_venue_row['venue_id']."'><span class='glyphicon glyphicon-pencil'></span></a></td>";
                echo"<td><a class='btn btn-danger' href='delete_venues.php?id=".$get_venue_row['venue_id']."'><span class='glyphicon glyphicon-trash'></span></a></td>";
                echo "</tr>";
             }
             ?>
            </table>
