<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
        
            include_once './admin_header.php';
            include_once '../connection.php';
            
            $temp_veune_id = $_REQUEST['id'];
            //$_SESSION['temp_venue_id'] = $temp_veune_id;

            
            $show_venue_query = "SELECT * FROM `tbl_venue` WHERE `venue_id` = '$temp_veune_id'";
            $result = mysqli_query($conn, $show_venue_query);
            
                         
            while ($row = mysqli_fetch_assoc($result))
            {
                $venue_name = $row['name'];
                $venue_address = $row['address'];
                $temp_city_id = $row['city_id'];
                $capacity = $row['capacity'];
                $duration = $row['duration'];
                $price = $row['price'];
                $type_id = $row['type_id'];
                $main_old_path = $row['picture_path'];
            }
            
                $city_query = "SELECT `city_name`, `state_id` FROM `city_master` WHERE `city_id` = '$temp_city_id'";
                $city_result = mysqli_query($conn, $city_query);
                 
                while ($city_row = mysqli_fetch_assoc($city_result))
                {
                    $city = $city_row['city_name'];
                    $temp_state_id = $city_row['state_id'];
                }
                
                    $state_query = "SELECT `state_name` FROM `state_master` WHERE `state_id` ='$temp_state_id'";
                    $state_result = mysqli_query($conn,$state_query);
                    
                    while ($row1 = mysqli_fetch_assoc($state_result))
                    {
                        $state = $row1['state_name'];
                    }
                
                
                $venue_query = "SELECT * FROM `tbl_venue_type` WHERE `type_id` = '$type_id'";
                $venue_result = mysqli_query($conn, $venue_query);
                
                while ($venue_row = mysqli_fetch_assoc($venue_result))
                {
                    $venue_type = $venue_row['name'];
                }
            //echo $venue_name,$venue_address,$state,$city,$capacity,$duration,$price,$type_id,$venue_type,$path;
       ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Venue Details</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <center><h1 style="color: #FF0033">Edit Venue Details</h1></center>
                    <hr>
                    <br>
                    <form action="edit_venue_details_source.php" method="post" enctype="multipart/form-data" onsubmit="return validation1()">
                        <input type="hidden" name="venue_id" value="<?php echo $temp_veune_id;?>">
                        <input type="hidden" name="main_path" value="<?php echo $main_old_path;?>">
                       
                        <center><label for="venue_name" class="label_color">Venue Name:</label></center>
                        <input type="text" id="venue_name" name="venue_name" class="form-control" value="<?php echo $venue_name;?>">
                        <span id="name_error" class="text-danger"></span>
                        <br>                             
                                                                       
                       <center><label for="venue_address" class="label_color">Address:</label></center>
                        <textarea id="venue_address" name="venue_address" class="form-control" rows="5"><?php echo $venue_address;?></textarea>
                        <span id="address_error" class="text-danger"></span>
                        <br>
                                                        
                        <center><label for="state" class="label_color">Select State:</label></center>
                        <select id="state" name="state" style="border-color:#ccc" class="btn col-md-12" onchange="getCity()" >
                            <?php
                                    
    
                                    $query = "SELECT * FROM state_master";
                                    $result = mysqli_query($conn,$query);
                                    
                                while($test = mysqli_fetch_array($result))
                                {
                                    $state_id=$test['state_id'];
                                    $state_name=$test['state_name'];
                                    echo "<option value=".$state_id.">".$state_name."</option>";
                                }
                                //mysqli_close($conn);
                            ?>
                        </select>
                        <br><br>
                                                        
                        <center><label for="city" class="label_color">City:</label></center>
                        <select id="cityList" name="city" style="border-color:#ccc" class="btn col-md-12">
                           <option>Select state first</option>
                        </select>
                        <br><br>
                                                        
                        <center><label for="capacity" class="label_color">Capacity:</label></center>
                        <input type="text" id="capacity" name="capacity" class="form-control" value="<?php echo $capacity;?>">
                        <span id="capacity_error" class="text-danger"></span>
                        <br>
                                 
                        <center><label for="duration" class="label_color">Duration(In Days.):</label></center>
                        <input type="text" id="duration" name="duration" class="form-control" value="<?php echo $duration;?>">
                        <span id="duration_error" class="text-danger"></span>
                        <br>
                        
                        <center><label for="price" class="label_color">Price:</label></center>
                        <input type="text" id="price" name="price" class="form-control" value="<?php echo $price;?>">
                        <span id="price_error" class="text-danger"></span>
                        <br>
                            
                        <center><label for="venue_type" class="label_color">Venue Type:</label></center>
                        <select id="venue_type" name="venue_type" style="border-color:#ccc" class="btn col-md-12">
                           <option value="1">Hall</option>
                           <option value="2">Plote</option>
                        </select>
                        <br><br>
                        
                        <center><label for="image" class="label_color">Select Picture:</label></center>
                        <center><input type="file" name="main_image" id="main_image"></center>
                        <span id="main_image_error" class="text-danger"></span>
                        <br><br>
                        
                        <center><input type="submit" name="submit" value="Update" style="background-color: #FF0033; color: white" class="btn btn-default"/>
                        <input type="reset" name="reset" value="Reset" style="background-color: #FF0033; color: white" class="btn"/></center>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
        <script>
	 	$(document).ready(function(){
		 	$.ajax({
				type: "POST",
				url: "../get_city.php",
				data:'state_id='+document.getElementById('state').value,
				beforeSend: function() {
					$("#cityList").addClass("loader");
				},
				success: function(data){
					$("#cityList").html(data);
					$("#cityList").removeClass("loader");
				}
			});
		});
		function getCity(){
			$.ajax({
				type: "POST",
				url: "../get_city.php",
				data:'state_id='+document.getElementById('state').value,
				beforeSend: function() {
					$("#cityList").addClass("loader");
				},
				success: function(data){
					$("#cityList").html(data);
					$("#cityList").removeClass("loader");
				}
			});
		}
                
                function validation1(){
        var name=document.getElementById('venue_name').value;
        var address=document.getElementById('venue_address').value;
        var capacity=document.getElementById('capacity').value;
        var duration=document.getElementById('duration').value;
        var price=document.getElementById('price').value;
        var main_image=document.getElementById('main_image').value;
        
        var unamecheck=/^[A-Za-z ]+$/;
        var digitcheck=/^[0-9]+$/;
        var pricecheck = /^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/; 
        
            //name condition
            if(name=="")
            {
                document.getElementById("name_error").innerHTML="this field is required";
                return false;
            }
            if(!unamecheck.test(name))
            {
                document.getElementById("name_error").innerHTML="Only character are allowed";
                return false;
            }
            else{
                document.getElementById("name_error").innerHTML="";
            }
            
            //address condition
            if(address=="")
            {
                document.getElementById("address_error").innerHTML="this field is required";
                return false;
            }
            else{
                document.getElementById("address_error").innerHTML="";
            }
            
            //capacity condition
            if(capacity=="")
            {
                document.getElementById("capacity_error").innerHTML="this field is required";
                return false;
            }
            if(!digitcheck.test(capacity))
            {
                document.getElementById("capacity_error").innerHTML="only Digits Are Allowed";
                return false;
            }
            else{
                document.getElementById("capacity_error").innerHTML="";
            }
            
            //duration condition
            if(duration=="")
            {
                document.getElementById("duration_error").innerHTML="this field is required";
                return false;
            }
            if(!digitcheck.test(duration))
            {
                document.getElementById("duration_error").innerHTML="only Digits Are Allowed";
                return false;
            }
            else{
                document.getElementById("duration_error").innerHTML="";
            }
            
            //duration condition
            if(price=="")
            {
                document.getElementById("price_error").innerHTML="this field is required";
                return false;
            }
            if(!pricecheck.test(price))
            {
                document.getElementById("price_error").innerHTML="only Digits Are Allowed";
                return false;
            }
            else{
                document.getElementById("price_error").innerHTML="";
            }
            
            // main image validation
            if(main_image == "")
            {
                document.getElementById("main_image_error").innerHTML="Image Not Selected";
                return false; 
            }
            if (!allowedExtensions.exec(main_image)) { 
                document.getElementById("main_image_error").innerHTML="Format Of File Is Not Suitable";
                return false; 
            }
            else
            {
                document.getElementById("main_image_error").innerHTML="";
            }
        }
	 </script>
         <br>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>

