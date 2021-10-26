<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './staff_header.php';
    include_once '../connection.php';
    
    $temp_user = $_SESSION['user_email'];
    
    $show_staff_query = "SELECT * FROM `tbl_staff` WHERE `email` = '$temp_user'";
    $result_show_staff = mysqli_query($conn, $show_staff_query);
    
    while ($staff_row = mysqli_fetch_assoc($result_show_staff))
    {
        $uid = $staff_row['staff_id'];
        $name = $staff_row['name'];
        $address = $staff_row['address'];
        $gender = $staff_row['gender'];
        $contact_no = $staff_row['contact_no'];
        $email = $staff_row['email'];
        $picture_path = $staff_row['picture_path'];
        $temp_city_id = $staff_row['city_id'];
        
        
        $city_query = "SELECT `city_name`, `state_id` FROM `city_master` WHERE `city_id` = '$temp_city_id'";
        $city_result = mysqli_query($conn, $city_query);
        
        while ($row = mysqli_fetch_assoc($city_result))
        {
            $temp_state_id = $row['state_id'];
            $state_query = "SELECT `state_name` FROM `state_master` WHERE `state_id` ='$temp_state_id'";
            $state_result = mysqli_query($conn,$state_query);
                    
            while ($row1 = mysqli_fetch_assoc($state_result))
            {
                $state = $row1['state_name'];
            }
            $city = $row['city_name'];
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
        <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <center><h1>Edit Profile</h1></center>
                <hr>
                
                <div class="form-group">
                    <form action="edit_staff_profile_source.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">
                        <input type="hidden" name="picture_path" value="<?php echo $picture_path;?>">
                        <input type="hidden" name="uid" value="<?php echo $uid;?>">
                <div class="row">
                    <div class="col-md-6">
                        <center><label for="profile_picture" class="label_color">Profile Picture:</label></center>
                        <center><img src="<?php echo '../Admin/'.$picture_path;?>" class="img-circle" height="250" width="250">
                            <br><br>
                        <input type="file" name="image" id="image">
                        <br>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <center><label for="staff_name" class="label_color">Name:</label></center>
                                <input type="text" id="staff_name" name="staff_name" class="form-control" value="<?php echo $name;?>">
                                <span id="name_error" class="text-danger"></span>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <center><label for="staff_address" class="label_color">Address:</label></center>
                                <textarea id="staff_address" name="staff_address" class="form-control" rows="5"><?php echo $address;?></textarea>
                                <span id="address_error" class="text-danger"></span>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <center><label for="gender" class="label_color">Gender:</label></center>
                                <center><h5><input type="radio" id="gender" name="gender" value="Male" checked="checked">&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="gender" name="gender" value="Fe-Male">&nbsp;Fe-Male</h5></center>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                        
                <div class="row">
                    <div class="col-md-12">
                        <center><label for="contact_no" class="label_color">Contact No:</label></center>
                        <input type="text" id="contact_no" name="contact_no" class="form-control" value="<?php echo $contact_no;?>">
                        <span id="contact_error" class="text-danger"></span>
                        <br>
                        
                        <center><label for="email" class="label_color">E-mail:</label></center>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $email;?>">
                        <span id="email_error" class="text-danger"></span>
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
                                    if($state_name == $state)
                                    {
                                        echo "<option value=".$state_id." selected='selected'>".$state_name."</option>";
                                    }
                                    else 
                                    {
                                     echo "<option value=".$state_id.">".$state_name."</option>";   
                                    }
                                }
                            ?>
                        </select>
                        <br><br>
                                                        
                        <center><label for="city" class="label_color">Select City:</label></center>
                        <select id="cityList" name="city" style="border-color:#ccc" class="btn col-md-12">
                           <option value="">Select state first</option>
                        </select>
                        <br><br>
                        
                    </div>
                </div>
                        <br>
                      <center><input type="submit" name="register" value="Update" style="background-color: #FF0033; color: white" class="btn btn-default"/>
                        <input type="reset" name="reset" value="Reset" style="background-color: #FF0033; color: white" class="btn"/></center>  
                </form>
                </div>
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
                
                
                function validation(){
        var name=document.getElementById('staff_name').value;
        var address=document.getElementById('staff_address').value;
        var contact_no=document.getElementById('contact_no').value;
        var email=document.getElementById('email').value;
        
        var unamecheck=/^[A-Za-z ]+$/;
        var emailcheck=/^([0-9a-zA-Z_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
        var mnocheck=/^[987][0-9]+$/;
        
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
        }
	 </script>
    </body>
</html>
<?php
    include_once './staff_footer.php';
?>
