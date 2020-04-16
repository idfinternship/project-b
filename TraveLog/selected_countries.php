<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");

    $query = "SELECT * FROM user_has_country WHERE user_id = '$id'";
    $result = mysqli_query($conn, $query);
    $countries = mysqli_fetch_all($result, MYSQLI_ASSOC);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<?php include("style.php") ?>
 	<title>Selected Countries</title>
 </head>
 <body>
 	<?php require("navbar.php") ?>
 		<div class="container">
            <h2>Select Countries</h2>
            <form action="select_countries.php" class="form-control">
                <label>Press this button to select countries you have been to:</label>
                <button class="btn btn-primary">Select</button>
            </form>
            <br>
            <h2>Selected Countries</h2>
            <?php if($countries == null){
                echo "No countries selected.";
            }?>
            <?php foreach($countries as $country): ?>
                <?php 
                    $countryid = $country['country_id'];
                    $country_query = "SELECT name FROM country WHERE id = '$countryid'";
                    $result = mysqli_query($conn, $country_query);
                    $name = mysqli_fetch_row($result);
                    echo $name[0];
                ?>
                <br>
            <?php endforeach; ?>
 		</div>
 </body>
 </html>