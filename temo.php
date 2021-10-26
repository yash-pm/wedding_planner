<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--<html>
    <head>
        
        <title></title>
        <style>
            .content{
                position: relative;
                width: 100%;
                text-align: center;
            }
            .buttons {
                position: absolute;
                top: 180px;
                text-align: center;
                width: 100%;
              }
            .btn {
                width: 50px;
                height: 30px;
              }
            .step-wizard {
                display: inline-block;
                position: relative;
                width: 85%;
            }
            .step-wizard .progress {
                position: absolute; 
                top: 43px;
                left: 12.5%;
                width: 75%;
              }
            .progressbar {
                position: absolute;
                background-color: #ff0033;
                opacity: 0.4;
                height: 12px;
                border: 1px solid #ff0033;
                width: 0%;
                -webkit-transition: width 0.6s ease;
                -o-transition: width 0.6s ease;
                transition: width 0.6s ease;
            }
            .progressbar .empty {
                opacity: 1;
                width: 100%;
                background-color: #fff;
              }
            ul {
                position: absolute;
                width: 100%;
                list-style-type: none;
                padding: 0;
                left: -2%
              }
              li {
                display: inline-block;
                text-align: center;
                width: 24.7%;
              }
              li .step {
                position: absolute;
                display: inline-block;
                line-height: 30px;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                border: 4px solid;
                border-color: #ff0033;
                background: #fff;
                -webkit-transition: background-color 0.6s ease, border-color 0.6s ease;
                -o-transition: background-color 0.6s ease, border-color 0.6s ease;
                transition: background-color 0.6s ease, border-color 0.6s ease; 
              }
              li .title {
                position: absolute;
                width: 100%;
                left: 20px;
                padding-top: 42px;
                color: #ff0033;
                -webkit-transition: color 0.6s ease;
                -o-transition: color 0.6s ease;
                transition: color 0.6s ease; 
              }
              li .active {
                .step {
                  border-color: #ff0033;
                 background: #ff0033;
                }
                .title {
                  color: #ff0033;
                }
              }
              li .done .step {
                color: white;
                background-color: #ff0033;
                border-color: #ff0033;
              }
              li a {
                display: block;
                width: 100%;
                color: black;
                position: relative;
                text-align: center;
              }
              li a :hover {
        .step {
          border-color: #ff0033; 
        }
        .title {
          color: black;
        }
        
        
@media only screen and (max-width: 1200px) {
  .step-wizard li {
    width: 24%;
  }
}

@media only screen and (max-width: 375px) {
  .step-wizard li {
    width: 22%;
  }
        </style>
    </head>
    <body>
        <div class="content">
  <div class="step-wizard">
    <div class="progress">
      <div class="progressbar empty"></div>
      <div id="prog" class="progressbar"></div>
    </div>
    <ul>
      <li class="active">
        <a href="#" id="step1">
          <span class="step">1</span>
          <span class="title">Client Details</span>
        </a>
      </li>
      <li class="">
        <a href="#" id="step2">
          <span class="step">2</span>
          <span class="title">Brand Details</span>
        </a>
      </li>
      <li class="">
        <a href="#" id="step3">
          <span class="step">3</span>
          <span class="title">Shift Details</span>
        </a>
      </li>
      <li class="">
        <a href="#" id="step4">
          <span class="step">4</span>
          <span class="title">Confirmation</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="buttons">
    <button class="btn" id="prev">prev</button>
    <button class="btn" id="next">next</button>
  </div>
</div>
        <script>
            $(document).ready(function() {
  function setClasses(index, steps) {
    if (index < 0 || index > steps) return;
    if(index == 0) {
      $("#prev").prop('disabled', true);
    } else {
      $("#prev").prop('disabled', false);
    }
    if(index == steps) {
      $("#next").text('done');
    } else {
      $("#next").text('next');
    }
    $("ul li").each(function() {
      $(this).removeClass();
    });
    $("ul li:lt(" + index + ")").each(function() {
      $(this).addClass("done");
    });
    $("ul li:eq(" + index + ")").addClass("active")
    var p = index * (100 / steps);
    $("#prog").width(p + '%');
  }
  $(".step-wizard ul a").click(function() {
    var step = $(this).find("span.step")[0].innerText;
    var steps = $(".step-wizard ul li").length;
    setClasses(step - 1, steps - 1)
  });
  $("#prev").click(function(){
    var step = $(".step-wizard ul li.active span.step")[0].innerText;
    var steps = $(".step-wizard ul li").length;    
    setClasses(step - 2, steps - 1);
  });
  $("#next").click(function(){
    if ($(this).text() == 'done') {
      alert("submit the form?!?")
    } else {
      var step = $(".step-wizard ul li.active span.step")[0].innerText;
      var steps = $(".step-wizard ul li").length;    
      setClasses(step, steps - 1);
    }
  });
  
  // initial state setup
  setClasses(0, $(".step-wizard ul li").length);
});
        </script>
    </body>
</html>-->
<html>
    <head>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
        <div class="panel-group">
    <div class="panel panel-danger col-md-3">
      <div class="panel-heading">input</div>
      <div class="form-group">
          <label>NAme:</label>
          <input type="text" class="form-control"/>
          <label>NAme:</label>
          <input type="text" class="form-control"/>
          <label>NAme:</label>
          <input type="text" class="form-control"/>
      </div>
    </div>
            <div class="panel panel-danger col-md-3">
      <div class="panel-heading">input</div>
      <div class="form-group">
          <label>NAme:</label>
          <input type="text" class="form-control"/>
          <label>NAme:</label>
          <input type="text" class="form-control"/>
          <label>NAme:</label>
          <input type="text" class="form-control"/>
      </div>
    </div>
        </div></div>
<script type="text/javascript">
		$(document).ready(function(){
			$(".form-group").hide();
		});
		$(document).ready(function(){
  $(".panel-heading").click(function(){
    $(".form-group").toggle();
  });
});
	</script>
    </body>
</html>