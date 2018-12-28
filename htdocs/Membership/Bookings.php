<?php
require("Header.php");
require("Navbar.php");
extract($_POST);

if(!isset($_SESSION['activeUser']))
	header('location:../Login.php?error=1');
else
{
	try 
		{
		$user=explode("#", $_SESSION['activeUser']);
		require("../Databases/connection.php");
		$sql= "select * from reservation where UID= ? "	;
		$statement= $db->prepare($sql);
		$statement->execute(array($user[2]));
		$check= $statement->rowCount();
		$sql= "select * from reservation where UID= ? group by SID";
		while($row = $statement->fetch(PDO::FETCH_OBJ))
		{
			$userSeat[]=$row->SEAT;
		}
		$statement= $db->prepare($sql);
		$statement->execute(array($user[2]));
		//$check= $statement->rowCount();
		if($check<=0)
		{
			echo "<div class='fullcolumn'>\n";
			echo "<div class='card'>\n";
			echo "<p style='color: tomato;' align='center'>You have not booked anything yet.</p>\n";
			echo "</div>\n";
			echo "</div>\n";
			
		}
		else
		{
			echo "<div class='fullcolumn'>";
			echo "<div class='card'>";
			echo "<div class='tbs container'>\n";
			echo "<table class='tbs table table-responsive table-striped tr' border=1 align='center' width='300'> \n";
			echo "<tr scope='tbs row'><th colspan='5'> Bookings</th><th></th></tr> \n";
			//$check=$statement->rowCount();
			while($row = $statement->fetch(PDO::FETCH_OBJ))
			{
				echo "<tr>\n";
				echo "<th>Reservation ID</th>\n"; 
				echo "<th># of Seats</th>\n"; 
				echo "<th>Seats</th>\n"; 
				echo "<th colspan='2'> Purchase Date: </th>\n";
				// echo "<th></th>\n"; 
				echo "<th>Payment Status</th>\n"; 
				echo "</tr>\n";
				echo "<tr>\n";
				echo "<td>\n";
				echo "$row->RID \n";
				echo "</td>\n";
				echo "<td>\n";
				echo "$check \n";
				echo "</td>\n";
				echo "<td align='center' >";
				foreach($userSeat as $useat)
				{
				echo "$useat,";
				}
				echo "<br /> \n";
				echo "<td colspan='2'>$row->Day</td>\n"; 
				echo ("<td>\n");
				echo ($row->Payment);
				echo "</td>\n</tr> \n";
			}
			echo "</table> \n";
			echo "</form> \n";
			echo "</div> \n";
			echo "</div> \n";
			}
		}
					
		// while($row= $statement->fetch(PDO::FETCH_OBJ)){
		
		// }

		catch (PDOException $excp)
		{echo("<br /> ".$excp->getMessage()." <br />");}
}

	
require("Copyrights.php");
require("Footer.php");		


?>