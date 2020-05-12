<?php 

	require_once "Mail.php";

	$to = $email;

	$subject = "TraveLog Signup Verification";
	$body = '
	Thanks for signing up!
	Your account: '.$username.' has been created!
	Please click this link to activate your account:
	'.ROOT_URL.'verify.php?email='.$email.'&verification_hash='.$verification_hash.'
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