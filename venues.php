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
            include_once './header.php';
            include_once './connection.php';
        ?>
        <br><br>
        <div class="container">
            <center><h1 style="color: #FF0033">Browse Venues</h1></center>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <center><label for="venue_city" class="label_color">Select City:</label></center>
                        <select id="venue_city" name="venue_city" style="border-color:#ccc" class="btn col-md-12" onchange="getVenues()">
                            <?php
                                    $venue_city_query = "SELECT DISTINCT city_master.city_name,city_master.city_id FROM tbl_venue INNER JOIN city_master ON tbl_venue.city_id=city_master.city_id";
                                    $venue_city_result = mysqli_query($conn,$venue_city_query);
                                    
                                while($venue_city_row = mysqli_fetch_array($venue_city_result))
                                {
                                    $city_id=$venue_city_row['city_id'];
                                    $city_name=$venue_city_row['city_name'];
                                    echo "<option value=".$city_id.">".$city_name."</option>";
                                }
                            ?>
                        </select>
                </div>
                <div class="col-md-6">
                    <center><label for="venue_type" class="label_color">Select Venue Type:</label></center>
                    <select id="venue_type" name="venue_type" style="border-color:#ccc" class="btn col-md-12" onchange="getVenues()">
                        <option value="1">Banquet Hall</option>
                        <option value="2">Plote</option>
                    </select>
                </div>
            </div>
            <br>
            <div id="response">
            </div>
            
        </div>
        <br>
        <script>
	 	$(document).ready(function(){
                    var temp_city_id = document.getElementById('venue_city').value;
                    var temp_type_id = document.getElementById('venue_type').value;
		 	$.ajax({
				type : "POST",
				url : "get_venue.php",
				data : {city_id:temp_city_id, type_id:temp_type_id},
				success: function(data){
					$("#response").html(data);
				}
			});
		});
                function getVenues(){
                    var temp_city_id = document.getElementById('venue_city').value;
                    var temp_type_id = document.getElementById('venue_type').value;
			$.ajax({
				type : "POST",
				url : "get_venue.php",
				data : {city_id:temp_city_id, type_id:temp_type_id},
				success: function(data){
					$("#response").html(data);
				}
			});
		}
        </script>
    </body>
</html>
<?php
    include_once './footer.php';
?>
