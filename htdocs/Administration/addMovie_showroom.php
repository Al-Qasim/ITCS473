<?php
require("Header.php");
require("Navbar.php");?>
<script> document.getElementById('showingtab').className='active';
		 document.getElementById('tabname').innerHTML="Showing";</script><?php

extract($_POST);
extract($_SESSION);
extract($_GET);
if(isset($movieDetails))
{
	
		$mDetails=explode("#", $movieDetails);
		echo "<div class='fullcolumn'>";
		echo "\t<div class='row'>\n";	
		echo "<div class='leftcolumn'>\n";
		//echo "\t<div class='row'>\n";
		echo "\t<div class='card'>\n";
		echo "<table>";
		echo "<form method='POST' action ='addMovie_showroom.php'> \n";

		//echo "<tr>\n";
		echo "<tr>\n";
		echo "<td>\n";
		echo "<div class='largecardcolumn'>\n";
		echo "\t<h2 align='left' >$mDetails[0]</h2>\n";
		// echo "\t<input type='hidden' value='$mDetails[0]' name='title' >\n";
		echo "</td>\n";
		echo "</tr>\n";
		
		echo "<tr>\n";
		echo "<td align='center'>\n";
		echo "<img width='240px' height='360px' align='left' src='$mDetails[3]'>\n";
		// echo "<input name='poster' type='hidden' value='$mDetails[3]'>\n";
		echo "</div>\n";
		echo "<div class='summarycolumn'>\n";
		echo "<p align='center' ><strong>Genre: </strong>$mDetails[4]</p><br />\n";
		// echo "<input type='hidden' name='genre' value='$mDetails[1]'/>\n";
		echo "<p align='center' ><strong>Summary: </strong> <br /><br />$mDetails[1]</p><br /><br />\n";
		echo "<p align='center' ><strong>Trailer Link: </strong> <br /><br />$mDetails[2]</p><br /><br />\n";
		// echo "<input type='hidden' name='summary' value='$mDetails[1]'/>\n";
		echo "</div>\n";
		echo "</td></tr>";
		echo "<tr><td>";
		echo "</td>\n";
		echo "</tr>\n";
		// echo "</form>\n";
		// echo "<form  method='POST' action ='addMovie_confirm.php'>\n";
		echo "</table>\n";
		echo "<table>\n";
		echo "<tr><td>";
		echo "<input class='cardbutton' type='submit' name='addtrailer' value='Add Trailer Link'/><br />\n";
		echo "</td>\n";
		echo "<td>";
		echo "<input id='link' class='textfield' type='text' name='trailerLink' size='65px' /><br />\n";
		echo "</td>\n";
		echo "</tr>\n";
		
		
		
		echo "</form>";
		echo "</table>";
		echo "</div>";
		
	echo "</div>";
	echo "</div>";
}

require("Copyrights.php");
require("Footer.php");
?>