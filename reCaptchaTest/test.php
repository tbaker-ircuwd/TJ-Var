<?php
		$postArray = array(
			'secret' => '6LcQBLshAAAAAMsdEEtWJ82R0Jw-ccB8XeleosFH',
			'response' => $_POST['g-recaptcha-response']
		);
		$url = 'https://www.google.com/recaptcha/api/siteverify?'.http_build_query($postArray);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);
		print_r($server_output);
		die;
?>
