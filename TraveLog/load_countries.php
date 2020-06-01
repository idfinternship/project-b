<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");

    if($isLoggedIn){
		$query = "SELECT * FROM user_has_country WHERE user_id = '$id'";
		$result =  mysqli_query($conn, $query);
		$response = array();
		$countries = array();
		while($row = mysqli_fetch_array($result)){
			$cid = $row['country_id'];
			$countries[] = array('e' => $cid, 'i' => $cid, 'v' => 1000);
		}
		$response['countries'] = $countries;

		$file = "user_data/".$id.".json";
		if(file_exists($file)){
			unlink($file);
		}
		$handle = fopen($file, 'w');
		fwrite($handle, json_encode($countries));
		fclose($handle);
		echo $id;
    }
?>