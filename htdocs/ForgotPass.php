<?php //unimplemented yet.
	 extract($_POST);
	 if(isset($email))
	 {
		 try
		 {
			 
		 }
		 
		 catch(PDOException $e){echo($e->getMessage());}
		 // {
		 // echo "Please submit the login form to view this page! <br />";
		 // }
		
		 // else if($error==2)
		 // {
		 // echo "Please fill all required fields! <br />";
		 // }
		
		 // else if($error==3)
		 // {
		 // echo "<p class='errormsg'> Wrong Password! </p><br />";
		 // }
	 
		 // else if($error==4)
		 // {
		 // echo "<p class='errormsg'> Wrong Username! </p><br />";
		 // }
	 // }?>
	 
require("Header.php");
require("Navbar.php");?>
<script> document.getElementById('logintab').className='active';
		 document.getElementById('tabname').innerHTML="Login";
//function validateUN{}
//function validatePW{}
</script>

	<div class="row">
	  <div class="leftcolumn">
		<div class="card">
		  

	
	<body>
	<form align='center' method='post' action='ForgotPass.php'>
	
	Email: <input class="textfield" type='email' name='email' /> <br /><br />
	<a href='ForgotPass.php'><p class='forgot'> Forgot your password? </p><br /></a>
	<div align="center" class="g-recaptcha" data-sitekey="6LcFgXkUAAAAAM9vwgp1IMFo7KmDTNMgT1v8SHTr"></div> <br /><br />
	
	<input class="button" type='submit' value='Send Password' />


	</form>

	

</div>
   
</body>
</html>
