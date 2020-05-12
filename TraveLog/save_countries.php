<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");
    
	$json = $_POST['json'];
	$countries = json_decode($json);
	$query = "SELECT * FROM country";
    $result = mysqli_query($conn, $query);
    $allcountries = mysqli_fetch_all($result, MYSQLI_ASSOC);
	foreach ($allcountries as $country) {
		$countryid = $country['id'];
		$found = false;
		foreach ($countries as $selectedcountry){
			$selectedid = $selectedcountry->ISOCode;
			if($selectedid == $countryid){
				$found = true;
				break;
			}
		}
		if($found){
			$query = "INSERT INTO user_has_country(user_id, country_id) VALUES ('$id', '$countryid')";
			mysqli_query($conn, $query);
		}
		else{
			$query = "SELECT * FROM user_has_country WHERE country_id = '$countryid' AND user_id = '$id'";
			$result =  mysqli_query($conn, $query); 
			if(mysqli_fetch_assoc($result)){
				$query = "DELETE FROM user_has_country WHERE country_id = '$countryid' AND user_id = '$id'";
				$result =  mysqli_query($conn, $query); 
			}
		}
    }

 ?>