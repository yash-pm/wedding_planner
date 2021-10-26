<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './surfure_header.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <center><h1 style="color: #FF0033">Registration</h1></center>
                    <hr>
                    <br>
                    <form action="insert_data.php" method="post" onsubmit="return validation()">
                        <!--<center><label for="user_name" class="label_color">Name:</label></center>-->
                        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter Your Name">                        
                        <span id="nameerr" class="text-danger"></span>
                        <br>
                                                        
                        <!--<center><label for="user_contact_no" class="label_color">Contact No:</label></center>-->
                        <input type="text" id="user_contact_no" name="user_contact_no" class="form-control" placeholder="Enter Your Contact No.">
                        <span id="mobileerr" class="text-danger"></span>
                        <br>
                                                        
                        <!--<center><label for="user_email" class="label_color">E-mail:</label></center>-->
                        <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Enter Your E-Mail Address">
                        <span id="emailerror" class="text-danger"></span>
                        <br>
                                                        
                        <!--<center><label for="user_address" class="label_color">Address:</label></center>-->
                        <textarea id="user_address" name="user_address" class="form-control" rows="5" placeholder="Enter Your Address"></textarea>
                        <span id="addresserror" class="text-danger"></span>
                        <br>
                                                        
                        <!--<center><label for="state" class="label_color">Select State:</label></center>-->
                        <select id="state" name="state" style="border-color:#ccc" class="btn col-md-12" onchange="getCity()">
                            <?php
                            
                                    include './connection.php';
    
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
                                                        
                        <!--<center><label for="user_city" class="label_color">City:</label></center>-->
                        <select id="cityList" name="city" style="border-color:#ccc" class="btn col-md-12">
                           <option value="">Select state first</option>
                        </select>
                            
                        </select>
                        <br><br>
                                                        
                        <!--<center><label for="user_password" class="label_color">Password:</label></center>-->
                        <input type="password" id="userpassword" name="user_password" class="form-control" placeholder="Enter Your Password">
                        <span id="passworderror" class="text-danger"></span>
                        <br>
                                                        
                        <!--<center><label for="user_re_password" class="label_color">Re-Password:</label></center>-->
                        <input type="password" id="user_re_password" name="user_re_password" class="form-control" placeholder="Re-Enter Your Password">
                        <span id="cpassworderr" class="text-danger"></span>
                        <br>
                                                        
                        <center><input type="submit" name="register" value="Register" style="background-color: #FF0033; color: white" class="btn btn-default"/>
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
        var pass=document.getElementById('userpassword').value;
        var cpass=document.getElementById('user_re_password').value;
        var address=document.getElementById('user_address').value;
        
        
        var unamecheck=/^[A-Za-z ]+$/;
        var mnocheck=/^[987][0-9]+$/;
        var emailcheck=/^([0-9a-zA-Z_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
        
            //name condition
            if(name=="")
            {
                document.getElementById("nameerr").innerHTML="this field is required";
                return false;
            }
            if(!unamecheck.test(name))
            {
                document.getElementById("nameerr").innerHTML="Only character are allowed";
                return false;
            }
            else{
                document.getElementById("nameerr").innerHTML="";
            }
            
            //mobile number condition
            if(mobileno=="")
            {
                document.getElementById("mobileerr").innerHTML="this field is required";
                return false;
            }
            if(mobileno.length!=10){
                document.getElementById("mobileerr").innerHTML="mobile no must be of 10 digit";
                return false;
            }
            if(!mnocheck.test(mobileno))
            {
                document.getElementById("mobileerr").innerHTML="mobile no is invalid";
                return false;
            }
            else{
                document.getElementById("mobileerr").innerHTML="";
            }
            
            //email condition
            if(email=="")
            {
                document.getElementById("emailerror").innerHTML="this field is required";
                return false;
            }
            if (!emailcheck.test(email)) {
                document.getElementById("emailerror").innerHTML="email format is invalid";
                return false;
            }
            else{
                document.getElementById("emailerror").innerHTML="";
            }
            
            //confirm password condition
            if(address=="")
            {
                document.getElementById("addresserror").innerHTML="this field is required";
                return false;
            }
            else{
                document.getElementById("addresserror").innerHTML="";
            }
            
            //password condition
            if(pass=="")
            {
                document.getElementById("passworderror").innerHTML="this field is required";
                return false;
            }
            if(pass.length<6 || pass.length>20)
            {
                document.getElementById("passworderror").innerHTML="password length must be between 6 and 20";
                return false;
            }
            else{
                document.getElementById("passworderror").innerHTML="";

            }

            //confirm password condition
            if(cpass=="")
            {
                document.getElementById("cpassworderr").innerHTML="this field is required";
                return false;
            }
            if(pass!=cpass)
            {
                document.getElementById("cpassworderr").innerHTML="Both password not matched";
                return false;
            }
            else{
                document.getElementById("cpassworderr").innerHTML="";
            }
            
        }
	 </script>
    </body>
</html>
<?php
include_once './footer.php';

?>
