<?php
        $infoArray = array(
                'formtype' => '',
                'prefix' => '',
                'firstname' => '',
                'lastname' => '',
                'suffix' => '',
                'prefix2' => '',
                'firstname2' => '',
                'lastname2' => '',
                'suffix2' => '',
                'relationship' => '',
                'address1' => '',
                'address2' => '',
                'city' => '',
                'state' => '',
                'zip' => '',
                'phone' => '',
                'phone2' => '',
                'phonetype2' => '',
                'email' => '',
                'email2' => '',
                'entrydate' => '',
                'productid' => '',
                'prod2' => '',
                'prod3' => '',
                'salesrep' => '',
                'promoter' => '',
                'source' => '',
                'sourcesub' => '',
                'notes' => '',
                'apptdate' => '',
                'appttime' => '',
                'aduration' => '',
                'setter' => '',
                'waiver' => 'false',
                'lds_user_1' => '',
                'lds_user_3' => '',
                'lds_user_4' => '',
                'lds_user_5' => '',
                'lds_user_16' => '',
                'lds_user_17' => '',
                'lds_user_18' => '',
                'lds_user_19' => '',
                'lds_user_20' => ''
        );

	foreach($_POST as $index => $value){
		if(array_key_exists($index,$infoArray)){
			$infoArray[$index] = $value;
		}else{
			switch($index){
				case 'streetAddress':
					$infoArray['address1'] = $value;
					break;
				case 'dateTime':
					$appt = explode('~',$value)[0];
					$date = explode(' ',$appt)[0];
					$time = explode(' ',$appt)[1];
					$rep = explode('~',$value)[1];
					$infoArray['apptdate'] = $date;
					$infoArray['appttime'] = $time;
					$infoArray['salesrep'] = $rep;
					break;
				case 'product':
					foreach($value as $i => $product){
						if($i == 0){
							$infoArray['productid'] = $product;
						}elseif($i == 1){
							$infoArray['prod2'] = $product;
						}elseif($i == 2){
							$infoArray['prod3'] = $product;
						}
					}
					break;
				case 'whereToSchedule':
					if($value == 'online'){
						$infoArray['setter'] = '1213';
						$infoArray['formtype'] = '3';
					}else{
						$infoArray['formtype'] = '2';
					}
					break;
				case 'howdidyouhear':
					switch($value){
						case 'TV':
							$infoArray['source'] = 'TV';
							$infoArray['sourcesub'] = '212';
							break;
						case 'Radio':
							$infoArray['source'] = 'Radio';
							$infoArray['sourcesub'] = '161';
							break;
						case 'Internet':
							$infoArray['source'] = 'Internet';
							$infoArray['sourcesub'] = '7';
							break;
						case 'Yard Sign':
							$infoArray['source'] = 'Sign';
							$infoArray['sourcesub'] = '139';
							break;
						case 'Social Media':
							$infoArray['source'] = 'Internal Social';
							$infoArray['sourcesub'] = '197';
							break;
						case 'You’ve improved the home of my friend of family member':
							$infoArray['source'] = 'Referral';
							$infoArray['sourcesub'] = '102';
							break;
						case 'You’ve improved my home before':
							$infoArray['source'] = 'Prior Customer';
							$infoArray['sourcesub'] = '93';
							break;
						default:
							$infoArray['source'] = 'Internet';
							$infoArray['sourcesub'] = '15';
							break;
					}
					break;
			}
		}
	}


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.integrityprodserver.com/customers/createCustomer.php?".http_build_query($infoArray));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
curl_close ($ch);
print_r($server_output);
?>
