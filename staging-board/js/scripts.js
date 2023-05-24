function openProduct(evt, productName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(productName).style.display = "block";
  evt.currentTarget.className += " active";
}

getBoards(loadBoard);

function loadBoard(data){
	data = JSON.parse(data)
	var tabs = document.getElementById('tabs');
	for(i=0;i<data.length;i++){
		var boardID = data[i]['id'];
		var boardName = data[i]['name'];
		var button = document.createElement('button');
		button.innerHTML = boardName;
		button.classList.add('tablinks');
                button.setAttribute('onclick',"openProduct(event, 'board-" + boardID+ "')");
		tabs.append(button);
		var div = document.createElement('div');
		div.classList.add('tabcontent');
		div.id = "board-"+boardID;
		var header = document.createElement('div');
		header.classList.add('header');
		div.append(header);
		var content = document.createElement('div');
		content.classList.add('content');
		header.append(content);
		var name = document.createElement('h3');
		name.innerHTML = boardName;
		content.append(name);
		var edit = document.createElement('button');
		edit.innerHTML = 'Edit';
		edit.classList.add('btn');
		edit.classList.add('btn-primary');
		content.append(edit);
		var unassigned = document.createElement('div');
		unassigned.classList.add('jobs');
		unassigned.id = 'unassigned-'+boardID;
		content.append(unassigned);
		document.getElementById('tabBody').append(div);
		var body = document.createElement('div');
		body.classList.add('tabBody');
		div.append(body);
	}
	getBays(loadBays);
}

function loadBays(data){
	data = JSON.parse(data)
	for(i=0;i<data.length;i++){
		var boardID = data[i]['board_id'];
		var bayName = data[i]['name'];
		var bayID = data[i]['id'];
		var board = document.getElementById('board-'+boardID).lastChild;
		var div = document.createElement('div');
		div.classList.add('bays-wrapper');
		board.append(div);
		var name = document.createElement('h4');
		name.innerHTML = bayName;
		div.append(name);
		var jobs = document.createElement('div');
		jobs.classList.add('bays');
		div.append(jobs);
	}
}

function error(response){
        console.log(response);
	alert("ERROR");
}

function openBoardSettings(){
	
}

function getBoards(success){
        var url = "ajax.php?action=getBoards";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
                if (xhttp.readyState === 4) {
                        var response = xhttp.responseText;
                        if (xhttp.status === 200) {
                                success(response);
                        }else{
                                error(response);
                        }
                }
        }
        xhttp.open("GET", url, true);
	xhttp.send();
}

function getBays(success){
	var url = "ajax.php?action=getBays";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
                if (xhttp.readyState === 4) {
                        var response = xhttp.responseText;
                        if (xhttp.status === 200) {
                                success(response);
                        }else{
                                error(response);
                        }
                }
        }
        xhttp.open("GET", url, true);
        xhttp.send();
}
