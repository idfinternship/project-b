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
</body>
</html>