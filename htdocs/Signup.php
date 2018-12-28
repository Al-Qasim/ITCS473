<?php
	 
	 
require("Header.php");
require("Navbar.php");?>
<script> document.getElementById('signuptab').className='active';
		 document.getElementById('tabname').innerHTML="Sign-up";

</script>
<div class="row">
  <div class="fullcolumn">
    <div class="card">
     	</head>
	<body>
	
	<?php
	if(isset($_GET['error'])){	
		extract($_GET);
		if($error==1)
			echo "<p class='errormsg'> Please fill in the form and properly submit it. </p>";
		else if($error==2)
			echo "<p class='errormsg'> Please fill in all the fields before submitting. </p>";
		else if($error==3)
			echo " <p class='errormsg'> Your confirmation password must be the same as your chosen password. </p>";
		else if($error==4)
			echo "<p class='errormsg'> You must accept the terms of service to complete your registration. </p>";
		else if($error==5)
			echo "<p class='errormsg'> You must complete captcha first. </p>";
		else if($error==6)
			echo "<p class='errormsg'> You must validate captcha first. </p>";
	}



?>
	
	<form  onsubmit='allowSubmission()' align='center' method='post' action='processSignup.php'>
	<table width='800px' align='center'>
		<tr>
			<td>
				<label class="label">First Name: &nbsp; </label> <input class="textfield" type='text' name='fname' oninput='validateFN(this.value)' />
			</td>
			<td>
				 &nbsp; 
			</td>
			</tr>
			<tr>
			<td colspan='2' align='center'>
				<p align='center' class='important' id='validinput1' ></p>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
				<label class="label">Last Name: &nbsp; </label> <input class="textfield" type='text' name='lname'  oninput='validateLN(this.value)' />
			</td>
			<td>
				 &nbsp; 
			</td>
			</tr>
			<tr>
			<td align='center' colspan='2' >
				<p class='important' id='validinput2' ></p>
			</td>
			<td>
			</td>
		
		</tr>
		<tr>
			<td>
				<label class="label">Tel. NO: &nbsp; </label> <input class="textfield" type='tel' name='tele'  oninput='validateTN(this.value)' /> 
			</td>
			<td>
				 &nbsp; 
			</td>
			</tr>
			<tr>
			<td align='center' colspan='2' >
				<p class='important' id='validinput3' ></p>
			</td>
			<td>
			</td>
		
		</tr>
		<tr>
			<td>
				<label class="label">Date of Birth: &nbsp; </label> <input class="date" type='date' max='2000-12-31' name='dob'/>
			</td>
			<td>
				 &nbsp; 
			</td>
			</tr>
			<tr>
			<td align='center' colspan='2' >
				<!--<p class='important' id='validinput2' ></p> -->
			</td>
			<td>
			</td>
		
		</tr>
		<tr>
			<td>
				<label class="label">Username: &nbsp; </label> <input class="textfield" type='text' name='uname'  oninput='validateUN(this.value)' />
			</td>
			<td>
				 &nbsp; 
			</td>
			</tr>
			<tr>
			<td align='center' colspan='2' >
				<p class='important' id='validinput4' ></p>
			</td>
			<td>
			</td>
		
		</tr>
		<tr>
			<td>
				<label class="label">Email: &nbsp; </label>	<input class="textfield" type='email' name='email'  oninput='validateEM(this.value)' />
			</td>
			<td>
				 &nbsp; 
			</td>
			</tr>
			<tr>
			<td align='center' colspan='2' >
				<p class='important' id='validinput5' ></p>
			</td>
			<td>
			</td>
		
		</tr>
		<tr>
			<td align='left'>
				<label class="label">Password: &nbsp; </label> <input class="textfield" id='PW' oninput='validatePW(this.value)' type='password' name='pword' />
			</td>
			<td>
				 &nbsp; 
			</td>
			</tr>
			<tr>
			<td align='center' colspan='2' >
				<p align='center' class='important' id='validinput6' ></p>
			</td>
			<td>
			</td>
		
		</tr>
		<tr>
			<td>
				<label class="label">Confirm Password: &nbsp; </label> <input class="textfield" id='CPW' type='password' oninput='confirmPW(this.value)' name='cpword' />
			</td>
			<td>
				 &nbsp; 
			</td>
			
			</tr>
			<tr>
			<td colspan='2' align='center'>
				<p class='important' id='validinput7' ></p>
			</td>
			<td>
			</td>
		
		</tr>
	</table>
	<div class="iframe"> <iframe height="300px" width="600px" 
frameborder="0" marginheight="20" marginwidth="35" 
scrolling="auto" src="Terms.html"></iframe></div> <br /><br />
	
	<div align="center" class="g-recaptcha" data-sitekey="6LcFgXkUAAAAAM9vwgp1IMFo7KmDTNMgT1v8SHTr"></div> <br /><br />
	
	<input class="check" type='checkbox' name='accept' value='true'/> I accept the terms and conditions of this service. <br /><br />
	<input class="check" type='checkbox' name='prom' value='true'/> Receive Promotional Emails. <br /><br />
	
	
	<input class="button" type='submit' name='reg' value='Register' />


	</form>

	

</div>
   
<?php
require("Copyrights.php");
require("Footer.php");
?>