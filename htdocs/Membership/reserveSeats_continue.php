<?php
require("Header.php");
require("Navbar.php");
extract($_POST);

if(isset($continueReserve))
{
	try 
		{
			//print_r($show);
			$user=explode("#", $_SESSION['activeUser']);
			$numofseats=count($seats);
			$tot=$numofseats*3;
			require("../Databases/connection.php");
			$sql= "select * from balance where UID= ? ";
			$statement= $db->prepare($sql);
			$statement->execute(array($user[2]));
			$check= $statement->rowCount();
			// echo "<div class='fullcolumn'>\n";
			echo "<div class='card'>\n";
			echo "<form method='POST' action='purchaseSeats.php'>\n";
			echo "<table class='tbs table table-responsive table-striped tr'>\n";
			echo "<tr>\n";
			echo "<td>\n";
			echo "You selected $numofseats seat(s), each @ 3.00 BHD\n";			
			echo "</td>\n";
			echo "<td>\n";
			echo "Total cost is $tot BHD\n";
			if($row= $statement->fetch(PDO::FETCH_OBJ)){
			echo "</td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
			echo "<td>\n";
			echo "Your balance is: $row->current_balance BHD\n";
			echo "<input type='hidden' name='showiD' value='$show' />\n";
			$_SESSION['tot']=$tot;
			$_SESSION['seats']=$seats;
			$_SESSION['bal']=$row->current_balance;
			echo "</td>\n";
			echo "<td>\n";
			echo "</tr>\n";
			echo "<tr>\n";
			$flag=false;
			if($row->current_balance < $tot)
				echo "<p class='errormsg'>Your balance is: $row->current_balance not enough :(</p>\n";
			else{
				echo "<td>\nYou can purchase the selected seats.</td>";
				echo "<td>Your balance after the purchase will be: ".($row->current_balance-$tot) ."</td>\n";
			$flag=true;
			}
			echo "</tr>\n";
			echo "<tr>\n";
			if(!$flag)
				echo "<td>\n<a href='#'>Request Topup.</a></td>\n";
			else{
				echo "<td>\n<input type='submit' name='purchase' class='cardbutton' value='Continue to Purchase'></td>\n";
			}
			echo "</tr>\n";
			
			echo "</table>\n";
			echo "</div>\n";
			// echo "</div>\n";
		}}
		catch(PDOException $e)
		{
			echo($e->getMessage());
		}
}



require("Copyrights.php");
require("Footer.php");	
?>