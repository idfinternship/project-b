<?php 
	include('config/config.php');
  	include('config/db.php');
  	include("login_session.php");

	$q = $_REQUEST['q'];
	
	if(!empty($q)){
		
		$query = mysqli_query($conn, "SELECT * FROM users WHERE fb_id = '$q'");
        $user = mysqli_fetch_assoc($query);
        if($user == false){
        	$_SESSION['q'] = $q;
        } 
        else{
			$_SESSION['isLoggedIn'] = true;
        	$_SESSION['userID'] = $user['id'];
        	$_SESSION['isFB'] = true;
        }
		
	}
 ?>