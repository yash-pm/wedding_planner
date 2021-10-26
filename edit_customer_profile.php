<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './header.php';
    
    $temp_email = $_SESSION['user_email'];
    
    include_once './connection.php';
    
    $show_customer_query = "SELECT * FROM `customer_registration` WHERE `email` = '$temp_email'";
    $show_customer_result = mysqli_query($conn, $show_customer_query);
            
                         
            while ($customer_row = mysqli_fetch_assoc($show_customer_result))
            {
                $name = $customer_row['name'];
                $contact_no = $customer_row['contact_no'];
                $email = $customer_row['email'];
                $address = $customer_row['address'];
            }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Details</title>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <center><h1 style="color: #FF0033">Edit Details</h1></center>
                    <hr>
                    <br>
                    <form action="edit_customer_profile_source.php" method="post" onsubmit="return validation()">
                        <center><label for="user_name" class="label_color">Name:</label></center>
                        <input type="text" id="user_name" name="user_name" class="form-control" value="<?php echo $name;?>">
                        <span id="name_error" class="text-danger"></span>
                        <br>
                                                        
                        <center><label for="user_contact_no" class="label_color">Contact No:</label></center>
                        <input type="text" id="user_contact_no" name="user_contact_no" class="form-control" value="<?php echo $contact_no;?>">
                        <span id="contact_no_error" class="text-danger"></span>
                        <br>
                                                        
                        <center><label for="user_email" class="label_color">E-mail:</label></center>
                        <input type="email" id="user_email" name="user_email" class="form-control" value="<?php echo $email;?>">
                        <span id="email_error" class="text-danger"></span>
                        <br>
                                                        
                        <center><label for="user_address" class="label_color">Address:</label></center>
                        <textarea id="user_address" name="user_address" class="form-control" rows="5"><?php echo $address;?></textarea>
                        <span id="address_error" class="text-danger"></span>
                        <br>
                                                        
                        <center><label for="state" class="label_color">Select State:</label></center>
                        <select id="state" name="state" style="border-color:#ccc" class="btn col-md-12" onchange="getCity()">
                            <?php
    
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
                                                        
                        <center><label for="user_city" class="label_color">Select City:</label></center>
                        <select id="cityList" name="city" style="border-color:#ccc" class="btn col-md-12">
                           <option value="">Select state first</option>
                        </select>
                            
                        </select>
                        <br><br>
                                                  
                        <center><input type="submit" name="register" value="Change" style="background-color: #FF0033; color: white" class="btn btn-default"/>
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
                    var name=document.getElementById('user_name').value;
                    var mobileno=document.getElementById('user_contact_no').value;
                    var email=document.getElementById('user_email').value;
                    var address=document.getElementById('user_address').value;
                    

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
                        
                        //Address condition
                        if(address=="")
                        {
                            document.getElementById("address_error").innerHTML="this field is required";
                            return false;
                        }
                        else{
                            document.getElementById("address_error").innerHTML="";
                        }
                    }
	 </script>
        <?php
        // put your code here
        ?>
    </body>
</html>
