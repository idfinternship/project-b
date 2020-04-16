<?php 

	require_once "Mail.php";

	$to = $email;

	$subject = "TraveLog Email Change Request";
	$body = '

	A request has been made to change your account\'s email.

	Please click this link to confirm your new email:
	'.ROOT_URL.'verify_email.php?old_email='.$oldemail.'&new_email='.$email.'&verification_hash='.$verification_hash.'
	';

	$headers = array ('From' => MAIL_USER, 'To' => $to,'Subject' => $subject);
	$smtp = Mail::factory('smtp',
		array ('host' => MAIL_HOST,
		'port' => MAIL_PORT,
		'auth' => true,
		'username' => MAIL_USER,
		'password' => MAIL_PASS));

	$mail = $smtp->send($to, $headers, $body);
 ?>