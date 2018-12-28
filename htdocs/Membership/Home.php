<?php
require("Header.php");
require("Navbar.php");?>
<script> document.getElementById('hometab').className='active';
		 document.getElementById('tabname').innerHTML="Home";</script>
<div class="row">
  <div class="leftcolumn">
    <div class="card"><?php
	if(isset($_GET['error']))
	{
		if($_GET['error']==404)
			echo "<p class='errormsg' >You are allowed access to Members Area ONLY!</p><br />";
	}
	
	?>
      <h2>If you opt for our services you might be the lucky winner of our ticket giveaway!</h2>
      <h5>Winner members will be sent notifications, <?php echo date('M d, Y');?></h5>
      <p>The participants must comply with the following rules..</p>
      <ol>
		<li>Must be over 14 years old.</li>
		<li>Must have spent over 10BHD over the last 3 months.</li>
		<li>Must not be a member of staff.</li>
		<li>Must have rated at least 3 movies.</li>
	  </ol>
    </div>
    
<?php
require("Copyrights.php");
require("Footer.php");
?>