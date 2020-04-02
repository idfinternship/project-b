<?php 
  require("login_session.php");
  require('navbar.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TraveLog test</title>

    <script src="js/three.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/gio.js"></script>     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="css/common.css">
<!-- NavBar-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script defer src="js/theme.js"></script>
<link rel="stylesheet" href="css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet"/>

<!-- Info lenteles salim -->
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        #globalArea {

            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        #infoBoard {

            position: absolute;
            left: 26%;
            top: 20%; 
            width: 50%;
            height: 50%;
            line-height: 50px;
            text-align: center;
            color: white;
            font-size: 20px;
            background-color: rgba(106, 107, 111, 0.6);
            display: none;
        }
/* Pasirinktos šalies teksto laukas */
        #countryArea {

            width: 100%;
            height: 10%;
        }
        
        .alert-close {
	       background: rgba(255,255,255,0.1);
	        -webkit-border-radius: 50%;
	        -moz-border-radius: 50%;
      	  -ms-border-radius: 50%;
	        -o-border-radius: 50%;
      	  border-radius: 50%;
	        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4),inset 0 -1px 2px rgba(255,255,255,0.25);
	        -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4),inset 0 -1px 2px rgba(255,255,255,0.25);
	        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4),inset 0 -1px 2px rgba(255,255,255,0.25);
	        color: #FFFFFF;
	        cursor: pointer;
	        font-size: 18px;
	        font-weight: normal;
	        height: 22px;
	        line-height: 24px;
	        position: absolute;
        	right: 11px;
	        text-align: center;
	        top: 9px;
	        -webkit-transition: color 0.2s ease-in-out;
	        -moz-transition: color 0.2s ease-in-out;
	        -o-transition: color 0.2s ease-in-out;
          transition: color 0.2s ease-in-out;
	        width: 22px;
}



</head>
<body>
  
    </style>

    <div id="globalArea"></div>
<div id="infoBoard">
    <div class="alert-close">×</div>
    <div id="countryArea"></div>
    <font size="4" face="Calibri">
  <table class = "table table-responsive" style = "max-height: 90%">
  <thead>
   <tr><th>Kaina</th><th>Trukmė</th></tr>
  </thead>
   <tbody id="testas">
   </tbody>
  </table>

  <!-- Lentelės išjungimo scriptas -->
<script>
            $(document).ready(function(c) {
	          $('.alert-close').on('click', function(c){
		        $(this).parent().fadeOut('slow', function(c){
		    });
	  });	
});
</script>
<script src="js/countryselect.js"></script>
</body>
</html>