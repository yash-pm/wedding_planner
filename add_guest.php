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
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <br>
        <div class="container">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel" id="panel1">
                <div class="panel-heading panel-style" id="panel1-head">Add New Guest</div>
                <div class="panel-body" id="panel1-body" style="background-color: #ffe6eb">    
            
                <div class="form-group">
                    <form action="add_guest_source.php" method="post" onsubmit="return validation()">
                        <input type="hidden" name="booking_id" value="<?php echo $booking_id;?>">
                        <center><label for="guest_name" class="label_color">Name:</label></center>
                        <input type="text" id="guest_name" name="guest_name" class="form-control">
                        <span id="name_error" class="text-danger"></span>
                        <br>                             
                                                                       
                       <center><label for="guest_address" class="label_color">Address:</label></center>
                        <textarea id="guest_address" name="guest_address" class="form-control" rows="5"></textarea>
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
                                 
                        <center><label for="contact_no" class="label_color">Contact No:</label></center>
                        <input type="text" id="contact_no" name="contact_no" class="form-control">
                        <span id="contact_no_error" class="text-danger"></span>
                        <br>
                        
                        <center><label for="email" class="label_color">E-mail:</label></center>
                        <input type="email" id="email" name="email" class="form-control">
                        <span id="email_error" class="text-danger"></span>
                        <br>
                        
                        <center><input type="submit" name="register" value="Add" style="background-color: #FF0033; color: white" class="btn btn-default"/>
                        <input type="reset" name="reset" value="Reset" style="background-color: #FF0033; color: white" class="btn"/></center>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
        <script>
	 	$(document).ready(function(){
		 	$.ajax({
				type: "POST",
				url: "get_city.php",
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
				url: "get_city.php",
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
                    var name=document.getElementById('guest_name').value;
                    var address=document.getElementById('guest_address').value;
                    var mobileno=document.getElementById('contact_no').value;
                    var email=document.getElementById('email').value;
                    

                    var unamecheck=/^[A-Za-z ]+$/;
                    var mnocheck=/^[987][0-9]+$/;
                    var emailcheck=/^([0-9a-zA-Z_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

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

                        //Address condition
                        if(address=="")
                        {
                            document.getElementById("address_error").innerHTML="this field is required";
                            return false;
                        }
                        else{
                            document.getElementById("address_error").innerHTML="";
                        }
                        
                        //mobile number condition
                        if(mobileno=="")
                        {
                            document.getElementById("contact_no_error").innerHTML="this field is required";
                            return false;
                        }
                        if(mobileno.length!=10){
                            document.getElementById("contact_no_error").innerHTML="mobile no must be of 10 digit";
                            return false;
                        }
                        if(!mnocheck.test(mobileno))
                        {
                            document.getElementById("contact_no_error").innerHTML="mobile no is invalid";
                            return false;
                        }
                        else{
                            document.getElementById("contact_no_error").innerHTML="";
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
                    }
	 </script>
    </body>
</html>
<?php
    include_once './footer.php';
?>