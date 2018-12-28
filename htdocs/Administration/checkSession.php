<?php
if(!isset($_SESSION['activeUser']))
	header('location:../Login.php?error=1');
else if(!isset($_COOKIE['activeUser']) && !isset($_SESSION['activeUser']))
	header('location:../Login.php?error=1');
else if(!isset($_SERVER['HTTP_REFERER']))
{
	
	//$currentPage=explode("/", $_SERVER['HTTP_REFERER']);
	//$page=$currentPage[count($currentPage)-1];
	//if($page != "Login.php")
	//{
		$currentPage=explode("/", $_SERVER['REQUEST_URI']);
		$user=explode("#", $_SESSION['activeUser']);
		setcookie( "problem", $currentPage[count($currentPage)-2], time()+24*60*60);
		if($user[1]=="admin" && $currentPage[count($currentPage)-2]=="Membership")
		{
			//$currentPage=explode("/", $_SERVER['HTTP_REFERER']);
			//setcookie( "referer", $currentPage[count($currentPage)-1], time()+24*60*60); for testing.
			setcookie( "problem", $currentPage[count($currentPage)-2], time()+24*60*60);
			header("location:../Administration/Home.php?error=404");
		}
		if($user[1]=="normal" && $currentPage[count($currentPage)-2]=="Administration")
		{
			//$currentPage=explode("/", $_SERVER['HTTP_REFERER']);
			//setcookie( "referer", $page, time()+24*60*60);
			setcookie( "problem", $currentPage[count($currentPage)-2], time()+24*60*60);
			header("location:../Membership/Home.php?error=404");
		}
	//}
}
?>