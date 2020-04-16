<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");

    $query = "SELECT * FROM country";
    $result = mysqli_query($conn, $query);
    $countries = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if(isset($_POST['submit'])){
    	foreach ($countries as $country) {
    		$countryid = $country['id'];
    		if(isset($_POST[$countryid])) {
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
    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php include("style.php") ?>
 	<title>Country Selection</title>
 </head>
 <body>
 	<?php require("navbar.php") ?>
 		<div class="container">
 			<h2>View Selected Countries</h2>
	    	<form action="selected_countries.php" class="form-control">
		    	<label>Press this button to view your selected countries:</label>
		    	<button class="btn btn-primary">Select</button>
	    	</form>
	    	<h2>Select Countries</h2>
 			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form-control" style="border:0px">
 				<?php foreach($countries as $country): ?>
 					<input type="checkbox" name="<?php echo $country['id']; ?>" <?php 
 						$cid = $country['id'];
 						$query = "SELECT * FROM user_has_country WHERE country_id = '$cid' AND user_id = '$id'";
    					$result =  mysqli_query($conn, $query); 
    					if(mysqli_fetch_assoc($result)){
    						echo 'checked';
    					}?>>

 					<?php echo $country['name']; ?>
 					<br>
 				<?php endforeach; ?>
 				<button type="submit" name="submit" class="btn btn-primary">Confirm</button>
 			</form>
 		</div>
 </body>
 </html>