<?php

?>

<head>
	 <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
	<form>
		<input name='test'></input>
		<button class="g-recaptcha" 
        	data-sitekey="6LfAk7shAAAAAJDHQ-2ds86mFjqk58JzQ1j0sdwS" 
	        data-callback='onSubmit' 
        	data-action='submit'>Submit</button>
	</form>
</body>
 <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
