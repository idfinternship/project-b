<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Country Selection</title>
	<script src="js/jquery-1.12.4.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/three.min.js"></script>
    <script src="js/gio.js"></script>
	<link rel="stylesheet" href="css/StyleListings.css">
	<link rel="stylesheet" href="css/search.css">
	<?php require('style.php'); ?>
	
</head>
<body>
	<?php require("navbar.php") ?>
	<div id="globalArea"></div>

	<div id="selectedList">
	    <strong>
	        <div id="title">Selected Countries List</div>
	    </strong>
	    <div class="table-responsive">
	    	<table class = "table table-dark table-hover table-bordered table-striped">
	        <thead id="infoTHead">
	        	<tr>
	        		<th class='th-lg'>Country</th>
	        	</tr>
	        </thead>
	        <tbody id="testas"></tbody>
	    	</table>
	    	<button class="btn btn-primary" id="saveCountries">Select</button>
	    </div>
	    
	</div>

	<input id="textbox" type="text" name="myCountry" placeholder="Country">
	<div id="search">Search</div>

	<script src="js/search.js"></script>
    <script src="js/searchPress.js"></script>
    <script src="js/autocomplete.js"></script>
	<script src="js/CloseButton.js"></script>
	<script src="js/countrysave.js"></script>

</body>
</html>