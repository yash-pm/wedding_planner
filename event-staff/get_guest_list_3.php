<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './staff_header.php';
    include_once '../connection.php';
    
    if(isset($_REQUEST['ceid']))
    {
        $customer_event_id = $_REQUEST['ceid'];
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<meta http-equiv="refresh" content="5">-->
        <title></title>
    </head>
    <body>
        <div class="col-md-2"></div>
        <div class="col-md-10">
        <br>
        <center><h1>Guest List</h1></center>
        <br>
        <div class="container-fluid">
            <hr>
            <input type="hidden" name="customer_event_id" value="<?php echo $customer_event_id;?>">
            <table class="table table-condensed table-hover">
            <thead>
                <th>Name</th>
                <th>Contact No.</th>
                <th>City</th>
            </thead>
            <tbody>
                <tr>
                    <?php
                    
                        $get_guest_query = "SELECT `guest_id` FROM `tbl_event_guest` WHERE `event_id` = '$customer_event_id'";
                        $get_guest_result = mysqli_query($conn, $get_guest_query);
                        while($get_guest_row = mysqli_fetch_assoc($get_guest_result))
                        {
                            $guest_id = $get_guest_row['guest_id'];
                            
                            $guest_query = "SELECT * FROM `tbl_guest` WHERE `guest_id` = '$guest_id'";
                            $guest_result = mysqli_query($conn,$guest_query);
                            while ($guest_row = mysqli_fetch_assoc($guest_result))
                            {
                                $city_id = $guest_row['city_id'];
                                
                                $city_query = "SELECT `city_name` FROM `city_master` WHERE `city_id` = '$city_id'";
                                $city_result = mysqli_query($conn, $city_query);
                                
                                echo "<td>".$guest_row['name']."</td>";
                                echo "<td>".$guest_row['contact_no']."</td>";
                                while($city_row = mysqli_fetch_assoc($city_result))
                                {
                                    echo "<td>".$city_row['city_name']."</td>";
                                }
                                $status = $guest_row['status'];
                    
                                echo "<td><center><span class='glyphicon glyphicon-ok btn btn-success'><input type='hidden' value=".$guest_row['guest_id'].".".$customer_event_id." id='guest_id".$guest_row['guest_id']."' name='guest_id".$guest_row['guest_id']."' onClick='get_click(this.id)'></span></center></td>";
                            }
                            echo "</tr>";
                        }
                    ?>
            </tbody>
        </table>
        </div>
        </div>
        <script>
            function get_click(clicked){
            if ($('#'+clicked).is(":clicked")) {
                alert('hello');
                var val=$('#'+clicked).val();
                alert(val);
                /*$.ajax({
			type : "POST",
			url : "change_staff_status.php",
			data:'staff_id='+val,
			success: function(data){
                            html(data)
			}
			});*/
            }
        }
        </script>
    </body>
</html>
<?php
    include_once './staff_footer.php';
?>
