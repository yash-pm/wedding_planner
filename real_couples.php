<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Real Couples</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <style type="text/css">
      .my-img a {
        display: inline-block;
        margin: 10px;
        border: 2px solid #CCC;
      }
      .my-img a:hover {
        border: 2px solid #45AFFF;
      }    
      .modal-lg {
        width: 50%;
      }
      .modal-body {
        overflow: auto;
        max-height: auto;
      }
    </style>
    </head>
    <body>
        <br>
        <div class="container">
            <center><h1>Couple Photos</h1></center>
            
            <div class="row">
              <div class="col-xs-12 my-img">
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_1.jpg" id="img1" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_2.jpg" id="img2" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_13.jpg" id="img3" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_4.jpg" id="img4" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_5.jpg" id="img5" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_6.jpg" id="img6" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_7.jpg" id="img7" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_8.jpg" id="img8" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_9.jpg" id="img9" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_10.jpg" id="img10" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_11.jpg" id="img11" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_23.jpg" id="img12" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_14.jpg" id="img13" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_15.jpg" id="img14" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_18.jpg" id="img15" class="img-responsive" width="250px">
                </a>
                <a href="#" id="link1" data-toggle="modal" data-target="#myModal">
                    <img src="images/couple_21.jpg" id="img16" class="img-responsive" width="250px">
                </a>
            </div>
        
     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h3 class="modal-title">Real Couples</h3></center>
        </div>
        <div class="modal-body" id="showImg">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
                <br><br>
      
      <script type="text/javascript">
      $(document).ready(function() {
        $('img').on('click', function() {
          $("#showImg").empty();
          var image = $(this).attr("src");
          $("#showImg").append("<img class='img-responsive' src='" + image + "' />")
          //alert(image);
        })
      });
    </script>
    </body>
</html>
