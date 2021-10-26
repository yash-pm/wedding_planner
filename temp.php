<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
       <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
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
             
             $query = "SELECT * FROM `tbl_staff`";
             $result = mysqli_query($conn,$query);

             while($test = mysqli_fetch_assoc($result))
             {
                 $staff_status = $test['status'];
                 $temp_city_id = $test['city_id'];
                 $city_query = "SELECT `city_name`, `state_id` FROM `city_master` WHERE `city_id` = '$temp_city_id'";
                 $city_result = mysqli_query($conn, $city_query);
                 
                echo"<td><img src='Admin/".$test['picture_path']."' height='200' width='200' class='img-rounded'/></td>"; 
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
                $cnt=0;
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
        <script>
            function get_click(clicked){
            if ($('#'+clicked).is(":checked")) {
                var val=$('#'+clicked).val();
                $.ajax({
			type : "POST",
			url : "Admin/change_staff_status.php",
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
			url : "Admin/change_staff_status.php",
			data:'staff_id='+val,
			success: function(data){
                            html(data)
			}
			});
            }
        }
        </script>
        <?php
        /*
            include_once './connection.php';
            
            $venue_query =  "SELECT * FROM `tbl_venue`";
            $venue_result = mysqli_query($conn, $venue_query);
            
            while ($venue_row = mysqli_fetch_assoc($venue_result))
            {
                
                $picture_path = $venue_row['picture_path'];
                $name = $venue_row['name'];
                $address = $venue_row['address'];
                $capacity = $venue_row['capacity'];
                $price = $venue_row['price'];
            
                echo "<div class='container'>
                    <div class='row'>
            <div class='col-md-3'>
                <img src='Admin/".$picture_path."' alt='' height='200' width='280' class='img-rounded'/>
            </div>
            <div class='col-md-4'>
                <h2 class='label_color'>".$name."</h2>
                <br>
                <address>
                    <span class='glyphicon glyphicon-map-marker'></span>&nbsp;
                    ".$address."
                </address>
            </div>  
            <div class='col-md-3'>
                <br><br>
                <center>
                    <h3 class='label_color'><i class='fas fa-male' style='font-size:36px'></i> Capacity</h3>
                    <p>".$capacity." Peoples</p>
                    <br>
                    <h3 class='label_color'><i class='fas fa-rupee-sign' style='font-size:30px'></i> Price</h3>
                    <p>".$price." /- </p>
                </center>
            </div>
            <div class='col-md-2'>
                <br><br><br>
                <center><button class='btn' style='background-color:#ff0033; color:white'>Select &nbsp;<input type='radio' class='' name='venue'/></button></center>
            </div>
        </div>
        </div>
        <br>"; 
            } */
        ?>
        
        <!--<div class="container">
            <center><h1>Venues</h1></center>
            <hr>
        <div class="row">
            <div class="col-md-3">
                <img src="Admin/venue_photo/3485lavender-bough-ghatkopar-east-mumbai-3.jpg" alt="" height="200" width="280" class="img-rounded"/>
            </div>
            <div class="col-md-3">
                <h1 class="label_color">Lavender</h1>
                <br>
                <address>
                    <span class="glyphicon glyphicon-map-marker"></span>&nbsp;
                    Royal Dine Restaurant, 1st Floor Royal Platinum,<br> 
                    Canal Road, Above Bank of Baroda, Palanpur Gam,<br> 
                    Surat, Gujarat 395009
                </address>
            </div>  
            <div class="col-md-4">
                <br><br>
                <center>
                    <h3 class="label_color"><i class='fas fa-male' style='font-size:36px'></i> Capacity</h3>
                    <p>500</p>
                    <br>
                    <h3 class="label_color"><i class='fas fa-rupee-sign' style='font-size:30px'></i> Price</h3>
                    <p>500000</p>
                </center>
            </div>
            <div class="col-md-2">
                <br><br><br>
                <center><button class="btn btn-success">Select &nbsp;<input type="radio" class="" name="venue"/></button></center>
            </div>
        </div>
            <br>
            
            <div class="row">
            <div class="col-md-3">
                <img src="Admin/venue_photo/7959royal-dine-restaurant-pal-gam-surat-1.jpg" alt="" height="200" width="280" class="img-rounded"/>
            </div>
            <div class="col-md-3">
                <h1 class="label_color">Royal Dine</h1>
                <br>
                <address>
                    <span class="glyphicon glyphicon-map-marker"></span>&nbsp;
                    Royal Dine Restaurant, 1st Floor Royal Platinum,<br> 
                    Canal Road, Above Bank of Baroda, Palanpur Gam,<br> 
                    Surat, Gujarat 395009
                </address>
            </div>
            <div class="col-md-4">
                <br><br>
                <center>
                    <h3 class="label_color"><i class='fas fa-male' style='font-size:36px'></i> Capacity</h3>
                    <p>500</p>
                    <br>
                    <h3 class="label_color"><i class='fas fa-rupee-sign' style='font-size:30px'></i> Price</h3>
                    <p>500000</p>
                </center>
            </div>
            <div class="col-md-2">
                <br><br><br>
                <center><button class="btn btn-success">Select &nbsp;<input type="radio" class="" name="venue"/></button></center>
            </div>
        </div>
            
            <br>
            <div class="row">
            <div class="col-md-3">
                <img src="Admin/venue_photo/7959royal-dine-restaurant-pal-gam-surat-1.jpg" alt="" height="200" width="280" class="img-rounded"/>
            </div>
            <div class="col-md-3">
                <h1 class="label_color">Royal Dine</h1>
                <br>
                
                <address>
                    <span class="glyphicon glyphicon-map-marker"></span>&nbsp;
                    Royal Dine Restaurant, 1st Floor Royal Platinum,<br> 
                    Canal Road, Above Bank of Baroda, Palanpur Gam,<br> 
                    Surat, Gujarat 395009
                </address>
            </div>
            <div class="col-md-4">
                <br><br>
                <center>
                    <h3 class="label_color"><i class='fas fa-male' style='font-size:36px'></i> Capacity</h3>
                    <p>500</p>
                    <br>
                    <h3 class="label_color"><i class='fas fa-rupee-sign' style='font-size:30px'></i> Price</h3>
                    <p>500000</p>
                </center>
            </div>
            <div class="col-md-2">
                <br><br><br>
                <center><button class="btn btn-success">Select &nbsp;<input type="radio" class="" name="venue"/></button></center>
            </div>
        </div>
        </div>-->
    </body>
</html>
