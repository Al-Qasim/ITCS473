<?php
require("Header.php");
require("Navbar.php");?>
<script> document.getElementById('showingtab').className='active';
		 document.getElementById('tabname').innerHTML="Showing";</script><?php

extract($_POST);
extract($_GET);
if(isset($scrape))
{
	$imdbpage=file_get_contents(''.$imdblink);
	$scrapeSummary= "/<\/script>\n.*<div class=\"plot_summary.*\">\n.*<div class=\"summary_text\">\n(.*)/";
	$scrapePoster= "/<script type=\"application\/ld\+json\">{\n .*\n.*\n.*\n.*\n.*: \"(.*)\"/";
	$scrapeTitle= "/<script type=\"application\/ld\+json\">{\n .*\n.*\n.*\n .* \"(.*)\"/";
	$scrapeGenre= "/<script type=\"application\/ld\+json\">{\n.*\n.*\n.*\n.*\n.*\n.*\n.*\"(.*)\"/";
	preg_match($scrapeSummary,$imdbpage, $summaryMatch);
	preg_match($scrapePoster,$imdbpage, $posterMatch);
	preg_match($scrapeTitle,$imdbpage, $titleMatch);
	preg_match($scrapeGenre,$imdbpage, $genreMatch);
	
	//Print match arrays to test regex. (For testing)
	//print_r($imdblink);//check if link is wrong.	WIP
	//print_r($titleMatch);//check if match is empty.
	//print_r($summaryMatch);//check if match is empty.
	//print_r($posterMatch);//check if match is empty.
	//print_r($genreMatch);//check if match is empty.
	
	//print index[1] of match arrays only.(For testing)
	//echo "title: ".$titleMatch[1] ."<br />";
	//echo "summary: ".$summaryMatch[1]."<br />";
	//echo "poster link: ".$posterMatch[1]."<br />";
	//echo "genre: ".$genreMatch[1]."<br />";
	
	$_POST['newtitle']=$titleMatch[1]."";
	$_POST['newsummary']=trim($summaryMatch[1]."");
	$_POST['newposter']=$posterMatch[1]."";
	$_POST['newgenre']=$genreMatch[1]."";
	
	
		
		echo "<div class='fullcolumn'>";
		echo "\t<div class='row'>\n";	
		echo "<div class='leftcolumn'>\n";
		//echo "\t<div class='row'>\n";
		echo "\t<div class='card'>\n";
		echo "<table>";
		echo "<form method='POST' action ='addMovie_confirm.php'> \n";

		//echo "<tr>\n";
		echo "<tr>\n";
		echo "<td>\n";
		echo "<div class='largecardcolumn'>\n";
		echo "\t<h2 align='left' >$titleMatch[1]</h2>\n";
		echo "\t<input type='hidden' value='$titleMatch[1]' name='title' >\n";
		echo "</td>\n";
		echo "</tr>\n";
		
		echo "<tr>\n";
		echo "<td align='center'>\n";
		echo "<img width='240px' height='360px' align='left' src='$posterMatch[1]'>\n";
		echo "<input name='poster' type='hidden' value='$posterMatch[1]'>\n";
		echo "</div>\n";
		echo "<div class='summarycolumn'>\n";
		echo "<p align='center' ><strong>Genre: </strong>$genreMatch[1]</p><br />\n";
		echo "<input type='hidden' name='genre' value='$genreMatch[1]'/>\n";
		echo "<p align='center' ><strong>Summary: </strong> <br /><br />".trim($summaryMatch[1])."</p><br /><br />\n";
		echo "<input type='hidden' name='summary' value='".trim($summaryMatch[1])." '/>\n";
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
		
		// echo "<tr><td>\n";
		// echo "<div id='iframediv' class='shown largecardcolumn'>\n";
		// echo "<iframe id='trailer' width='720' height='480' src=''>";
		// echo "</td>\n";
		// echo "</tr>\n";
		// echo "</div>\n";
		// echo "</div>\n";
		
		
		
		echo "</form>";
		echo "</table>";
		echo "</div>";
		
	echo "</div>";
	echo "</div>";
}
else if(isset($add))
{
		echo "<form method='POST' action ='addMovie_almost.php'> \n";
		echo "<div class='fullcolumn'>";
		//echo "\t<div class='row'>\n";
		echo "<div align='center' class='card'>\n";
		echo "<table>\n";
		//heading
		echo "<tr>\n";
		echo "<td align='center'><h3 align='center' >Add through IMDB link</h3></td>\n";
		echo "</tr>\n";
		//1st button
		echo "<tr>\n";
		echo "<td align='center' width='600em' colspan='3'>\n";
		echo "<input class='textfield' type='text' name='imdblink'>\n";
		echo "<input class='controlbutton' type='submit' name='scrape' value='Add Movie Link'>\n";
		echo "</td>\n";
		echo "</tr>\n";

		//close control panel
		echo "</table>\n";
		echo "</div>";
		echo "</div>";
		echo "</form>\n";
}
require("Copyrights.php");
require("Footer.php");
?>