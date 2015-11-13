<?php

	// MailChimp
	$APIKey = '4a1d585027695325d3cbb3aafe4f737c-us11';
	$listID = 'f279267dea';

	$email   = $_POST['email'];
	$bts   = $_POST['bts'];

	require_once('inc/MCAPI.class.php');

	$api = new MCAPI($APIKey);
	$list_id = $listID;

	if($api->listSubscribe($list_id, $email , $bts ) === true) {
		$sendstatus = 1;
		$message = 'Success! Check your email to confirm sign up.';
	} else {
		$sendstatus = 0;
		$message = 'Error: ' . $api->errorMessage;
	}

	$result = array(
		'sendstatus' => $sendstatus,
		'message' => $message
	);

	echo json_encode($result);

?>
