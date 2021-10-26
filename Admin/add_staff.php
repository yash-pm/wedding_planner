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
        <title>Add Staff</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <center><h1 style="color: #FF0033">Add Staff</h1></center>
                    <hr>
                    <br>
                    <form action="add_staff_source.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">
                        <center><label for="staff_name" class="label_color">Name:</label></center>
                        <input type="text" id="staff_name" name="staff_name" class="form-control">
                        <span id="name_error" class="text-danger"></span>
                        <br>                             
                                                                       
                       <center><label for="staff_address" class="label_color">Address:</label></center>
                        <textarea id="staff_address" name="staff_address" class="form-control" rows="5"></textarea>
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
                                mysqli_close($conn);
                            ?>
                        </select>
                        <br><br>
                                                        
                        <center><label for="city" class="label_color">Select City:</label></center>
                        <select id="cityList" name="city" style="border-color:#ccc" class="btn col-md-12">
                           <option value="">Select state first</option>
                        </select>
                        <br><br>
                                                        
                        <center><label for="gender" class="label_color">Gender:</label></center>
                        <center><h5><input type="radio" id="male" name="gender" value="Male" checked="checked">&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="female" name="gender" value="Fe-Male">&nbsp;Fe-Male</h5>
                        </center>
                        <br>
                                 
                        <center><label for="contact_no" class="label_color">Contact No:</label></center>
                        <input type="text" id="contact_no" name="contact_no" class="form-control">
                        <span id="contact_error" class="text-danger"></span>
                        <br>
                        
                        <center><label for="email" class="label_color">E-mail:</label></center>
                        <input type="email" id="email" name="email" class="form-control">
                        <span id="email_error" class="text-danger"></span>
                        <br>
                            
                        <center><label for="designation" class="label_color">Designation:</label></center>
                        <select id="designation" name="designation" style="border-color:#ccc" class="btn col-md-12">
                           <option value="Super-Visor">Super-Visor</option>
                           <option value="Promoter">Promoter</option>
                        </select>
                        <br><br>
                        
                        <center><label for="image" class="label_color">Select Picture:</label></center>
                        <center><input type="file" name="image" id="image">
                        <span id="image_error" class="text-danger"></span></center>
                        <br>
                        
                        <center><label for="password" class="label_color">Password:</label></center>
                        <input type="password" id="password" name="password" class="form-control">
                        <span id="password_error" class="text-danger"></span>
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
        var name=document.getElementById('staff_name').value;
        var address=document.getElementById('staff_address').value;
        var contact_no=document.getElementById('contact_no').value;
        var email=document.getElementById('email').value;
        var image=document.getElementById('image').value;
        var password=document.getElementById('password').value;
        
        var unamecheck=/^[A-Za-z ]+$/;
        var emailcheck=/^([0-9a-zA-Z_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
        var mnocheck=/^[987][0-9]+$/;
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
           
            //mobile number condition
            if(contact_no=="")
            {
                document.getElementById("contact_error").innerHTML="this field is required";
                return false;
            }
            if(contact_no.length!=10){
                document.getElementById("contact_error").innerHTML="mobile no must be of 10 digit";
                return false;
            }
            if(!mnocheck.test(contact_no))
            {
                document.getElementById("contact_error").innerHTML="mobile no is invalid";
                return false;
            }
            else{
                document.getElementById("contact_error").innerHTML="";
            }
            
            //email condition
            if(email=="")
            {
                document.getElementById("email_error").innerHTML="this field is required";
                return false;
            }
            if (!emailcheck.test(email)) {
                document.getElementById("email_error").innerHTML="email format is invalid";
                return false;
            }
            else{
                document.getElementById("email_error").innerHTML="";
            }
            
            // main image validation
            if(image == "")
            {
                document.getElementById("image_error").innerHTML="Image Not Selected";
                return false; 
            }
            if (!allowedExtensions.exec(image)) { 
                document.getElementById("image_error").innerHTML="Format Of File Is Not Suitable";
                return false; 
            }
            else
            {
                document.getElementById("image_error").innerHTML="";
            }
            
            //password condition
            if(password=="")
            {
                document.getElementById("password_error").innerHTML="this field is required";
                return false;
            }
            if(password.length<6 || password.length>20)
            {
                document.getElementById("password_error").innerHTML="password length must be between 6 and 20";
                return false;
            }
            else{
                document.getElementById("password_error").innerHTML="";

            }
            
        }
	 </script>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>
