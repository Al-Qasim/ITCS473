<?php //count divs to know how to make hall timings in the same one.
	 
require("Header.php");
require("Navbar.php");
extract($_POST);

$numOfHalls=0;	?>

<script> 
document.getElementById('showingtab').className='active';
</script>
<?php
		 
		 
		 
echo "<div class='fullcolumn'>";
		echo "<div class='row'>\n";	
		echo "<div class='leftcolumn'>\n";
		//echo "\t<div class='row'>\n";
		echo "<div class='card'>\n";
		echo "<table>";
		echo "<form method='POST' action ='reserveSeats.php'> \n";

		
		echo "<tr>\n";
		echo "<td>\n";
		echo "<div class='largecardcolumn'>\n";
		echo "<h2 align='left' >$movieName</h5>\n";
		echo "<input type='hidden' name='movieName' value='$movieName'>\n";
		echo "<input type='hidden' name='movieID' value='$movieId'>\n";
		echo "</td>\n";
		echo "</tr>\n";
		
		echo "<tr>\n";
		echo "<td align='center'>\n";
		echo "<img align='left' src='$coverpic'>\n";
		echo "<input type='hidden' name='coverpic' value='$coverpic'>\n";
		echo "</div>\n";
		echo "<div class='summarycolumn'>\n";
		echo "<p align='center' >Summary: <br /><br />$summary</p><br /><br />\n";
		echo "</div>";
		echo "<input type='hidden' name='summary' value='$summary'>\n";
		
		echo "</table>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		
	
	
	 
if(isset($Book))
	try 
		{
			require('../Databases/connection.php');
			$sql= "select * from showtime where MID= ?";
			$statement=$db->prepare($sql);
			//$db=null;
			//$db->beginTransaction();
			$statement->execute(array($movieId));
			$check= $statement->rowCount();
			// if($check<=0)
				// header('location:Login.php?error=4');
			//echo "<table> <br />";
			
			
			
			while($row= $statement->fetch(PDO::FETCH_OBJ))
				{
					
					
					echo "<form method='POST' action ='reserveSeats.php'> \n";
					//echo "<div class='fullcolumn'>";
					echo "\t<div class='row'>\n";
					echo "<div class='leftcolumn'>\n";
					echo "<div class='card'>\n";
					echo "<table>\n";
					
					echo "<tr>\n";
					echo "<th>Cinema <br />Branch</th>\n";
					echo "<th>Cinema <br />Hall</th>\n";
					echo "<th>Starting <br />Time</th>\n";
					echo "<th>Finishing <br />Time</th>\n";
					//echo "<th>Available Seats</th>\n"; consider later.
					echo "<th></th>\n";
					echo "<input type='hidden' name='cinemaBranch' value='$row->branch'>\n";
					echo "<input type='hidden' name='cinemaHall' value='$row->hallID'>\n";
					echo "</tr>\n";
				
				
					echo "<tr>\n";
					echo "<td align='center'>$row->branch</td>\n";
					echo "<td align='center'>$row->hallID</td>\n";
					echo "<td id='starting$numOfHalls' align='center'>$row->startTime</td>\n";
					echo "<td id='ending$numOfHalls' align='center'>$row->endTime</td>\n";
					echo "<input type='hidden' name='showID' value='$row->showID'>\n";
					
					$_SESSION['showid']= $row->showID;
					echo "<td><input align='center' class='cardbutton' type='submit' name='reserve' value='Reserve Seats'><br />\n</td>\n";
					echo "</tr>\n";
					
					echo "<input type='hidden' name='coverpic' value='$coverpic'>\n";
					//echo "<input type='hidden' name='trailer' value='$Trailer'>\n";
					echo "<input type='hidden' name='summary' value='$summary'>\n";
					
					echo "</table>";
					echo "</form>";
					//echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					$numOfHalls++;
					
				}
				//echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			
		}
		catch (PDOException $excp)
		{
			echo("<br /> ".$excp->getMessage()." <br />");
		}
		?>

<?php
	
		echo "<script>correctTime($numOfHalls);</script>";

require("Copyrights.php");
require("Footer.php");
?>