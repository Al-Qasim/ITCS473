<?php
extract($_GET);
if(!isset($choosePic))
	die('select a pic first'); 
if($choosePic=="Default")
           echo "../default.png"; 
else if($choosePic=="Male")
           echo "../male.png";
else if($choosePic=="Female")
           echo "../female.png";
else if($choosePic=="Popcorn")
           echo "../popcorn.png";
  
 

?>
