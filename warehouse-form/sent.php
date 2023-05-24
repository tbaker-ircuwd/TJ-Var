<?php
require_once("mail.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
        $job = $_POST['job'];
        $truck = $_POST['truck'];
        $order = $_POST['order'];
        $return = $_POST['return'];
        $used = $_POST['used'];
        foreach($order as $index => $material){
		if(!isset($_POST['order']['check'])){
			unset($_POST['order']);
		}
                if($material['material'] == '' && $material['qty'] == ''){
                        unset($_POST['order'][$index]);
                }
        }
        foreach($return as $index => $material){
                if(!isset($_POST['return']['check'])){
			unset($_POST['return']);
                }
                if($material['material'] == '' && $material['qty'] == ''){
                        unset($_POST['return'][$index]);
                }
        }
        foreach($used as $index => $material){
                if(!isset($_POST['used']['check'])){
                        unset($_POST['used']);
                }
                if($material['material'] == '' && $material['qty'] == ''){
                        unset($_POST['used'][$index]);
                }
        }
        foreach($_POST as $index => $post){
                if(is_array($post) && count($post) == 0){
                        unset($_POST[$index]);
                }
        }
        $style = "<style>
                table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }

                td, th {
                  border: 1px solid #dddddd;
                  text-align: left;
                  padding: 8px;
                }

                tr:nth-child(even) {
                  background-color: #dddddd;
                }
                </style>";
        if(isset($_POST['return'])){
		$msg = $style;
		$msg .= "Job #: $job | Truck #: $truck\n";
	        $subject = "Job #: $job | Truck #: $truck";
        	$msg .= "<table>";
                $subject .= " | Return";
                $msg .= "<tr><th colspan='2' style='text-align:center;'>Returns</th></tr>";
                $msg .= "<tr>";
                $msg .= "<th>Material</th>";
                $msg .= "<th>Quantity</th>";
                $msg .= "</tr>";
                foreach($_POST['return'] as $index => $return){
                        if($index == 'check'){
                                continue;
                        }
                        $material = $return['material'];
                        $qty = $return['qty'];
                        $msg .= "<tr>";
                        $msg .= "<td>";
                        $msg .= "$material";
                        $msg .= "</td>";
                        $msg .= "<td style='text-align:center'>";
                        $msg .= "$qty";
                        $msg .= "</td>";
                        $msg .= "<tr>";
                }
		if(isset($_POST['comment']) && $_POST['comment'] != ''){
                        $msg .= "<tr><th colspan='2' style='text-align:center;'>Comments</th></tr>";
                        $msg .= "<tr>";
                        $msg .= "<td colspan='2' style='text-align:center'>";
                        $msg .= $_POST['comment'];
                        $msg .= "</td>";
                        $msg .= "</tr>";
                }
		$returnMsg = $msg;
	        $mail = new eMail();
        	$mail->to('materialcoordinator@ircuwd.com');
	        $mail->subject($subject);
        	$mail->body($msg);
	        $mail->send();
        }
        if(isset($_POST['order'])){
		$msg = $style;
                $msg .= "Job #: $job | Truck #: $truck\n";
                $subject = "Job #: $job | Truck #: $truck";
                $msg .= "<table>";
                $subject .= " | Order";
                $msg .= "<tr><th colspan='2' style='text-align:center;'>Orders</th></tr>";
                $msg .= "<tr>";
                $msg .= "<th>Material</th>";
                $msg .= "<th>Quantity</th>";
                $msg .= "</tr>";

                foreach($_POST['order'] as $index => $order){
                        if($index == 'check'){
                                continue;
                        }
                        $material = $order['material'];
                        $msg .= "<tr>";
                        $msg .= "<td>";
                        $msg .= "$material";
                        $msg .= "</td>";
                        $msg .= "<td style='text-align:center'>";
                        $msg .= "$qty";
                        $msg .= "</td>";
                        $msg .= "<tr>";
                }
		if(isset($_POST['comment']) && $_POST['comment'] != ''){
                        $msg .= "<tr><th colspan='2' style='text-align:center;'>Comments</th></tr>";
                        $msg .= "<tr>";
                        $msg .= "<td colspan='2' style='text-align:center'>";
                        $msg .= $_POST['comment'];
                        $msg .= "</td>";
                        $msg .= "</tr>";
                }
		$orderMsg = $msg;
                $mail = new eMail();
                $mail->to('materialcoordinator@ircuwd.com');
                $mail->subject($subject);
                $mail->body($msg);
                $mail->send();
        }
        if(isset($_POST['used'])){
		$msg = $style;
                $msg .= "Job #: $job | Truck #: $truck\n";
                $subject = "Job #: $job | Truck #: $truck";
                $msg .= "<table>";
                $subject .= " | Used";
                $msg .= "<tr><th colspan='2' style='text-align:center;'>Used</th></tr>";
                $msg .= "<tr>";
                $msg .= "<th>Material</th>";
                $msg .= "<th>Quantity</th>";
                $msg .= "</tr>";
                foreach($_POST['used'] as $index => $used){
                        if($index == 'check'){
                                continue;
                        }
                        $material = $used['material'];
                        $qty = $used['qty'];
                        $msg .= "<tr>";
                        $msg .= "<td>";
                        $msg .= "$material";
                        $msg .= "</td>";
                        $msg .= "<td style='text-align:center'>";
                        $msg .= "$qty";
                        $msg .= "</td>";
                        $msg .= "<tr>";
                }
	        if(isset($_POST['comment']) && $_POST['comment'] != ''){
	                $msg .= "<tr><th colspan='2' style='text-align:center;'>Comments</th></tr>";
        	        $msg .= "<tr>";
                	$msg .= "<td colspan='2' style='text-align:center'>";
	                $msg .= $_POST['comment'];
        	        $msg .= "</td>";
                	$msg .= "</tr>";
	        }
		$usedMsg = $msg;
                $mail = new eMail();
                $mail->to('materialcoordinator@ircuwd.com');
                $mail->subject($subject);
                $mail->body($msg);
                $mail->send();
        }
}
	if(isset($returnMsg)){
		print_r($returnMsg);
		echo"\n";
	}
	if(isset($orderMsg)){
                echo"\n";
                print_r($orderMsg);
        }
	if(isset($usedMsg)){
		echo"\n";
		print_r($usedMsg);
	}

        unlink("/home/scripts/tmp/$fileName");


?>

