<?php
require("Header.php");
require("Navbar.php");
extract($_POST);
$num=0;
$level=0;
if(isset($reserve))
{
	try 
		{
				require("../Databases/connection.php");
				$sql= "select * from hall where hallID= ? and branch= ?";
				$statement= $db->prepare($sql);
				$statement->execute(array($cinemaHall, $cinemaBranch));
				$check= $statement->rowCount();
				
								
				while($row= $statement->fetch(PDO::FETCH_OBJ)){
				echo "<div class='fullcolumn'>\n";
				echo "<form method='POST' action='reserveSeats.php'>\n";
				
				echo "<input type='hidden' name='oldStatusCode' value=''/>";
				echo "<input type='hidden' name='newStatusCode' value=''/>";
  
				echo "<table width='100%' border='0' cellpadding='2' cellspacing='3'>\n";
				for($i=0; $i<$row->rows; $i++)
				{
				$level++;
				echo "<tr>\n";
				echo "<div class='largecardcolumn'>\n";
				echo "<td align='center'>";
				echo "<div class='crow'>\n";
				echo "Row ".($row->rows-$i)."";
				echo "</div>\n";
				echo "</td>\n";
				for($j=0; $j< $row->leftRow; $j++)
				{
					
					$stno=$j+1;
					$num++;
					echo "<td align='center'>";
					echo "<div id='SeatDiv".$num."' class='seat'>";
					echo "L$stno<br /><input class='seated' id='Seat".$num."' type='checkbox' name='seats[]' value='L$stno'  onclick='checkSeat(".$num.")'/>";
					//echo "<label for='Seat".$num."'></label>"; //not in use.
					echo "</div>";
					echo "</td>\n";
				}
				//echo "</div>";
				echo "<td align='center' class='step'>___<br/>___</td>\n";
				//echo "<div class='cardcolumn'>\n";
				for($j=0; $j< $row->midRow; $j++)
				{
					$stno=$j+1;
					$num++;
					echo "<td align='center'>";
					echo "<div id='SeatDiv".$num."' class='seat'>";
					echo "M$stno<br /><input id='Seat".$num."' type='checkbox' name='seats[]' value='M$stno' onclick='checkSeat(".$num.")'>";
					echo "</td>";
					echo "</div>\n";
				}
				//echo "</div>";
				echo "<td align='center' class='step'>___<br/>___</td>\n";
				
				//echo "<div class='cardcolumn'>\n";
				for($j=0; $j< $row->rightRow; $j++)
				{
					$stno=$j+1;
					$num++;
					echo "<td align='center'>";
					echo "<div id='SeatDiv".$num."' class='seat'>";
					echo "R$stno<br /><input id='Seat".$num."' type='checkbox' name='seats[]' value='R$stno' onclick='checkSeat(".$num.")'>";
					echo "</td>";
					echo "</div>\n";
				}
				
				echo "<td align='center'>";
				echo "<div class='crow'>\n";
				echo "Row ".($i+1)."";
				echo "</div>\n";
				echo "</td>\n";
				echo "</div>\n";
				echo "</tr>\n";
				if($level>0)
				{
					echo "</tr>\n";
					for($j=0; $j< $row->leftRow; $j++)
					{
						
						echo "<td align='center' class='level'></td>\n";
					}
					echo "<td align='center' class='level'></td>\n";
					for($j=0; $j< $row->midRow; $j++)
					{
						echo "<td align='center' class='level'></td>\n";
					}
					echo "<td align='center' class='level'></td>\n";
					for($j=0; $j< $row->rightRow; $j++)
					{
						echo "<td align='center' class='level'></td>\n";
					}
					echo "<td align='center' class='level'></td>\n";
					echo "</tr>\n";
				}
				
				}
				echo"<table align='center'><tr><td><input type=submit class='cardbutton' value='Continue >>'></td></tr></table>";
				echo "</table></form>\n";
				echo "</div>\n";
		}}catch (PDOException $excp)
{echo("<br /> ".$excp->getMessage()." <br />");}}
		

require("Copyrights.php");
require("Footer.php");		
?>

