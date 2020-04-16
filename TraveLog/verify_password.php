<?php 
	require('config/config.php');
    require('config/db.php');
    require("login_session.php");

    $msg = '';
    $msgClass = '';

	if(isset($_GET['email']) && isset($_GET['verification_hash'])){
		$getemail = $_GET['email'];
		$gethash = $_GET['verification_hash'];
		$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$getemail'");
		$user_sql = mysqli_fetch_assoc($result);
		if($user_sql != false){
			$hash = $user_sql['verification_hash'];
			if($hash === $gethash){
				if(isset($_POST['changePassword'])){
					$password = htmlspecialchars($_POST['password']);
        			$password_confirm = htmlspecialchars($_POST['password_confirm']);
        			if(strlen($password) < 6 || strlen($password) > 255){
		                $msg = 'Password must be between 6 and 255 characters';
		                $msgClass = 'alert-danger';
		            }
		            else{
		            	if($password != $password_confirm){
                            $msg = 'Passwords must match';
                            $msgClass = 'alert-danger';
                        }
                        else{
                        	$password_hash = password_hash($password, PASSWORD_DEFAULT);
                        	$query = "UPDATE users SET password='$password_hash' WHERE id={$user_sql['id']}";
							if(mysqli_query($conn, $query)){
								$verification_hash = md5(rand(0, 10000));
								$date = date("Y-m-d H:i:s");
								$query = "UPDATE users SET verification_hash='$verification_hash', modified = '$date' WHERE id={$id}";
								mysqli_query($conn, $query);
								$msg = 'Your password is now changed!';
								$msgClass = 'alert-success';
							}
							else{
								$msg = 'Something went wrong :(';
								$msgClass = 'alert-danger';
							}
                        }
		            }
				}
				
			}
			else{
				$msg = 'Your hash in the link is wrong!';
				$msgClass = 'alert-danger';
			}
		}
		else{
			$msg = 'Email does not exist. Your link might be wrong';
			$msgClass = 'alert-danger';
		}
	}
	else{
		$msg = 'Your link is wrong!';
		$msgClass = 'alert-danger';
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php require('style.php'); ?>
	<title>Password verification</title>
</head>
<body>
	<div class="container">
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
    </div>
    <?php require('navbar.php'); ?>
    <div class="container">
    	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    		<label>Password:</label>
            <input type="password" name="password">
            <br>
            <label>Confirm Password:</label>
            <input type="password" name="password_confirm">
            <br>
            <button type="submit" name="changePassword" class="btn btn-primary">Change</button>
    	</form>
    </div>
</body>
</html>