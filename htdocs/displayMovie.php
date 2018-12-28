<?php
	 
require("Header.php");
require("Navbar.php");
extract($_POST);?>

<script> 
document.getElementById('showingtab').className='active';
		 document.getElementById('tabname').innerHTML="<?php $movieName ?>";</script><?php
if(isset($viewDetails)) //put cover in cardcolumn && Summary in another one && trailer in another one.
{
		echo "<div class='fullcolumn'>";
		echo "\t<div class='row'>\n";	
		echo "<div class='leftcolumn'>\n";
		//echo "\t<div class='row'>\n";
		echo "\t<div class='card'>\n";
		echo "<table>";
		echo "<form method='POST' action ='Login.php'> \n";

		//echo "<tr>\n";
		echo "<tr>\n";
		echo "<td>\n";
		echo "<div class='largecardcolumn'>\n";
		echo "\t<h2 align='left' >$movieName</h5>\n";
		echo "\t<input type='hidden' name='movieName' value='$movieName'>\n";
		echo "\t<input type='hidden' name='movieId' value='$movieID'>\n";
		echo "</td>\n";
		echo "</tr>\n";
		
		echo "<tr>\n";
		echo "<td align='center'>\n";
		echo "<img width='240px' height='360px'   align='left' src='$coverpic'>\n";
		echo "<input type='hidden' name='coverpic' value='$coverpic'>\n";
		echo "</div>\n";
		echo "<div class='summarycolumn'>\n";
		echo "<p align='center' >Summary: <br /><br />$summary</p><br /><br />\n";
		echo "<input type='hidden' name='summary' value='$summary'>\n";
		echo "<input align='center' class='cardbutton' type='submit' name='Book' value='You Must Log in to book tickets'><br />\n";
		echo "</div>\n";
		echo "</td></tr>";
		echo "<tr><td>";
		echo "<div class='largecardcolumn'>\n";
		echo "<iframe width='720' height='480' src='$trailer'>";
		echo "<input type='hidden' name='Trailer' value='$trailer'>\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</div>\n";
		//echo "</tr>\n";
		
		// echo "<tr>\n";
		// echo "<td align='center'>\n";
		
		
		// echo "</td>\n";
		// echo "</tr>\n";
		
		echo "</table>";
		//echo "</div>";
		echo "</div>";
		echo "</div>";
		
	echo "</div>";
	echo "</div>";
}
			
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
	}

require("Copyrights.php");
require("Footer.php");
?>