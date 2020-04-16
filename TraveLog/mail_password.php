<?php 

	require_once "Mail.php";

	$to = $email;

	$subject = "TraveLog Password Change Request";
	$body = '

	A request has been made to change your account\'s password.

	Please click this link to change your password:
	'.ROOT_URL.'verify_password.php?email='.$email.'&verification_hash='.$verification_hash.'
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