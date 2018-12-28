<?php
session_start();
extract($_POST);
if(isset($_SESSION['activeUser']))
{
	
	try 
		{
			require('../Databases/connection.php');
			$sql= "update cuser set cemail=? where UID= ?";
			$statement=$db->prepare($sql);
			$sessionUser= explode("#", $_SESSION['activeUser']);
			$id=$sessionUser[2];
			if(!isset($edit))
				header('location:Profile.php?error=1');
			else if(trim($email)=="")
				header('location:Profile.php?error=2');
			$statement->execute(array($email, $id));
			$check= $statement->rowCount();
			if($check<=0)
				header('location:Profile.php?error=4');
			else
				header('location:Profile.php');
		}
		catch(PDOException $e)
		{
			echo ($e->getMessage());
		}
}
else
	echo "Session is not there";
?>