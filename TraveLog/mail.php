<?php 
	$to = $email;
	$subject = 'TraveLog Signup Verification';
	$message = '

	Thanks for signing up!
	Your account: '.$username.'has been created!

	Please click this link to activate your account:
	http://localhost/verify.php?email='.$email.'&verification_hash='.$verification_hash.'
	';
	$headers = 'From:noreply@travelog.com'."\r\n";
	mail($to, $subject, $message, $headers);
 ?>