<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");
    
	$json = $_POST['json'];
	$countries = json_decode($json);
	foreach ($countries as $country) {
		$countryid = $country->ISOCode;
		$query = "INSERT INTO user_has_country(user_id, country_id) VALUES ('$id', '$countryid')";
		mysqli_query($conn, $query);
		/*else{
			$query = "SELECT * FROM user_has_country WHERE country_id = '$countryid' AND user_id = '$id'";
			$result =  mysqli_query($conn, $query); 
			if(mysqli_fetch_assoc($result)){
				$query = "DELETE FROM user_has_country WHERE country_id = '$countryid' AND user_id = '$id'";
				$result =  mysqli_query($conn, $query); 
			}
		}*/
    }

 ?>