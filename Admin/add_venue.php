<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './admin_header.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Venues</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <center><h1 style="color: #FF0033">Add Venue</h1></center>
                    <hr>
                    <br>
                    <form action="add_venue_source.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">
                        <center><label for="venue_name" class="label_color">Venue Name:</label></center>
                        <input type="text" id="venue_name" name="venue_name" class="form-control">
                        <span id="name_error" class="text-danger"></span>
                        <br>                             
                                                                       
                       <center><label for="venue_address" class="label_color">Address:</label></center>
                        <textarea id="venue_address" name="venue_address" class="form-control" rows="5"></textarea>
                        <span id="address_error" class="text-danger"></span>
                        <br>
                                                        
                        <center><label for="state" class="label_color">Select State:</label></center>
                        <select id="state" name="state" style="border-color:#ccc" class="btn col-md-12" onchange="getCity()">
                            <?php
                                    include '../connection.php';
    
                                    $query = "SELECT * FROM state_master";
                                    $result = mysqli_query($conn,$query);
                                    
                                while($test = mysqli_fetch_array($result))
                                {
                                    $state_id=$test['state_id'];
                                    $state_name=$test['state_name'];
                                    echo "<option value=".$state_id.">".$state_name."</option>";
                                }
                                
                            ?>
                        </select>
                        <br><br>
                                                        
                        <center><label for="city" class="label_color">Select City:</label></center>
                        <select id="cityList" name="city" style="border-color:#ccc" class="btn col-md-12">
                           <option value="">Select state first</option>
                        </select>
                        <br><br>
                                                        
                        <center><label for="capacity" class="label_color">Capacity:</label></center>
                        <input type="text" id="capacity" name="capacity" class="form-control">
                        <span id="capacity_error" class="text-danger"></span>
                        <br>
                                 
                        <center><label for="duration" class="label_color">Duration(In Days.):</label></center>
                        <input type="text" id="duration" name="duration" class="form-control">
                        <span id="duration_error" class="text-danger"></span>
                        <br>
                        
                        <center><label for="price" class="label_color">Price:</label></center>
                        <input type="text" id="price" name="price" class="form-control">
                        <span id="price_error" class="text-danger"></span>
                        <br>
                            
                        <center><label for="venue_type" class="label_color">Venue Type:</label></center>
                        <select id="venue_type" name="venue_type" style="border-color:#ccc" class="btn col-md-12">
                           <option value="1">Hall</option>
                           <option value="2">Plote</option>
                        </select>
                        <br><br>
                        
                        <center><label for="image" class="label_color">Select Picture:</label></center>
                        <div class="row">
                            <div class="col-md-6">
                                <center><input type="file" name="main_image" id="main_image"><span id="main_image_error" class="text-danger"></span></center>
                            </div>
                            <div class="col-md-6">
                                <center><input type="file" name="image_1" id="image_1"><span id="image_1_error" class="text-danger"></span></center>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <center><input type="file" name="image_2" id="image_2"><span id="image_2_error" class="text-danger"></span></center>
                            </div>
                            <div class="col-md-6">
                                <center><input type="file" name="image_3" id="image_3"><span id="image_3_error" class="text-danger"></span></center>
                            </div>
                        </div>
                        <br>
                                               
                        <center><input type="submit" name="register" value="Add" style="background-color: #FF0033; color: white" class="btn btn-default"/>
                        <input type="reset" name="reset" value="Reset" style="background-color: #FF0033; color: white" class="btn"/></center>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br>
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
                
                function validation(){
        var name=document.getElementById('venue_name').value;
        var address=document.getElementById('venue_address').value;
        var capacity=document.getElementById('capacity').value;
        var duration=document.getElementById('duration').value;
        var price=document.getElementById('price').value;
        var main_image=document.getElementById('main_image').value;
        var image_1=document.getElementById('image_1').value;
        var image_2=document.getElementById('image_2').value;
        var image_3=document.getElementById('image_3').value;
        
        
        
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
            
            // image 1 validation
            if(image_1 == "")
            {
                document.getElementById("image_1_error").innerHTML="Image Not Selected";
                return false; 
            }
            if (!allowedExtensions.exec(image_1)) { 
                document.getElementById("image_1_error").innerHTML="Format Of File Is Not Suitable";
                return false; 
            }
            else
            {
                document.getElementById("image_1_error").innerHTML="";
            }
            
            //image 2 validation
            if(image_2 == "")
            {
                document.getElementById("image_2_error").innerHTML="Image Not Selected";
                return false; 
            }
            if (!allowedExtensions.exec(image_2)) { 
                document.getElementById("image_2_error").innerHTML="Format Of File Is Not Suitable";
                return false; 
            }
            else
            {
                document.getElementById("image_2_error").innerHTML="";
            }
            
            // image 3 validation
            if(image_3 == "")
            {
                document.getElementById("image_3_error").innerHTML="Image Not Selected";
                return false; 
            }
            if (!allowedExtensions.exec(image_3)) { 
                document.getElementById("image_3_error").innerHTML="Format Of File Is Not Suitable";
                return false; 
            }
            else
            {
                document.getElementById("image_3_error").innerHTML="";
            }
            
        }
	 </script>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>
