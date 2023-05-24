<?php
require_once("materials.php");
$materials = getMaterials("warehouse");
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<style>
       .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
            /* add padding to account for vertical scrollbar */
            padding-right: 20px;
        } 
.center {
  text-align:center;
  margin: auto;
  width: 75%;
}
.checkboxes label {
  display: block;
  padding-right: 10px;
  padding-left: 22px;
  text-indent: -22px;
}
.checkboxes input {
  vertical-align: middle;
}
.checkboxes label span {
  vertical-align: middle;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="center">
	<img style='width:275px;' src='https://kiliassets.speetra.com/prod/account_images/479/logo/1614104508_original.png'>
	<h1>Warehouse Form</h1>
	<form method="post" action="sent.php">
	Job#: <input required="true" type="text" name="job" class="form-control form-control-lg">
	Truck number: <input type="number" name="truck" class="form-control form-control-lg" required>
	<br>
	<br>
	<div>
		<div>
			<div style="display:block;vertical-align:center">
				<input type="checkbox" name="order[check]" id="order" value="order" onclick="addFields('order')">
				<label for="order">Order (Need for a job)</label>
			</div>
			<div id="order-fields" hidden>
				<h2>Orders</h2>
				<div>
					Material: <input type="text" name="order[1][material]" id="order-material-1" class="material form-control form-control-lg" onkeyup="newFields('order',1)">
					Quantity: <input type="number" name="order[1][qty]" id="order-qty-1" class="form-control" onkeyup="newFields('order',1)">
					<br>
				</div>
			</div>
			<br>
		</div>

		<div>
			<div style="display:block;vertical-align:center">
				<input style="vertical-align:center" type="checkbox" name="return[check]" id="return" value="return" onclick="addFields('return')">
				<label for="return">Return (Did not use on job)</label>
			</div>
                	<div id="return-fields" hidden>
				<h2>Returns</h2>
				<div>
	                	        Material: <input "type="text" name="return[1][material]" id="return-material-1" class="material form-control form-control-lg" onkeyup="newFields('return',1)">
        		                Quantity: <input type="number" name="return[1][qty]" id="return-qty-1"  class="form-control form-control-lg" onkeyup="newFields('return',1)">
					<br>
				</div>
                	</div>
			<br>
		</div>
		<div>
			<div style="vertical-align:center">
				<input type="checkbox" name="used[check]"  id="used" value="used" onclick="addFields('used')">
				<label for="used"> Used from Truck on job</label>
			</div>
        	        <div id="used-fields" hidden>
				<h2>Used</h2>
				<div>
        	        	        Material: <input type="text" name="used[1][material]" id="used-material-1" class="material form-control form-control-lg" onkeyup="newFields('used',1)">
	                        	Quantity: <input type="number" name="used[1][qty]" id="used-qty-1" class="form-control form-control-lg" onkeyup="newFields('used',1)">
					<br>
				</div>
	                </div>
	                <br>
		</div>
	</div>
	<br>
	Comment: <textarea name="comment" rows="5" class="form-control form-control-lg" cols="40"></textarea>
	<br>
	<input type="submit" name="submit" value="Submit">
	</form>
</div>

<script>
	function addFields(i){
		var checkbox = document.getElementById(i);
		var Fields = document.getElementById(i + "-fields");
		if(checkbox.checked == true){
			Fields.removeAttribute("hidden");
		}else{
			Fields.setAttribute("hidden","true");
		}
	}
	function newFields(i,j){
		var fieldCount = document.getElementById(i + "-fields").childElementCount;
		var material = document.getElementById(i + '-material-' + j);
		var qty = document.getElementById(i + '-qty-' + j);
		if(material.value.length != 0 && qty.value.length != 0 && j == fieldCount-1){
			var newDiv = document.createElement("div");
			newDiv.setAttribute("style","border-top: 10px solid gray");
			var newMaterial = document.createElement("input");
			newMaterial.setAttribute("name",i + "[" + fieldCount + "]" + "[material]");
			newMaterial.setAttribute("class","material form-control form-control-lg");
			newMaterial.setAttribute("id",i + "-material-" + fieldCount);
			newMaterial.setAttribute("onkeyup","newFields('" + i + "', '" + fieldCount + "')");
			var newQty = document.createElement("input");
			newQty.setAttribute("type","number");
			newQty.setAttribute("class","form-control form-control-lg");
			newQty.setAttribute("name",i + "[" + fieldCount + "]" + "[qty]");
			newQty.setAttribute("id",i + "-qty-" + fieldCount);
			newQty.setAttribute("onkeyup","newFields('" + i + "', '" + fieldCount + "')");
			var newMaterialName = document.createTextNode("Material: ");
			var newQtyName = document.createTextNode("Quantity: ");
			var newSpace = document.createTextNode(" ");
			var newBr = document.createElement("br");
			newDiv.appendChild(newMaterialName);
			newDiv.appendChild(newMaterial);
			newDiv.appendChild(newSpace);
			newDiv.appendChild(newQtyName);
			newDiv.appendChild(newQty);
			newDiv.appendChild(newBr);
			var fields = document.getElementById(i + "-fields");
			fields.appendChild(newDiv);
		}
	}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
	<?php
		$last = count($materials) -1;
		foreach($materials as $index => $material){
			if($material['materials_skus_name'] != ''){
				echo"'";
				print_r(addslashes($material['materials_name']));
				echo" : ";
				print_r(addslashes($material['materials_skus_name']));
				echo"'";
				if($index != $last){
					print_r(",");
				}
			}else{
                                echo"'";
                                print_r(addslashes($material['materials_name']));
                                echo"'";
                                if($index != $last){
                                        print_r(",");
                                }
			}
		}

	?>
    ];
$('body').on('click', '.material', function() {
    $(this).autocomplete({
        source: availableTags,
        minLength: 1,
        select: function(event, ui) {
            //update input with selection
            $(event.target).val(ui.item.value);
        }
    });
});

  } );
  </script>
</body>
