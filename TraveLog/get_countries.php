<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");

	$query = "SELECT country_id AS ISOCode, name FROM user_has_country 
	LEFT JOIN country ON country.id = user_has_country.country_id 
	WHERE user_id = '$id'";
	$result = mysqli_query($conn, $query);
	$numResults = mysqli_num_rows($result);
	if($numResults > 0)
	{
		$data = array();
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		echo json_encode($data);
	}
 ?>