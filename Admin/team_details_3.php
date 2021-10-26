<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './admin_header.php';
    include_once '../connection.php';  
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
        <table class="table table-condensed table-hover">
        <thead>
            <th>Teams</th>
        </thead>
        <tbody>
        <tr>
        <?php
        
            if(isset($_REQUEST['ceid']))
            {
                $customer_event_id = $_REQUEST['ceid'];
            }
            
            $event_query = "SELECT DISTINCT tbl_team.team_type,tbl_event_team.team_id FROM `tbl_event_team` INNER JOIN `tbl_team` ON tbl_event_team.team_id=tbl_team.team_id WHERE tbl_event_team.customer_event_id='$customer_event_id'";
            $event_result = mysqli_query($conn,$event_query);
            while ($event_row = mysqli_fetch_assoc($event_result))
            {
                echo "<td>".$event_row['team_type']."</td>";
                echo "<td><center><a href='team_details_4.php?tid=".$event_row['team_id']."&ceid=".$customer_event_id."'><button class='btn btn-success'>Show</button></a></center></td>";   
                echo "</tr>";
            }
        ?>
        </tbody>
        </table>
        </div>
        </div>
    </body>
</html>
<?php
    include_once './admin_footer.php';
?>

