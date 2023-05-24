<?php
	require_once("/home/shared/functions.php");

	$workOrders = curlCall("http://intserver-api/fleetio/get.php?key=70210178ee20cfb5278c8b533f6e95411b2b94c7&token=f7531a1d6d&endpoint=work_orders");

	$workOrder_issues = array();
	foreach($workOrders as $workOrder){
		if(is_array($workOrder['issues']) && count($workOrder['issues']) > 0){
			$workOrder_issues[$workOrder['id']][] = $workOrder['issues'];
		}
	}
	$result = array();
	foreach($workOrder_issues as $workOrder_id => $issuesArrays){
		foreach($issuesArrays as $issuesArray){
			foreach($issuesArray as $issue){
				$result[] = array('work_order_id' => $workOrder_id, 'issue_id'  => $issue['id']);
			}
		}
	}

	$issues = curlCall("http://intserver-tbaker/api-endpoint/fleetio/get.php?token=f7531a1d6d&key=70210178ee20cfb5278c8b533f6e95411b2b94c7&endpoint=issues&includes=custom_fields&v=2");
	foreach($issues as $issue){
		if($issue['asset_type'] == 'Equipment' && $issue['custom_fields']['assigned_to_workorder'] == '1'){
			$work_order_url = explode('/',$issue['custom_fields']['work_order']);
			$work_order_number = "#".end($work_order_url);
			$workOrder = $workOrders[array_search($work_order_number,array_column($workOrders,'number'))];
			$result[] = array('work_order_id' => $workOrder['id'], 'issue_id' => $issue['id']);
		}
	}
	print_r(json_encode($result));



?>
