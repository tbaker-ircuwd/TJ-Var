<?php
	require_once("/home/shared/functions.php");

	require_once("/home/scripts/mail.php");
	$mail = new eMail('customer');
	$mail->subject('We Need Your Feedback!');
	$mail->msgHTML("/var/www/html/MIGoogleReview/index.html",__DIR__);
	$contact_list = array();
	$file = fopen('contact_list.csv', 'r');
	while (($line = fgetcsv($file)) !== FALSE) {
		$contact_list[] = $line;
	}
	fclose($file);
        require_once("/home/api/shared/lp_api.php");
        $lp_api = new lp_api();
	foreach($contact_list as $index => $cst){
	        $cst_id = $cst[0];
	        $customer = $lp_api->customReport("SELECT * FROM cst_Customers WHERE id = '$cst_id'")[0];
        	$altPhones = $lp_api->customReport("SELECT * FROM aph_AlternatePhones WHERE cst_id = '$cst_id'");
	        $contacts = array();
        	if($customer['Phone'] != ''){
		        $contact_list[$index]['phones'][] = $customer['Phone'];
        	}
	        if($customer['Email'] != ''){
        		$contact_list[$index]['emails'][] = $customer['Email'];
	        }
        	if($customer['Email2'] != ''){
	        	$contact_list[$index]['emails'][] = $customer['Email2'];
        	}
	        if(count($altPhones) > 0){
        		foreach($altPhones as $phone){
                		if($phone != ''){
	                        	$contact_list[$index]['phones'][] = $phone['Phone'];
        	                }
                	}
	        }
	}



	$token = "Ihv8bYo2tMFe7tzapVyTc4CJu1uUiChqBz1muead";
	$message = "Hello, This is Integrity Home Exteriors!

We appreciate the opportunity to work with you and, if you are happy with our service, we invite you to leave a review for us on Google.

https://www.google.com/localservices/review/integrityhomeexteriorsofmichigan

Thank you!

Sincerely,
Your Integrity Team!";
        foreach($contact_list as $contacts){

		$emails = $contacts['emails'];
		//EMAIL

		foreach($emails as $email){
			if($email != ''){
		                $mail = new eMail('customer');
        		        $mail->subject('We Need Your Feedback!');
			        $mail->msgHTML("/var/www/html/MIGoogleReview/index.html",__DIR__);
	                	$mail->to($email);
	        	        print_r($mail->send());
			}
		}

		//TEXT
		$phones = $contacts['phones'];
		foreach($phones as $phone){
		        $urlParams = http_build_query(array(
	                	'token'=>$token,
	        	        'message'=>$message,
        	        	'to'=>$phone,
	                	'bot'=>'1',
        		        'read'=>'1'
		        ));
		        $url = "http://intserver-tbaker/api-endpoint/chirp/sendChat.php?$urlParams";
			print_r(curlCall($url));
		}

        }


?>
