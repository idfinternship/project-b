<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");

	$msg = '';
	$msgClass = '';

    if($isLoggedIn){
    	$query = "SELECT * FROM users WHERE id={$id}";
    	$result = mysqli_query($conn, $query);
    	$user = mysqli_fetch_assoc($result);
    	if(isset($_POST['changeUsername'])){
    		$updatedUsername = mysqli_real_escape_string($conn, $_POST['username']);
    		$uquery = mysqli_query($conn, "SELECT * FROM users WHERE username = '$updatedUsername'");
    		if(!mysqli_fetch_assoc($uquery)){
    			$date = date("Y-m-d H:i:s");
    			$query = "UPDATE users SET username='$updatedUsername', modified='$date' WHERE id={$id}";
	    		if(mysqli_query($conn, $query)){
	    			$user['username'] = $updatedUsername;
	    			$msg = "Username successfully updated!";
	    			$msgClass = 'alert-success';
	    		}
	    		else{
	    			$msg = "ERROR";
	    			$msgClass = 'alert-danger';
	    		}
    		}
    		else{
    			$msg = 'Username already exists';
    			$msgClass = 'alert-danger';
    		}
    		
    		
    	}
    	if(isset($_POST['changeEmail'])){
    		$email = mysqli_real_escape_string($conn, $_POST['email']);
    		if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
    			$equery = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    			if(!mysqli_fetch_assoc($equery)){
    				$verification_hash = md5(rand(0, 10000));
	    			$query = "UPDATE users SET verification_hash='$verification_hash' WHERE id={$id}";
	    			if(mysqli_query($conn, $query)){
	    				$oldemail = $user['email'];
	    				require("mail_email.php");
			    		if (PEAR::isError($mail)) {
			                $msg = $mail->getMessage();
			                $msgClass = 'alert-danger';
			            } else {
			                $msg = 'Check your new email to update your account.';
			                $msgClass = 'alert-info';
			            }
	    			}
	    			else{
	    				$msg = "ERROR";
	    				$msgClass = 'alert-danger';
	    			}
    			}
    			else{
                    $msg = 'Email already exists';
                    $msgClass = 'alert-danger';
                }
            }
            else{
            	$msg = 'Please enter a valid email';
            	$msgClass = 'alert-danger';
            }
    		
    	}
    	if(isset($_POST['changePassword'])){
            $verification_hash = md5(rand(0, 10000));
			$query = "UPDATE users SET verification_hash='$verification_hash' WHERE id={$id}";
			if(mysqli_query($conn, $query)){
				$email = $user['email'];
				require("mail_password.php");
	    		if (PEAR::isError($mail)) {
	                $msg = $mail->getMessage();
	                $msgClass = 'alert-danger';
	            } else {
	                $msg = 'Check your email to change your password.';
	                $msgClass = 'alert-info';
	            }
			}
			else{
				$msg = "ERROR";
				$msgClass = 'alert-danger';
			}
    	}
    	if(isset($_POST['deleteAccount'])){
    		if($_SESSION['isFB'] == true){
    			$query = "DELETE FROM user_has_country WHERE user_id = '$id'";
				mysqli_query($conn, $query);
				$query_delete = "DELETE FROM users WHERE id = '$id'";
				if(mysqli_query($conn, $query_delete)){
					$isLoggedIn = false;
					session_destroy();
					$msg = "Your account has been deleted!";
					$msgClass = 'alert-success';
				}
				else{
					$msg = "ERROR";
					$msgClass = 'alert-danger';
				}
    		}
    		else{
    			$verification_hash = md5(rand(0, 10000));
				$user['verification_hash'] = $verification_hash;
				$query = "UPDATE users SET verification_hash='$verification_hash' WHERE id={$user['id']}";
				if(mysqli_query($conn, $query)){
					$email = $user['email'];
					require("mail_delete.php");
		    		if (PEAR::isError($mail)) {
		                $msg = $mail->getMessage();
		                $msgClass = 'alert-danger';
		            } else {
		                $msg = 'Check your email to confirm account deletion.';
		                $msgClass = 'alert-info';
		            }
				}
				else{
					$msg = "ERROR";
					$msgClass = 'alert-danger';
				}
    		}
    		
    	}
    }
    else{
    	$msg = "You are not logged in!";
    	$msgClass = 'alert-warning';
    }
    mysqli_close($conn);
 ?>
<!DOCTYPE html>
<html>
<head>
	<?php require('style.php'); ?>
	<title>My Account Page</title>
</head>
<body>
	<script src="js/fb.js"></script>
	<div class="container">
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
    </div>
	<?php require('navbar.php'); ?>
    <?php if($isLoggedIn): ?>
	    <div class="container">
	    	<h2>View Selected Countries</h2>
	    	<form action="selected_countries.php" class="form-control">
		    	<label>Press this button to view your selected countries:</label>
		    	<button class="btn btn-primary">Select</button>
	    	</form>

	    	<h2>Select Countries</h2>
	    	<form action="select_countries_globe.php" class="form-control">
		    	<label>Press this button to select countries you have been to:</label>
		    	<button class="btn btn-primary">Select</button>
	    	</form>
		    <br>

		    <h2>Change Account Details</h2>
			<label>Change username</label>
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-control">
				<label>Username:</label>
	            <input type="text" name="username" value="<?php echo $user['username'] ?>">
	            <button type="submit" name="changeUsername" class="btn btn-primary">Change</button>
			</form>
			<br>

			<?php if($_SESSION['isFB'] == false): ?>
				<label>Change email</label>
				<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-control">
					<label>New Email:</label>
					<input type="text" name="email" value="<?php echo $user['email'] ?>">
					<button type="submit" name="changeEmail" class="btn btn-primary">Change</button>
				</form>
				<br>

				<label>Change password</label>
				<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-control">
					<label>Click this button to change your password:</label>
					<button type="submit" name="changePassword" class="btn btn-primary">Change</button>
				</form>
				<br>
			<?php endif; ?>

			<label>Delete account</label>
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-control">
				<label>Click this button to delete your account:</label>
				<button type="submit" name="deleteAccount" class="btn btn-primary">Delete</button>
				<br>
			</form>
		</div>
	<?php endif; ?>

	<div id="myModalL" class="modal">
      <div class="modal-content">
        <div class="mdl-layout-spacer"><span class="close">&times;</span></div>
        <?php require("login_popup.php"); ?>
      </div>
    </div>

    <div id="myModalR" class="modal">
      <div class="modal-content">
        <div class="mdl-layout-spacer"><span class="close">&times;</span></div>
        <?php require("register_popup.php"); ?>
      </div>
    </div>

    <script src="js/modal.js"></script>
</body>
</html>