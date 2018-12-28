<?php
require("Header.php");
require("Navbar.php");
extract($_POST);
if(isset($purchase))
{
	try 
		{
			$user=explode("#", $_SESSION['activeUser']);
			$seats=$_SESSION['seats'];
			$bal=$_SESSION['bal'];
			$numofseats=count($seats);
			$tot=$_SESSION['tot'];
			//$showiD=$_SESSION['showid'];
			echo("value: ". $showiD);
			require("../Databases/connection.php");
			//reserve seats.
			$sqlinsert= "insert into reservation values (null, ?, ?, ?, ?, ?)";
			$statementinsert= $db->prepare($sqlinsert);
			foreach($seats as $seat)
				$statementinsert->execute(array($showiD, $user[2], $seat, "YES", Date('Y-m-d')));
			
			//update balance.
			$sqlupdate= "update balance set current_balance= ? where UID=?";
			$statementupdate= $db->prepare($sqlupdate);
			$newBalance= $bal-$tot;
			$statementupdate->execute(array($newBalance, $user[2]));
			header("location:Bookings.php");
			
			
		}
		catch(PDOException $e)
		{
			echo($e->getMessage());
		}
}
else
	echo "not set button";



require("Copyrights.php");
require("Footer.php");	
?>