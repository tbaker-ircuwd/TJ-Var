<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<style>
body{
    background-color: transparent;
}
ul, thead{
        list-style-type: none;
        font-family: 'Open Sans', sans-serif;
        font-size: .9em;
        line-height: 120%;
        padding:0px;
}
table{
        width:100%;
        margin:auto;
        text-align:center;
}
table tr{
        vertical-align:top;
        font-family: 'Open Sans', sans-serif;
        font-size: .9em;
        text-align:left;
}
label{
  display: contents;
}
ul li label{
        margin-bottom: .75rem;
}
ul input[type=text], ul input[type=number], ul input[type=email], ul input[type=tel], ul textarea, ul select{
        border-radius:.15em;
        width:100%;
        line-height:130%;
        padding:.75em;
        margin-bottom:1.25rem;
        background-color: #fff;
        font-size:1em;
        border:solid black 1px;
}
ul button{
        background:#f5cb2e;
        color: #272317;
        padding: 1.7em 4em;
        border:none;
        border-radius:.25em;
        cursor:pointer;
}
input[type="date"]{
        display: inline-block;
        width: auto;
}
.day{
        padding-bottom:1em;
}
.error{
        font-family: 'Open Sans', sans-serif;
        font-size: .9em;
        line-height: 120%;
        padding:0px;
        color:red;
}
.lds-facebook {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-facebook div {
  display: inline-block;
  position: absolute;
  left: 8px;
  width: 16px;
  background: #f5cb2e;
  border: solid black 1px;
  animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
}
.lds-facebook div:nth-child(1) {
  left: 8px;
  animation-delay: -0.24s;
}
.lds-facebook div:nth-child(2) {
  left: 32px;
  animation-delay: -0.12s;
}
.lds-facebook div:nth-child(3) {
  left: 56px;
  animation-delay: 0;
}
@keyframes lds-facebook {
  0% {
    top: 8px;
    height: 64px;
  }
  50%, 100% {
    top: 24px;
    height: 32px;
  }
}

</style>

<div id='viewableForm' style='max-width:680;margin:auto;'>
        <form method='POST' action="https://integrityhomeexteriors.com/wp-content/themes/integrity/submit.php">
                <div>
                        <ul>
                                <li><label>Name</label></li>
                                <li><input required type='text' name='firstname' placeholder='First'/></li>
                                <li><input required type='text' name='lastname' placeholder='Last'/></li>
                        </ul>
                        <ul>
                                <li><label>Address<label></li>
                                <li><input required type='text' name='streetAddress' placeholder='Street Address'/></li>
                                <li><input required type='text' name='city' placeholder='City'/></li>
                                <li><input required type='text' name='state' placeholder='State'/></li>
                                <li><input required type='number' name='zip' placeholder='Zip Code'/></li>
                        </ul>
                        <ul>
                                <li><label>Phone</label></li>
                                <li><input required name='phone' type='tel' placeholder='(999)999-999'/></li>
                        </ul>
                        <ul>
                                <li><label>Email</label></li>
                                <li><input name='email' type='email' placeholder='Email'/></li>
                        </ul>
                        <ul>
                                <li><label>What services are you interested in?</label></li>
                                <li style='padding:0.25em;'><input required type='checkbox' name='product[]' id='Roofing' value='Roof (Res)' onclick='processChecks()' class='form form-control' /><label for='Roofing'>&nbsp;Roofing</label></li>
                                <li style='padding:0.25em;'><input required type='checkbox' name='product[]' id='Windows' value='Windows' onclick='processChecks()' class='form form-control'/><label for='Windows'>&nbsp;Windows</label></li>
                                <li style='padding:0.25em;'><input required type='checkbox' name='product[]' id='Doors' value='Doors' onclick='processChecks()' class='form form-control'/><label for='Doors'>&nbsp;Doors</label></li>
                                <li style='padding:0.25em;'><input required type='checkbox' name='product[]' id='Insulation' value='Insulation' onclick='processChecks()' class='form form-control'/><label for='Insulation'>&nbsp;Insulation</label></li>
                                <li style='padding:0.25em;'><input required type='checkbox' name='product[]' id='Gutters' value='Gutters' onclick='processChecks()' class='form form-control'/><label for='Gutters'>&nbsp;Gutters</label></li>
                                <li style='padding:0.25em;'><input required type='checkbox' name='product[]' id='Siding' value='Siding' onclick='processChecks()' class='form form-control'/><label for='Siding'>&nbsp;Siding</label></li>
                                <li style='padding:0.25em;margin-bottom:1rem;'><input required type='checkbox' name='product[]' id='Repairs' value='SFP (Res)' onclick='processChecks()' class='form form-control'/><label for='Repairs'>&nbsp;Repairs</label></li>
                        </ul>
                        <ul>
                                <li><label>Comments</label></li>
                                <li><textarea name='notes'></textarea></li>
                        </ul>
			<ul>
				<li><label>How did you hear about us?</label></li>
				<li>
					<select name='howdidyouhear'>
						<option></option>
						<option>TV</option>
						<option>Radio</option>
						<option>Internet</option>
						<option>Yard Sign</option>
						<option>Social Media</option>
						<option>You’ve improved the home of my friend of family member</option>
						<option>You’ve improved my home before</option>
						<option>Other</option>
					</select>
				</li>
			</ul>
                        <ul>
                                <li><label>How would you like to schedule your appointment?</label></li>
                                <li style='margin-bottom:1rem;padding:0.25em;'><input required type='radio' name='whereToSchedule' id='online' value='online' onclick="setSchedule()" class='form form-control'/><label for='online'>&nbsp;Online</label>&nbsp;<input type='radio' name='whereToSchedule' id='call' value='call' onclick="setSchedule()" class='form form-control'/><label for='call'>&nbsp;Call Me</label></li>
                        </ul>
                                <div id='error' class='error' hidden><strong>*Please select 1 or more products*</strong></div>
                                <div id='schedule' hidden>
                                        <div style='text-align:center;'>
                                                <i class="fa fa-angle-double-left" style="font-size:36px;cursor:pointer;" onclick='lastWeek()'></i>
                                                <input type='date' id='date' onchange='jumpTo()'/>
                                                <i class="fa fa-angle-double-right" style="font-size:36px;cursor:pointer;" onclick='nextWeek()'></i>
                                        </div>
                                        <table style='max-width:680px'>
                                                <thead>
                                                        <tr id='loader'>
                                                                <th colspan='7' style='text-align:center'>
                                                                        <strong>Loading available time slots...</strong>
                                                                        <br>
                                                                        <div class="lds-facebook"><div></div><div></div><div></div></div>
                                                                </th>
                                                        </tr>
                                                </thead>
                                                <tbody id='days'>
                                                        <tr>
                                                                <th id='header0'><?php echo date("l",strtotime("+1 day"));?></th>
                                                        </tr>
                                                        <tr>
                                                                <td><div id="day1" class="day"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <th id='header1'><?php echo date("l",strtotime("+2 days"));?></th>
                                                        </tr>
                                                        <tr>
                                                                <td><div id="day2" class="day"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <th id='header2'><?php echo date("l",strtotime("+3 days"));?></th>
                                                        </tr>
                                                        <tr>
                                                                <td><div id="day3" class="day"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <th id='header3'><?php echo date("l",strtotime("+4 days"));?></th>
                                                        </tr>
                                                        <tr>
                                                                <td><div id="day4" class="day"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <th id='header4'><?php echo date("l",strtotime("+5 days"));?></th>
                                                        </tr>
                                                        <tr>
                                                                <td><div id="day5" class="day"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <th id='header5'><?php echo date("l",strtotime("+6 days"));?></th>
                                                        </tr>
                                                        <tr>
                                                                <td><div id="day6" class="day"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <th id='header6'><?php echo date("l",strtotime("+7 days"));?></th>
                                                        </tr>
                                                        <tr>
                                                                <td><div id="day7" class="day"></div></td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                        <ul>
                                <li><button><strong>SCHEDULE MY ESTIMATE</strong></button></li>
                        </ul>
                </div>
        </form>
</div>

<div id='success' hidden>
        <h2 style='text-align:center'>We have received your information and will be reaching out to you shortly</h2>
</div>

<div id='loadingForm' style='text-align:center;' hidden>
        <div class="lds-facebook"><div></div><div></div><div></div></div>
</div>

<script>
function processChecks(){
        var checks = document.querySelectorAll('input[name^=product]');
        if(document.querySelectorAll('input[name^=product]:checked').length >= 4 ){
                document.querySelector("#online").checked = false;
                document.querySelector("#online").setAttribute('disabled',true);
                document.querySelector("#call").checked = true;
        }else{
                document.querySelector("#online").removeAttribute('disabled');
        }
        if(document.querySelectorAll('input[name^=product]:checked').length > 0){
                for(i=0;i<checks.length;i++){
                        checks[i].removeAttribute('required');
                }
        }else{
                for(i=0;i<checks.length;i++){
                        checks[i].setAttribute('required',true);
                }
        }
        setSchedule();
}
function setSchedule(){
        var type = document.getElementsByName('whereToSchedule');
        if(type[0].checked){
                if(document.querySelectorAll('input[name^=product]:checked').length == 0){
                        document.getElementById('error').removeAttribute('hidden');
                        document.getElementById('schedule').setAttribute('hidden',true);
                }else{
                        document.getElementById('error').setAttribute('hidden',true);
                        document.getElementById('schedule').removeAttribute('hidden');
                        var days = document.getElementsByClassName('day');
                        for(i=0;i<days.length;i++){
                                var newDate = new Date();
                                newDate.setDate(newDate.getDate() + parseInt(days[i].id.replace('day','')));
                                days[i].style.display = 'none';
                                document.getElementById('days').setAttribute('hidden',true);
                                getAvailibility(newDate.toLocaleDateString(),days[i].id);
                        }
                }
        }else{
                document.getElementById('error').setAttribute('hidden',true);
                document.getElementById('schedule').setAttribute('hidden',true);
        }
}
function getAvailibility(date,id){
        var products = document.querySelectorAll('input[name^=product]:checked');
        var product1 = products[0].value;
        if(products[1]){
                var product2 = products[1].value;
        }
        if(products[2]){
                var product3 = products[2].value;;
        }
        document.getElementById('loader').removeAttribute('hidden');
        var url = "https://api.integrityprodserver.com/salesAppointments/getSalesAppointments2.php?date="+date+"&product1="+product1+"&product2="+product2+"&product3="+product3;
        $.ajax({
          url: url,
          success: function (data)
          {
                placeAvailibility(data,id);
          }
        });
}

function placeAvailibility(data,id){
        var data = JSON.parse(data);
        var day = document.getElementById(id);
        var formatedDate = new Date(data['date'] + " 01:00:00");
        formatedDate = formatedDate.toLocaleDateString();
        var content = "<strong style='text-decoration:underline;'>"+formatedDate+"</strong><br><div style='padding-top:0.5em;'>";
        var availibility = data['availibility'];
        for(var time in availibility){
                if(availibility[time].length != 0){
                        var appointment = availibility[time][0];
                        var correctTime = toggle24hr(time);
                        var rep = appointment['id'];
                        content += "<input required='true' name='dateTime' id='" + formatedDate +  " " + time + "'  value='" + formatedDate +  " " + time + "~" + rep + "' type='radio' class='form form-control'/><label for='" + formatedDate +  " " + time + "'><strong style='margin-right:10px;margin-top:3px;'>&nbsp;"+correctTime+"</strong></label>";
                }
        }
        if(content == "<strong style='text-decoration:underline;'>"+formatedDate+"</strong><br><div style='padding-top:0.5em;'>"){
                content += "<div style='margin:5px;text-align:center;'><strong>No available time slots</strong></div>";
        }
        content += "</div>";
        day.innerHTML = content;
}

$(document).ajaxStop(function() {
        var days = document.getElementsByClassName('day');
        for(i=0;i<days.length;i++){
                days[i].style.display = '';
        }
        document.getElementById('days').removeAttribute('hidden');
        document.getElementById('loader').setAttribute('hidden',true);
});

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
function nextWeek(){
    var pickedDate = document.getElementById('date').value;

    var today = new Date();
    var pickedDate = new Date(pickedDate);
        var diff = pickedDate.getTime() - today.getTime();
        var diff = Math.ceil(diff / (1000*3600*24));
    if(diff >= 23){
        return;
    }else{
        var move = 7;
    }

    var divs = document.getElementsByClassName('day');
/*
        var product1 = document.getElementById('product1').value;
    var product2 = document.getElementById('product2').value;
    var product3 = document.getElementById('product3').value;
    if(product1 == ''){
                return;
        }
*/
    for(i = 0;i<divs.length;i++){
        console.log('here');
        var div = divs[i];
        div.innerHTML = '';
        div.classList.add('loader');
        var divID = div.id.split("day");
        divID = parseInt(divID[1]);
        var newID = divID + 7;
        div.id = "day"+newID;
        getAvailibility(getDate(newID),div.id);
    }
    var oldDate = document.getElementById('date').value;
        oldDate = new Date(oldDate);
        oldDate.setDate(oldDate.getDate() + 8);
        var mm = oldDate.getMonth() +1 ;
        var mm = ("0" + mm).slice(-2);
        var dd = oldDate.getDate();
        var dd = ("0" + dd).slice(-2);
        var yyyy = oldDate.getFullYear();
        var newDate = yyyy + "-" + mm + "-" + dd;
        document.getElementById('date').value = newDate;
}


function lastWeek(){
    var pickedDate = document.getElementById('date').value;

    var today = new Date();
    var pickedDate = new Date(pickedDate);
        var diff = pickedDate.getTime() - today.getTime();
        var diff = Math.ceil(diff / (1000*3600*24));
    if(diff == 1){
        return;
    }else if(diff > 0 && diff < 8){
        var move = diff -1
        for(i = 0;i < document.getElementsByClassName('day').length; i++){
                    var id = 'header'+i;
                    var header = document.getElementById(id);
                    var dow = weekDay(i + 1);
                    header.innerHTML = dow;
            }
    }else{
        var move = 7;
    }
        var divs = document.getElementsByClassName('day');
/*
        var product1 = document.getElementById('product1').value;
        var product2 = document.getElementById('product2').value;
        var product3 = document.getElementById('product3').value;
        if(product1 == ''){
                return;
        }
*/
        for(i = 0;i<divs.length;i++){
                var div = divs[i];
        div.innerHTML = '';
                div.classList.add('loader');
                var divID = div.id.split("day");
                divID = parseInt(divID[1]);
                var newID = divID - move;
                div.id = "day"+newID;
                getAvailibility(getDate(newID),div.id);
        }
    var oldDate = document.getElementById('date').value;
        oldDate = new Date(oldDate);
        oldDate.setDate(oldDate.getDate() - move + 1);
    var mm = oldDate.getMonth() +1 ;
        var mm = ("0" + mm).slice(-2);
        var dd = oldDate.getDate();
        var dd = ("0" + dd).slice(-2);
        var yyyy = oldDate.getFullYear();
        var newDate = yyyy + "-" + mm + "-" + dd;
        document.getElementById('date').value = newDate;
}

function getDate(add = 0){
    const day = new Date();
    day.setDate(day.getDate() + add);
    var mm = (day.getMonth() + 1);
    var dd = day.getDate();
    var yyyy = day.getFullYear();
    result = mm + "/" + dd + "/" + yyyy;
    return result;
}

function weekDay(add = 0){
        const day = new Date();
        day.setDate(day.getDate() + add);
        var weekday = day.getDay();
        switch(weekday){
                case 0:
                        weekday = "Sunday";
                        break;
                case 1:
                        weekday = "Monday";
                        break;
                case 2:
                        weekday = "Tuesday";
                        break;
                case 3:
                        weekday = "Wednesday";
                        break;
                case 4:
                        weekday = "Thursday";
                        break;
                case 5:
                        weekday = "Friday";
                        break;
                case 6:
                        weekday = "Saturday";
                        break;
        }
        return weekday;
}
function jumpTo(){
        var divs = document.getElementsByClassName('day');
/*
        var product1 = document.getElementById('product1').value;
        var product2 = document.getElementById('product2').value;
        var product3 = document.getElementById('product3').value;
*/
        var date = document.getElementById('date').value;
        var today = new Date();
        var jump = new Date(date);
        var diff = jump.getTime() - today.getTime();
        var diff = Math.ceil(diff / (1000*3600*24));
        for(i = 0;i<divs.length;i++){
                var div = divs[i];
                div.innerHTML = '';
                div.classList.add('loader');
                var divID = div.id.split("day");
                divID = parseInt(divID[1]);
                var newID = diff + i;
                div.id = "day"+newID;
                getAvailibility(getDate(newID),div.id);
        }
        for(i = 0;i < document.getElementsByClassName('day').length; i++){
                var id = 'header'+i;
                var header = document.getElementById(id);
                var dow = weekDay(i + diff);
                header.innerHTML = dow;

        }

}

$(document).on("submit", "form", function(event){
        event.preventDefault();
        var url = "https://integrityhomeexteriors.com/wp-content/themes/integrity/submit.php";
//	var url = 'submit.php';
        $.ajax({
                type: "POST",
                url: url,
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function() {
                        document.getElementById('viewableForm').setAttribute('hidden','true');
                        document.getElementById('loadingForm').removeAttribute('hidden');
                },
                success: function (data, status)
                {
                        document.getElementById('loadingForm').setAttribute('hidden','true');
                        document.getElementById('success').removeAttribute('hidden');
                },
                error: function (xhr, desc, err)
                {
                        document.getElementById('loadingForm').setAttribute('hidden','true');
                        document.getElementById('viewableForm').removeAttribute('hidden');
                        alert('Encountered Error');
                }

        })
});



var oldDate = new Date();
        oldDate.setDate(oldDate.getDate() + 1);
        var mm = oldDate.getMonth() +1 ;
        var mm = ("0" + mm).slice(-2);
        var dd = oldDate.getDate();
        var dd = ("0" + dd).slice(-2);
        var yyyy = oldDate.getFullYear();
        var newDate = yyyy + "-" + mm + "-" + dd;

var today = new Date();
        today.setDate(today.getDate() + 30);
        var mm = today.getMonth() +1 ;
        var mm = ("0" + mm).slice(-2);
        var dd = today.getDate();
        var dd = ("0" + dd).slice(-2);
        var yyyy = today.getFullYear();
        var month = yyyy + "-" + mm + "-" + dd;


document.getElementById('date').value = newDate;
document.getElementById('date').min = newDate;
document.getElementById('date').max = month;


</script>

