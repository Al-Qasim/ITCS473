<?php
require("Header.php");
require("Navbar.php");?>
<script> document.getElementById('showingtab').className='active';
		 document.getElementById('tabname').innerHTML="Showing";</script><?php
extract($_POST);
if(isset($addtrailer)){
	$_SESSION['movieDetails']=$title."#".$summary."#".$trailerLink."#".$poster."#".$genre;
echo "<div class='fullcolumn'>";
		echo "\t<div class='row'>\n";	
		echo "<div class='leftcolumn'>\n";
		//echo "\t<div class='row'>\n";
		echo "\t<div class='card'>\n";
		echo "<table>";
		echo "<form method='POST' action ='processAddMovie.php'> \n";

		//echo "<tr>\n";
		echo "<tr>\n";
		echo "<td>\n";
		echo "<div class='largecardcolumn'>\n";
		echo "\t<h2 align='left' >$title</h2>\n";
		echo "</td>\n";
		echo "</tr>\n";
		
		echo "<tr>\n";
		echo "<td align='center'>\n";
		echo "<img width='240px' height='360px' align='left' src='$poster'>\n";
		echo "</div>\n";
		echo "<div class='summarycolumn'>\n";
		echo "<p align='center' ><strong>Genre: </strong>$genre</p><br />\n";
		echo "<p align='center' ><strong>Summary: </strong> <br /><br />$summary</p><br /><br />\n";
		echo "<input align='center' class='cardbutton' type='submit' name='confirmAdd' value='Confirm Movie Details'><br />\n";
		echo "</div>\n";
		echo "</td></tr>";
		echo "<tr><td>";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</form>\n";
		echo "</table>\n";
		echo "<table>\n";
		echo "<form method='POST' action ='addMovie_confirm.php'>\n";
		echo "<tr><td>";
		echo "<input class='cardbutton' type='submit' name='addtrailer' value='Add Trailer Link'/><br />\n";
		echo "</td>\n";
		echo "<td>";
		echo "<input id='link' class='textfield' type='text' name='trailerLink' size='65px' /><br />\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
		echo "<table>\n";
		echo "<tr><td>\n";
		echo "<br /><div id='iframediv' class='shown largecardcolumn'>\n";
		echo "<iframe id='trailer' width='720' height='480' src='$trailerLink'>";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</div>\n";
		echo "</div>\n";
		
		
		
		echo "</form>";
		echo "</table>";
		echo "</div>";
		
	echo "</div>";
	echo "</div>";
}
require("Copyrights.php");
require("Footer.php");
?>