	<head>
		<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css'/>
	</head>

<?php
        require_once("/home/scripts/sharedFunctions.php");
        $api_endpoint = "http://intserver-api/";
        $url = $api_endpoint."kanboard/getDrivers.php";
        $drivers = curlCall($url);

	echo"<h1>Re-run Deputy-Samsara</h1>";
	echo"<form id='deputyTracking' class='form-inline'>";
		echo"<button type='button' class='btn btn-primary' onclick='send()'>Run</button>";
		echo"<br>";
		echo"Tech: <select id='tech' class='form-control'>";
		echo"<option></option>";
		foreach($drivers as $driver){
			$id = $driver['id'];
			$name = $driver['title'];
        	        $url = $api_endpoint."kanboard/getMeta.php?id=$id";
			$deputy_id = curlCall($url)['Deputy_ID'];
			if($deputy_id != ''){
				echo"<option value='$deputy_id'>$name</option>";
			}
		}
		echo"</select>";
		echo"<p>Date: <input type='text' id='datepicker' class='form-control'></p>";
	echo"</form>";
?>
	<script>
		$(function(){
			$("#datepicker").datepicker();
		});
	</script>
	<script>
		function send(){
			alert('test');
			var form = $(this);
			var url = "http://192.168.2.66/endpoint/deputyTracking.php?";
			var tech = document.getElementById('tech').value;
			var date = document.getElementById('datepicker').value;
			$.ajax({
				type: "GET",
				url: url + 'tech=' + tech + '&date=' + date,
				success: function(){
					alert('ran');
				}

			});
		};
	</script>
