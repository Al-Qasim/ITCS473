<?php
	require("checkSession.php");
	unset($_SESSION['activeUser']);
    if(isset($_COOKIE['activeUser']))
        setcookie("activeUser", "", time()-1000*24*60*60);
	header('location:../Login.php');
	
	
?>
