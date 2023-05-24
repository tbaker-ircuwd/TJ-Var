<?php
	require_once("/home/shared/functions.php");
	if(isset($_GET['client_id']) && isset($_GET['crm_id'])){
		require_once("/home/shared/db.php");
		$db = new db('companyCam');

		$client_id = $_GET['client_id'];
		$crm_id = $_GET['crm_id'];
		$client = $db->query("SELECT * FROM clients WHERE id = '$client_id'");

		if(count($client) > 0){
			$client = $client[0];
			if($client['enabled']){
				$feature = $db->query("SELECT * FROM client_features WHERE client_id = '$client_id' AND feature_id = '3' AND enabled = '1'");
				if(count($feature) > 0){
					$ccProjects = $db->query("SELECT * FROM customers WHERE client_id = '$client_id' AND client_crm_id = '$crm_id'");
					if(count($ccProjects) == 0){
						ex(json_encode(array('error'=>"No matching records found for crm_id $crm_id. Please contact Integrity Software Solutions for further assistance")));
					}elseif(count($ccProjects) == 1){
						$ccLink = "https://app.companycam.com/projects/".$ccProjects[0]['client_companyCam_id']."/photos";
						$script = "<script>window.open('$ccLink', '_blank');window.close();</script>";
						print_r($script);
					}else{
						$count = count($ccProjects);
						print_r("There are $count project matches. Please select the one you would like to navigate to.<br>");
						foreach($ccProjects as $i => $match){
							$ccID = $match['client_companyCam_id'];
							$ccLink = "https://app.companycam.com/projects/$ccID/photos";
							$project = curlCall("http://intserver-tbaker/api-endpoint/companyCam/getProject.php?company=".$client['companyCam_code']."&id=$ccID");
							if(isset($project['name'])){
								$name = $project['name'];
								print_r("<a href='$ccLink'>$name - $ccID</a><br>");
							}else{
								print_r("<a href='$ccLink'>$ccID</a><br>");
							}
						}
					}
				}else{
					ex(json_encode(array('error'=>"Account does not have access to redirect feature. Please contact Integrity Software Solutions")),400);
				}
			}else{
				ex(json_encode(array('error'=>"Account disabled. Please contact Integrity Software Solutions")),400);
			}
		}else{
			ex(json_encode(array('error'=>'client_id not found')),400);
		}

	}else{
		ex(json_encode(array('error'=>'missing required values')),400);
	}
?>
