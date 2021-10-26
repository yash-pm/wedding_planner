<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './admin_header.php';
    include_once '../connection.php';
    
    if(isset($_REQUEST['eid']))
    {
        $customer_event_id = $_REQUEST['eid'];
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
        <center><h1 style="color: #FF0033">Events</h1></center>
        <br>
        <div class="container-fluid">
            <form action="create_event_team_source.php" method="post">
                <input type="hidden" name="customer_event_id" value="<?php echo $customer_event_id?>">
            <hr>
            <center><label for="team_type" class="label_color">Select Team:</label></center>
            <select id="team_type" name="team_type" style="border-color:#ccc" class="btn col-md-12" >
                <?php
                    $team_query = "SELECT * FROM `tbl_team`";
                    $team_result = mysqli_query($conn,$team_query);

                    while($team_row = mysqli_fetch_array($team_result))
                    {
                        $team_id=$team_row['team_id'];
                        $team_type=$team_row['team_type'];
                        
                        $customer_event_query = "SELECT COUNT(1) FROM `tbl_event_team` WHERE `team_id` = '$team_id' AND `customer_event_id` = '$customer_event_id'";
                        $customer_event_result = mysqli_query($conn, $customer_event_query);
                        $customer_event_row = mysqli_fetch_row($customer_event_result);
                        
                        if(!$customer_event_row[0] >= 1)
                        {
                            echo "<option value=".$team_id.">".$team_type."</option>";
                        }
                        
                    }
                ?>
            </select>
            <br><br><br>
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
             
             $query = "SELECT * FROM `tbl_staff` WHERE `status` = 'Active'";
             $result = mysqli_query($conn,$query);

             while($test = mysqli_fetch_assoc($result))
             {
                echo "<td><center><input type='checkbox' name='staff_list[]' value=".$test['staff_id']."></center></td>" ; 
                echo"<td><img src=".$test['picture_path']." height='200' width='200' class='img-rounded'/></td>"; 
                echo"<td>".$test['name']."</td>"; 
                echo"<td>".$test['designation']."</td></tr>";
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
