<?php
	require_once("/home/shared/functions.php");

	require_once("/home/scripts/mail.php");
	$mail = new eMail('customer');
	$mail->subject('We Need Your Feedback!');
	$mail->msgHTML("/var/www/html/angiesList/index.html",__DIR__);
	$contact_list = array();
	$file = fopen('contact_list.csv', 'r');
	while (($line = fgetcsv($file)) !== FALSE) {
		$contact_list[] = $line;
	}
	fclose($file);
	$token = "Ihv8bYo2tMFe7tzapVyTc4CJu1uUiChqBz1muead";
	$message = "Hello, This is Integrity Home Exteriors!

We appreciate the opportunity to work with you and, if you are happy with our service, we invite you to leave a review for us on the Angi website.

https://www.angi.com/write-review/468136?cid=PRL.E014.P026.20180302

Thank you!

Sincerely,
Your Integrity Team!";
        foreach($contact_list as $contacts){
		$emails = array(trim($contacts[0]));
		if(trim(strtolower($contacts[0])) != trim(strtolower($contacts[1]))){
			$emails[] = trim($contacts[1]);
		}
		//EMAIL
		foreach($emails as $email){
	                $mail = new eMail('customer');
        	        $mail->subject('We Need Your Feedback!');
                	$mail->msgHTML("/var/www/html/angiesList/index.html",__DIR__);
	                $mail->to($email);
        	        print_r($mail->send());
		}
		//TEXT
		$phones = array();
		if(trim($contacts[2]) != 'undefined'){
			$phones[] = trim($contacts[2]);
		}
		if(trim(strtolower($contacts[2])) != trim(strtolower($contacts[3])) && $contacts[3] != 'undefined'){
			$phones[] = trim($contacts[3]);
		}
		foreach($phones as $phone){
		        $urlParams = http_build_query(array(
	                	'token'=>$token,
	        	        'message'=>$message,
        	        	'to'=>$phone,
	                	'bot'=>$bot,
        		        'read'=>$read
		        ));
		        $url = "http://intserver-tbaker/api-endpoint/chirp/sendChat.php?$urlParams";
			print_r(curlCall($url));
		}

        }


?>
