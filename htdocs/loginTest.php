<?php
if(isset($_SESSION['activeUser']))
{
	$currentUser=explode('#', $_SESSION['activeUser']);
	if($currentUser[1]=="admin")
	{
		$currentPage(basename(__FILE__, '.php'));
		
	}
}
	
?>