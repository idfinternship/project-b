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
	<?php require('style.php'); ?>
	
</head>
<body>
	<?php require("navbar.php") ?>
	<div id="globalArea"></div>
	<script src="js/countryselect.js"></script>
</body>
</html>