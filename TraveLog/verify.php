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
			if($user_sql['active'] == 0){
				$hash = $user_sql['verification_hash'];
				if($hash === $gethash){
					$date = date("Y-m-d H:i:s");
					$query = "UPDATE users SET active='1', modified='$date' WHERE id={$user_sql['id']}";
					if(mysqli_query($conn, $query)){
						$user['active'] = 1;
    					$_SESSION['user'] = $user;
						$msg = 'Your account is now active!';
						$msgClass = 'alert-success';
					}
					else{
						$msg = 'Something went wrong :(';
						$msgClass = 'alert-danger';
					}
				}
				else{
					$msg = 'Your hash in the link is wrong!';
					$msgClass = 'alert-danger';
				}
			}
			else{
				$msg = 'Account is already verified!';
				$msgClass = 'alert-warning';
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
	<title>Account verification</title>
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