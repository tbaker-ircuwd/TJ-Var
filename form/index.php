<?php
	$dates = array();
	$i=1;
	while(count($dates) < 7){
		$dates[$i] = date('m/d/Y',strtotime("+$i days"));
		$i = $i + 1;
	}
?>
<head>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1,minimum-scale=1,width=device-width">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<style>
		.frame{
			max-width:600;
			margin:auto;
		}
		.frameHeader{
			display:flex;
			flex-direction:row;
			flex-wrap:wrap;
			align-items: center;
			background-color:f5d400;
			justify-content:space-between;
		}
		.title{
			font-size:min(5vw,30px);
			margin:5px;
		}
		.stepContainer{
			display:flex;
		}
		.steps{
			display:flex;
                	align-items:center;
	                justify-content:center;
        	        background-color:white;
                	border-radius:50%;
	                height:min(10vw,45px);
        	        width:min(10vw,45px);
                	text-align:center;
	                border:solid black 1px;
			margin:15px;
		}
		.active{
			color:green;
		}
		.inactive{
			background-color:gray;
			color:white;
		}
		.content{
			width:85%;
			margin:auto;
			text-align:center;
		}
		input[type=checkbox]{
			margin:5 0;
		}
		.zip{
			margin:30 0;
			width:100%;
			font-size:min(5vw,30px);
		}
		button{
			text-transform:uppercase;
		}
		button.availibility{
			width:80%;
			font-size:min(5vw,30px);
		}
		.error{
			color:red;
			text-align:center;
			font-size:min(5vw,30px);
		}
		.products{
			min-width:30%;
			text-align:left;
			margin:auto;
			display:inline-block;
		}
		.days{
			display:flex;
			flex-wrap:wrap;
			justify-content:center;
		}
		.times{
                        display:flex;
                        flex-wrap:wrap;
                        justify-content:center;
			border-top:solid black 3px;
			width:100%;
                }
		.day{
			text-align:center;
			border:solid black 1px;
			height:60px;
			width:100px;
			margin:15;
			cursor:pointer;
			border-radius:10px;
		}
        .time{
			display:flex;
			align-items:center;
			justify-content:center;
            text-align:center;
            border:solid black 1px;
            height:60px;
            width:100px;
            margin:15;
            cursor:pointer;
			border-radius:10px;
        }
		.empty{
			pointer-events: none;
			cursor:not-allowed;
			background:darkgray;
			color:white;
		}
		.contact{
			width:100%;
			margin:3 0;
		}
		li{
			list-style-type:none;
		}
		ul{
			padding:0;
		}
		h3{
			text-align:left;
		}
		.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 64px;
  height: 64px;
  margin: 8px;
  border: 8px solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #fff transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

.loader{
	background:#80808061;
	text-align:center;
	position:fixed;
	width:100%;
	height:100%;
	max-width:600;
}
	</style>
</head>

<body>
	<form>
	<div class='frame'>
		<div class='frameHeader'>
			<strong><div class='title' id='title'>Enter your zip code</div></strong>
			<strong>
			<div class='stepContainer'>
        	    <div id='step1' class='steps active'>
        	        1
        	    </div>
				<div id='step2' class='steps inactive'>
					2
				</div>
        	    <div id='step3' class='steps inactive'>
        	        3
        	    </div>
			</div>
			</strong>
		</div>
		<div id='error' class='error'>
		</div>
		<div class='1' id='step1Content'>
		<div class='loader' hidden>
				<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
			</div>	
			<div class='content'>			
			<input class='zip' type='text' id='zipCode' name='zipCode' placeholder='Please enter your zip code' maxlength='5'></input>
				<button type='button' onclick="checkAvailible(document.getElementById('zipCode').value)"class='availibility'>Check Availibility</button>
			</div>
		</div>
		<div id='step2Content' hidden>
			<div class='loader' hidden>
				<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
			</div>
			<div class='content'>
					<div id='products'>
						<ul>
							<li><label for='product'>Product:&nbsp;</label>
							<select name='product' id='product' onchange='getAvailibility()'>
								<option></option>
								<option value='Roof (Res)' hidden id='roofRepl'>Roof Replacement</opition>
								<option value='SFP (Res)' hidden id='roofRepa'>Roof Repair</opition>
								<option value='Door' hidden id='doors'>Doors</opition>
								<option value='Gutters' hidden id='gutters'>Gutters</opition>
								<option value='Insulation' hidden id='insulation'>Insulation</opition>
								<option value='Siding' hidden id='siding'>Siding</opition>
								<option value='Windows' hidden id='windows'>Windows</opition>
							</select>
						</ul>
					</div>
                    <div id='days' class='days' hidden>
                    <?php
                            foreach($dates as $index => $date){
                                    $dow = date("l",strtotime($date));
                                    print_r("<div data-day='$date' onclick='showTimes(this)'class='day' id='day$index'><strong>$dow</strong><br>$date</div>");
                            }
                    ?>
                    </div>
                    <div>
                            <div id='day1Times' class='times' hidden>
                            </div>
                            <div id='day2Times' class='times' hidden>
                            </div>
                            <div id='day3Times' class='times' hidden>
                            </div>
                            <div id='day4Times' class='times' hidden>
                            </div>
                            <div id='day5Times' class='times' hidden>
                            </div>
                            <div id='day6Times' class='times' hidden>
                            </div>
                            <div id='day7Times' class='times' hidden>
                            </div>
                    </div>
					<input hidden name='dateTime' id='dateTime'/>
					<button hidden id='continue2' onclick='setAppointment()' type='button' class='availibility'>Continue</button>
			</div>
		</div>
		<div class='3' id='step3Content' hidden>
		<div class='loader'>
				<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
			</div>
            <div class='content'>                        
			<div>
                            <h3>Name</h3>
                            <ul>
                                    <li><input class='contact' type='text' placeholder='First Name' name='firstName'></input></li>
                                    <li><input class='contact' type='text' placeholder='Last Name' name='lastName'></input></li>
                            </ul>
                    </div>
                            <h3>Address</h3>
                            <ul>
                                    <li><input class='contact' type='text' placeholder='Street Address' name='streetAddress'></input></li>
                                    <li><input class='contact' type='text' placeholder='City' name='city'></input></li>
                                    <li><input class='contact' type='text' placeholder='State' name='state'></input></li>
                            </ul>
                    <div>
                            <h3>Contact</h3>
                            <ul>
                                    <li><input class='contact' type='text' placeholder='Phone' name='phone'></input></li>
                                    <li><input class='contact' type='text' placeholder='Email' name='email'></input></li>
                            </ul>
                    </div>
                    <button type='button' class='availibility'>Review</button>
            </div>
		</div>
	</div>
	</form>
</body>

<script>

function showTimes(date){
	for(i=0;i<document.getElementsByClassName('times').length;i++){
		document.getElementsByClassName('times')[i].setAttribute('hidden','true');
	}
	document.getElementById(date['id']+"Times").removeAttribute('hidden');
}

function checkAvailible(zip){
	if(zip.length == '5'){
		document.getElementById('error').innerHTML = '';
		getZip(zip);
	}else{
		document.getElementById('error').innerHTML = 'Please enter valid 5 digit zip code';
	}
}

function getZip(zip){
	data = encodeURIComponent("http://intserver-api/lp/queryTable.php?tableName=zipLookup&arg1="+zip)
	$.ajax({
	    url: 'https://data.integrityprodserver.com/customJson.php?endpoint='+data,
	    type: "GET",
	    dataType: "json",
	    success: function (data) {
		parseZip(data);
	    },
	    error: function (error) {
	        console.log(`Error ${error}`);
	    }
	});
}

function parseZip(data){
	if(data.length > 0){
		for(i=0;i<data.length;i++){
			var product = data[i]['productid'];
			if(product == 'SFP (Res)'){
				document.getElementById('roofRepa').removeAttribute('hidden');
			}else if(product == 'Roof (Res)'){
				document.getElementById('roofRepl').removeAttribute('hidden');
			}else if(product == 'Doors'){
				document.getElementById('doors').removeAttribute('hidden');
			}else if(product == 'Gutters'){
				document.getElementById('gutters').removeAttribute('hidden');
			}else if(product == 'Insulation'){
				document.getElementById('insulation').removeAttribute('hidden');
			}else if(product == 'Siding'){
				document.getElementById('siding').removeAttribute('hidden');
			}else if(product == 'Windows'){
				document.getElementById('windows').removeAttribute('hidden');
			}
		}
		document.getElementById('step2').classList.add('active');
		document.getElementById('step2').classList.remove('inactive');
		document.getElementById('step1Content').setAttribute('hidden','true');
		document.getElementById('step2Content').removeAttribute('hidden');
		document.getElementById('title').innerHTML = 'Schedule Appointmnet';
	}else{
		document.getElementById('error').innerHTML = 'Integrity Home Exteriors does not currently service this area.';
	}
}

function getAvailibility(){
		if(document.getElementById('product').value!=''){
			var days = document.getElementsByClassName('day');
			for(d=0;d<days.length;d++){
				var id = days[d]['id'];
				var day = days[d]['dataset']['day'];
				if(document.getElementById(id+'Times')){
					document.getElementById(id+'Times').setAttribute('hidden','true');
					while(document.getElementById(id+'Times').childElementCount > 0){
						document.getElementById(id+'Times').children[0].remove();
					}
				}
				getTimes(day,id);
			}
        }
}
$( document ).ajaxStart(function() {
	var loaders = document.getElementsByClassName('loader');
	for(i=0;i<loaders.length;i++){
		loaders[i].removeAttribute('hidden');
	}
	document.getElementById('days').setAttribute('hidden','true');
});
$( document ).ajaxStop(function() {
	var loaders = document.getElementsByClassName('loader');
	for(i=0;i<loaders.length;i++){
		loaders[i].setAttribute('hidden','true');
	}
	if(document.getElementById('product').value != ''){
		document.getElementById('days').removeAttribute('hidden');
	}
});

function getTimes(date,id){
        var product1 = document.getElementById('product').value;
        var url = "https://api.integrityprodserver.com/salesAppointments/getSalesAppointments2.php?date="+date+"&product1="+product1;
        $.ajax({
          url: url,
          success: function (data)
          {
		placeTimes(data,id);
          }
        });
}

function placeTimes(data,id){
	data = JSON.parse(data);
	var times = data['availibility'];
	var formatedDate = new Date(data['date'] + " 01:00:00");
        formatedDate = formatedDate.toLocaleDateString();
	var available = 0;
	for(var time in times){
		available = available + times[time].length
		if(times[time].length != 0){
			var appointment = times[time][0];
                        var correctTime = toggle24hr(time);
                        var rep = appointment['id'];
			var newDiv = document.createElement('div');
			newDiv.innerHTML = correctTime;
			newDiv.classList.add('time');
			newDiv.setAttribute('data-rep',rep);
			newDiv.setAttribute('data-date',formatedDate);
			newDiv.setAttribute('data-time',correctTime);
			newDiv.setAttribute('onclick','setTime(this)');
			document.getElementById(id+"Times").append(newDiv);
		}
		if(available == 0){
			document.getElementById(id).classList.add('empty');
		}else{
			document.getElementById(id).classList.remove('empty');
		}
	}

}


function toggle24hr(time, onoff){
    if(onoff==undefined) onoff = isNaN(time.replace(':',''))//auto-detect format
    var pm = time.toString().toLowerCase().indexOf('pm')>-1 //check if 'pm' exists in the time string
    time = time.toString().toLowerCase().replace(/[ap]m/,'').split(':') //convert time to an array of numbers
    time[0] = Number(time[0])
    if(onoff){//convert to 24 hour:
        if((pm && time[0]!=12)) time[0] += 12
        else if(!pm && time[0]==12) time[0] = '00'  //handle midnight
        if(String(time[0]).length==1) time[0] = '0'+time[0] //add leading zeros if needed
    }else{ //convert to 12 hour:
        pm = time[0]>=12
        if(!time[0]) time[0]=12 //handle midnight
        else if(pm && time[0]!=12) time[0] -= 12
    }
    return onoff ? time.join(':') : time.join(':')+(pm ? ' pm' : ' am')
}

function setTime(time){
	var date = time.dataset['date'];
	var rep = time.dataset['rep'];
	var time = time.dataset['time'];
	var input = date+' '+time+'~'+rep;
	document.getElementById('dateTime').value = input;
	document.getElementById('continue2').removeAttribute('hidden');
}

function setAppointment(){
        document.getElementById('step3').classList.add('active');
        document.getElementById('step3').classList.remove('inactive');
        document.getElementById('step2Content').setAttribute('hidden','true');
        document.getElementById('step3Content').removeAttribute('hidden');
        document.getElementById('title').innerHTML = 'Contact Info';
}


</script>

</html>
