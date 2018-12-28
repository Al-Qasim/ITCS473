<?php
	session_start();
	extract($_POST);
	if (!isset($_POST['g-recaptcha-response'])) 
		header('location:Login.php?error=5');
	else if (isset($_POST['g-recaptcha-response']))
	{
		$captcha = $_POST['g-recaptcha-response'];
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcFgXkUAAAAAPFOmTwTiqvZqoUs5pR_7IiihMY7&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$status=json_decode($response);
	if ($status->success == false) {
		header('location:Login.php?error=6');
	}
	else{

	
	if(!isset($uname) || !isset($pword))
		header('location:Login.php?error=1');
	if(trim($uname)=="" ||trim($pword)=="")
		header('location:Login.php?error=2');
	else{
	try 
	{
		require(__DIR__ .'../Databases/connection.php');
		$sql= "select * from cuser where cusername= ?";
		$rs=$db->prepare($sql);
		$rs->execute(array($uname));
		//$db=null;
		$check= $rs->rowCount();
		if($check==0)
			header("location:Login.php?error=4");
		else
			while($r= $rs->fetch(PDO::FETCH_OBJ))
			{
				if(md5($pword)==$r->cpassword){
                    $_SESSION['activeUser']=$uname."#".$r->userType ."#".$r->UID;
                    if(isset($keep))
                        setcookie("activeUser", $uname."#".$r->userType, time()+2*24*60*60);
                    if($r->userType=="admin")
					   header('location:../Project/Administration/Home.php');
                    else if($r->userType=="normal")
					   header('location:../Project/Membership/Home.php');
                }
				else
					header('location:Login.php?error=3');
			
			}

		
			
		
		
		
	}
	catch (PDOException $excp)
	{
		echo("<br /> ".$excp->getMessage()." <br />");
	}}}} 

?>