<?php
	session_start();
	extract($_POST);
	
	if (!isset($_POST['g-recaptcha-response'])) 
		header('location:Signup.php?error=5');
	else if (isset($_POST['g-recaptcha-response']))
	{
		$captcha = $_POST['g-recaptcha-response'];
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcFgXkUAAAAAPFOmTwTiqvZqoUs5pR_7IiihMY7&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$status=json_decode($response);
	if ($status->success == false) {
		header('location:Signup.php?error=6');
	}
	// else{
	if(!isset($reg))
		header('location:Signup.php?error=1');
	else if(trim($fname)=="" ||trim($lname)=="" ||trim($tele)=="" ||trim($uname)=="" ||trim($email)=="" ||trim($pword)=="" ||trim($cpword)=="" ||trim($dob)=="")
		header('location:Signup.php?error=2');
	else if(md5($pword)!=md5($cpword))
		header('location:Signup.php?error=3');
	else if(!isset($accept))
		header('location:Signup.php?error=4');
	try 
	{
		require(__DIR__ .'../Databases/connection.php');
		$sql= "insert into cuser values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?)";		//MariaDB expects default date format as YYYY-MM-DD. date('Y-m-d')
		$db->beginTransaction();
		$prepared= $db->prepare($sql);
		$prepared->execute(array($fname, $lname, $uname, md5($pword), $email, $tele, $dob, "normal","default.png"));
		$qstat=$prepared->rowCount();
		if($qstat>0)
		{
			echo "<br /> $qstat rows were affected.";
			$_SESSION['activeUser']="$uname";
			header('location:Home.php');
		}
		else
			echo "<br /> no rows were affected. <br /> ERROR!<br />";
		$db->commit();
	}
	catch (PDOException $excp)
	{
		die("<br /> ".$excp->getMessage()." <br />");
	}
	// }
	}
?>