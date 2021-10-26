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
        <center><h1 style="color: #FF0033">Events</h1></center>
        <br>
        <div class="container-fluid">
            <hr>
            <a href="add_extra_staff_event.php?ceid=<?php echo $customer_event_id; ?>&tid=<?php echo $team_id?>"><button class="btn btn-success">Add Staff</button></a>
            <br><br>
            <table class="table table-condensed table-hover">
             <thead>
             <tr>
             <th>Photo</th>
             <th>Name</th>
             <th>Designation</th>
             </tr>
             </thead>
             <tbody>
             <tr>
             <?php
             
             $query = "SELECT tbl_staff.picture_path,tbl_staff.name,tbl_staff.designation,tbl_event_team.staff_id,tbl_event_team.event_team_staff_id FROM `tbl_event_team` INNER JOIN `tbl_staff` ON tbl_event_team.staff_id=tbl_staff.staff_id WHERE tbl_event_team.customer_event_id='$customer_event_id' AND tbl_event_team.team_id='$team_id'";
             $result = mysqli_query($conn,$query);

             while($test = mysqli_fetch_assoc($result))
             {
                echo"<td><img src=".$test['picture_path']." height='200' width='200' class='img-rounded'/></td>"; 
                echo"<td>".$test['name']."</td>"; 
                echo"<td>".$test['designation']."</td>";
                echo"<td><a class='btn btn-danger' href='delete_staff_event.php?sid=".$test['event_team_staff_id']."'><span class='glyphicon glyphicon-trash'></span></a></td>";
                echo "</tr>";
             }
             
             ?>
            </table>
        </div>
        </div>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>

