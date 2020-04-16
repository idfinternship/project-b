<?php 

	require_once "Mail.php";

	$to = $email;

	$subject = "TraveLog Account Deletion Request";
	$body = '

	A request has been made to delete your account.

	Click this link to completely remove your account:
	'.ROOT_URL.'verify_delete.php?email='.$email.'&verification_hash='.$verification_hash.'
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