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
        <title>Show Venues</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="col-md-2"></div>
        <div class="col-md-10">
        <br>
        <center><h1 style="color: #FF0033">Hall Details</h1></center>
        <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <label for="title" style="float: right; font-size: 20px">Search By:</label>
                </div>
                <div class="col-md-2">
                    <select id="venue_type" name="venue_type" style="border-color:#ccc" class="btn col-md-12" onchange="getVenues()">
                        <option value="1">Banquet Hall</option>
                        <option value="2">Plote</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" id="myInput" class="form-control" placeholder="Search" onkeyup="myFunction()"/>
                </div>
                <div class="col-md-4"></div>
            </div>
         <br>   
        
        <div class="container-fluid">
            <div id="venue_response">

            </div>
        </div>
        <br><br>
        <script>
	 	$(document).ready(function(){
		 	$.ajax({
				type : "POST",
				url : "admin_get_venues.php",
				data:'type_id='+document.getElementById('venue_type').value,
				success: function(data){
					$("#venue_response").html(data);
				}
			});
		});
                function getVenues(){
			$.ajax({
				type : "POST",
				url : "admin_get_venues.php",
				data:'type_id='+document.getElementById('venue_type').value,
				success: function(data){
					$("#venue_response").html(data);
				}
			});
		}
                function myFunction() {
                    $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                  });
                }
                
        </script>
        
    </body>
</html>
<?php
     include_once './admin_footer.php';
?>
