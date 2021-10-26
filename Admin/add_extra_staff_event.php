<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './admin_header.php';
    include_once '../connection.php';  
    
    if(isset($_REQUEST['tid']))
    {
        $team_id = $_REQUEST['tid'];
    }
    if(isset($_REQUEST['ceid']))
    {
        $customer_event_id = $_REQUEST['ceid'];
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="col-md-2"></div>
        <div class="col-md-10">
        <br>
        <center><h1 style="color: #FF0033">Staff</h1></center>
        <br>
        <div class="container-fluid">
            <form action="add_extra_staff_event_source.php" method="post">
                <input type="hidden" name="customer_event_id" value="<?php echo $customer_event_id;?>">
                <input type="hidden" name="team_id" value="<?php echo $team_id;?>">
            <hr>
            <table class="table table-condensed table-hover">
             <thead>
             <tr>
             <th>Select</th>
             <th>Photo</th>
             <th>Name</th>
             <th>Designation</th>
             </tr>
             </thead>
             <tbody>
             <tr>
             <?php
             
             $query = "SELECT * FROM `tbl_staff`  WHERE `status` = 'Active'";
             $result = mysqli_query($conn,$query);

             while($test = mysqli_fetch_assoc($result))
             {
                 $staff_id = $test['staff_id'];
                 
                $check_query = "SELECT COUNT(1) FROM `tbl_event_team` WHERE `staff_id` = '$staff_id' AND `team_id` = '$team_id' AND `customer_event_id` = '$customer_event_id'";
                $check_result = mysqli_query($conn, $check_query);
                $check_row = mysqli_fetch_row($check_result);
                        
                        if(!$check_row[0] >= 1)
                        {
                            echo "<td><center><input type='checkbox' name='staff_list[]' value=".$test['staff_id']."/></center></td>" ; 
                            echo"<td><img src=".$test['picture_path']." height='200' width='200' class='img-rounded'/></td>"; 
                            echo"<td>".$test['name']."</td>"; 
                            echo"<td>".$test['designation']."</td>";
                        }
                        echo "</tr>";
             }
             
             ?>
            </table>
            <center><input type="submit" name="add_team" id="add_team" class="btn btn-success" value="Add Team"/></center>
            <br><br><br>
            </form>
        </div>
        </div>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>
