<?php
session_start();
extract($_POST);
if(isset($_SESSION['activeUser']))
{
	
	try 
		{
			require('../Databases/connection.php');
			$sql= "update cuser set pic=? where UID= ?";
			$statement=$db->prepare($sql);
			$sessionUser= explode("#", $_SESSION['activeUser']);
			$id=$sessionUser[2];
			if($choosePic=="Default")
				$newpic= "default.png"; 
			else if($choosePic=="Male")
			   $newpic= "male.png";
			else if($choosePic=="Female")
			   $newpic= "female.png";
			else if($choosePic=="Popcorn")
				$newpic= "popcorn.png";
			$statement->execute(array($newpic, $id));
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