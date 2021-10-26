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
        <title>Staff Details</title>
        <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: green;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: red;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    </head>
    <body>
        <div class="col-md-2"></div>
        <div class="col-md-10">
        <br>
        <center><h1 style="color: #FF0033">Staff Details</h1></center>
        <br>
        <div class="container-fluid">
            <hr>
            <table class="table table-condensed table-hover">
             <thead>
             <tr>
             <th>Photo</th>
             <th>Name</th>
             <th>Address</th>
             <th>State</th>
             <th>City</th>
             <th>Gender</th>
             <th>Contact No.</th>
             <th>E-mail</th>
             <th>Designation</th>
             </tr>
             </thead>
             <tbody>
             <tr>
             <?php
             
             include_once '../connection.php';
             
             $query = "SELECT * FROM `tbl_staff`";
             $result = mysqli_query($conn,$query);

             while($test = mysqli_fetch_assoc($result))
             {
                 $staff_status = $test['status'];
                 $temp_city_id = $test['city_id'];
                 $city_query = "SELECT `city_name`, `state_id` FROM `city_master` WHERE `city_id` = '$temp_city_id'";
                 $city_result = mysqli_query($conn, $city_query);
                 
                echo"<td><img src=".$test['picture_path']." height='200' width='200' class='img-rounded'/></td>"; 
                echo"<td>".$test['name']."</td>";
                echo"<td>".$test['address']."</td>";
                
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
                
                echo"<td>".$test['gender']."</td>";
                echo"<td>".$test['contact_no']."</td>";
                echo"<td>".$test['email']."</td>";
                echo"<td>".$test['designation']."</td>";
                
                if($staff_status == 'Active')
                {
                    echo"<td><label class='switch'><input type='checkbox' value=".$test['staff_id']." id='staff_id".$test['staff_id']."' name='staff_id".$test['staff_id']."' onclick='get_click(this.id)'><span class='slider round'></span></label></td>";
                }
                else
                {
                    echo"<td><label class='switch'><input type='checkbox' value=".$test['staff_id']." id='staff_id".$test['staff_id']."' name='staff_id".$test['staff_id']."' onclick='get_click(this.id)' checked='checked'><span class='slider round'></span></label></td>";
                }
                    echo "</tr>";
             }
             
             ?>
            </table>
            </div>
        </div>
        
        <script>
            function get_click(clicked){
            if ($('#'+clicked).is(":checked")) {
                var val=$('#'+clicked).val();
                $.ajax({
			type : "POST",
			url : "change_staff_status.php",
			data:'staff_id='+val,
			success: function(data){
                            html(data)
			}
			});
            }
            else
            {
                var val=$('#'+clicked).val();
                $.ajax({
			type : "POST",
			url : "change_staff_status.php",
			data:'staff_id='+val,
			success: function(data){
                            html(data)
			}
			});
            }
        }
        </script>
    </body>
</html>
<?php
     //include_once './admin_footer.php';
?>

