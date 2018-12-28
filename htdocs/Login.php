<?php
	 
	 
require("Header.php");
require("Navbar.php");?>
<script> document.getElementById('logintab').className='active';
		 document.getElementById('tabname').innerHTML="Login";
//
//function validatePW{}
</script>

	<div class="row">
	  <div class="leftcolumn">
		<div class="card">
		  

	</head>
	<body>
	<form align='center' method='post' action='processLogin.php'>
	<?php extract($_GET);
	 if(isset($error))
	 {
		 if($error==1)
		 {
		 echo "<p class='errormsg'> You must login to view this page! </p> <br />";
		 }
		
		 else if($error==2)
		 {
		 echo "<p class='errormsg'> Please fill all required fields! </p> <br />";
		 }
		
		 else if($error==3)
		 {
		 echo "<p class='errormsg'> Wrong Password! </p><br />";
		 }
	 
		 else if($error==4)
		 {
		 echo "<p class='errormsg'> Wrong Username! </p><br />";
		 }
		 else if($error==5)
		 {
		 echo "<p class='errormsg'> Captcha has not loaded! </p><br />";
		 }
		 else if($error==6)
		 {
		 echo "<p class='errormsg'> Please validate Captcha! </p><br />";
	 }}?>
	
	Username: <input class="textfield" type='text' name='uname'/> <br />
	<br />
	Password: <input class="textfield" type='password' name='pword' /> <br />
	<br />
	<input class="check"  type='checkbox' name='keep' value='true'/> Keep me logged in <br />
	<a href='ForgotPass.php'><p class='forgot'> Forgot your password? </p><br /></a>
	<div align="center" class="g-recaptcha" data-sitekey="6LcFgXkUAAAAAM9vwgp1IMFo7KmDTNMgT1v8SHTr"></div> <br />
	
	<input class="button" type='submit' value='Login'/>

	
	</form>
 <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit">

    </script>
	

</div>
    
<?php
require("Copyrights.php");
require("Footer.php");
?>