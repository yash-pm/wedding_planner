<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include_once './surfure_header.php';
    include_once './connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .panel-style{
                background-color: #ff0033;
                color: white;
            }
        </style>
    </head>
    <body>
        <br><br>
        <div class="container">
            <center>
                <h1 style="color: #ff0033">Meet Our Customers</h1>
                <br>
                <h3>Meet our wonderful customers and learn the magical journey they went through, with us.</h3>
                <br>
            </center>
            <hr>
        <?php
                $get_query = "SELECT * FROM `tbl_feedback`";
                $get_result = mysqli_query($conn, $get_query);
                while($get_row = mysqli_fetch_assoc($get_result))
                {
                    $user_id = $get_row['customer_id'];
                    $comment = $get_row['comment'];
                    
                    $name_query = "SELECT * FROM `customer_registration` WHERE `user_id` = '$user_id'";
                    $name_result = mysqli_query($conn, $name_query);
                    while($name_row = mysqli_fetch_assoc($name_result))
                    {
                        $name = $name_row['name'];
                    }
                    echo "<div class='col-md-6'><div class='panel' id='panel'>
                            <div class='panel-heading panel-style' id='panel-head'>$name</div>
                            <div class='panel-body' id='panel-body' style='background-color: #ffe6eb'>
                                <h4>$comment</h4>
                            </div>
                        </div></div>";
                }
            ?>
        </div>
    </body>
</html>
<?php
    include_once './footer.php';
?>