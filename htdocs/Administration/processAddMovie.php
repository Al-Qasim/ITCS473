<?php
session_start();
extract($_POST);
if(isset($_SESSION['movieDetails']))
{
	extract($_SESSION);
	
	try 
		{
			require('../Databases/connection.php');
			$sql= "insert into movie values (null,?,?,?,?,?)";
			$statement=$db->prepare($sql);
			$details=explode("#",$_SESSION['movieDetails']);
			$statement->execute(array($details[0],$details[1],$details[2],$details[3],$details[4]));
			// $check= $statement->rowCount();
			// if($check<=0)
				// header('location:Profile.php?error=4');
			// else
				header('location:Showing.php');
		}
		catch(PDOException $e)
		{
			echo ($e->getMessage());
		}
}
else
	echo "Session is not there";
?>