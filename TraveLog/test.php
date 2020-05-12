<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");
	$query = "SELECT JSON_ARRAYAGG(JSON_OBJECT('id', id, 'name', name)) from country";
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_row($result);
	echo $data;
 ?>