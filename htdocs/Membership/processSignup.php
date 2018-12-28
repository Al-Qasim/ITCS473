<?php
	session_start();
	extract($_POST);
	
	
	if(!isset($reg))
		header('location:Signup.php?error=1');
	else if(trim($fname)=="" ||trim($lname)=="" ||trim($tele)=="" ||trim($uname)=="" ||trim($email)=="" ||trim($pword)=="" ||trim($pword)=="" ||trim($dob)=="")
		header('location:Signup.php?error=2');
	else if(md5($pword)!=md5($cpword))
		header('location:Signup.php?error=3');
	else if(!isset($accept))
		header('location:Signup.php?error=4');
	try 
	{
		require('connection.php');
		$sql= "insert into cuser values (null, \"$fname\", \"$lname\", \"$uname\", \"".md5($pword)."\" , \"$email\", \"$tele\"
	, \"".date('Y-m-d H:i:s')."\", \"$message\", \"$guestType\" )";//problem with qoutation marks for expected string format types.
		
		$qstat= $db->exec($sql);
		if($qstat>0)
		{
			echo "<br /> $qstat rows were affected.";
			$_SESSION['activeUser']="$uname";
			header('location:Home.php');
		}
		else
			echo "<br /> no rows were affected. <br /> ERROR!<br />";
	}
	catch (PDOException $excp)
	{
		echo("<br /> ".$excp->getMessage()." <br />");
	}

?>