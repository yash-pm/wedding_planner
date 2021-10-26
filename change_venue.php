<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
            include_once './header.php';
            include_once './connection.php';
            
            if(isset($_REQUEST['bid']))
            {
                $booking_id = $_REQUEST['bid'];
            }
            
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .panel-style{
                background-color: #ff0033;
                color: white;
            }
        </style>
    </head>
    <body>
        <br><br>
        <div class="container">
            <div class="panel" id="panel">
            <div class="panel-heading panel-style" id="panel-head">Change Venue</div>
            <div class="panel-body" id="panel5-body" style="background-color: #ffe6eb">
                <div class="form-group">
                    <form action="change_venue_source.php" method="post">
                        <input type="hidden" name="booking_id" value="<?php echo $booking_id;?>">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="venue_city" class="label_color">Select City:</label>
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
                            <label for="venue_type" class="label_color">Select Venue Type:</label>
                            <select id="venue_type" name="venue_type" style="border-color:#ccc" class="btn col-md-12" onchange="getVenues()">
                               <option value="1">Banquet Hall</option>
                               <option value="2">Plote</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    
                    <div id="response">
                    </div>
                    
                    <br>
                    <center><input type="submit" name="done_venue" value="Change Venue" class="btn btn-success"></center>    
                    </form>
                </div>
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function(){
                        var temp_city_id = document.getElementById('venue_city').value;
                        var temp_type_id = document.getElementById('venue_type').value;
		 	$.ajax({
				type : "POST",
				url : "get_venue_for_booking.php",
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
				url : "get_venue_for_booking.php",
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

