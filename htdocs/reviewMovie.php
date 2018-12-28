<?php
	 
require("Header.php");
require("Navbar.php");
extract($_POST);
$user=array("");
function getUsers()
{
	try
	{
		global $user;
		require("Databases/connection.php");
		$sql= "select * from cuser";
		$statement=$db->prepare($sql);
		$statement->execute();
		$check= $statement->rowCount();
		if($check<=0)
		{
			while($row= $statement->fetch(PDO::FETCH_OBJ))
			{
				$user="".$row->cusername;
			}
		}
	}
	catch(PDOException $e)
	{
		echo($e->getMessage());
	}
}
	function getReviews()
{
	global $movieID, $user;
	$actualuser= $user[0];
	try
	{
		
		require("Databases/connection.php");
		$sql= "select * from commentrate where MID= ? ORDER BY RDT DESC";
		$statement=$db->prepare($sql);
		$statement->execute(array($movieID));
		$check= $statement->rowCount();
		if($check<=0)
		{
			echo "<div class='fullcolumn'>\n";
			echo "<div class='card'>\n";
			echo "<p style='color: tomato;' align='center'>This movie has not been rated yet.</p>\n";
			echo "</div>\n";
			echo "</div>\n";
		}
		else
		{
			getUsers();
			echo "<form method='POST' action='Rate.php'>";
			echo "<div class='fullcolumn'>";
			echo "<div class='card'>";
			echo "<div class='tbs container'>\n";
			echo "<table class='tbs table table-responsive table-striped tr' border=1 align='center' width='300'> \n";
			echo "<tr scope='tbs row'><th colspan='2'> Comments</th></tr> \n";
			while($row = $statement->fetch(PDO::FETCH_OBJ))
			{
				echo "<tr>\n";
				echo "<th></th>\n"; 
				echo "<th colspan='2'> Posted Date/Time: ". $row->CDT ."</th>\n</tr>\n";
				echo "<tr>\n";
				echo "<td align='center' >";
				echo "<div class='fakeimg' style='height:50px;'>Image</div> <br /> $actualuser\n";
				echo ("</td>\n");
				echo "\n<td>";
				echo (nl2br($row->comm));
				echo "</td>\n</tr> \n";
			}
			echo "</table> \n";
			echo "</form> \n";
			echo "<div class='fakeimage' ></div>\n";
			}
	}
	catch(PDOException $e)
	{
		echo($e->getMessage());
	}
}

?>

<script> 
document.getElementById('reviewtab').className='active';
		 document.getElementById('tabname').innerHTML="<?php $movieName ?>";</script><?php
if(isset($viewRating)) //put cover in cardcolumn && Summary in another one && trailer in another one.
{
		echo "<div class='fullcolumn'>";
		echo "\t<div class='row'>\n";	
		echo "<div class='leftcolumn'>\n";
		//echo "\t<div class='row'>\n";
		echo "\t<div class='card'>\n";
		echo "<table>";
		echo "<form method='POST' action ='Login.php'> \n";

		//echo "<tr>\n";
		echo "<tr>\n";
		echo "<td>\n";
		echo "<div class='largecardcolumn'>\n";
		echo "\t<h2 align='left' >$movieName</h5>\n";
		echo "\t<input type='hidden' name='movieName' value='$movieName'>\n";
		echo "\t<input type='hidden' name='movieId' value='$movieID'>\n";
		echo "</td>\n";
		echo "</tr>\n";
		
		echo "<tr>\n";
		echo "<td align='center'>\n";
		echo "<img width='240px' height='360px'   align='left' src='$coverpic'>\n";
		echo "<input type='hidden' name='coverpic' value='$coverpic'>\n";
		echo "</div>\n";
		echo "<div class='summarycolumn'>\n";
		echo "<p align='center' >Summary: <br /><br />$summary</p><br /><br />\n";
		echo "<input type='hidden' name='summary' value='$summary'>\n";
		echo "<input align='center' class='cardbutton' type='submit' name='Book' value='You Must Log in to book tickets'><br />\n";
		echo "</div>\n";
		echo "</td></tr>";
		echo "<tr><td>";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</div>\n";
		
		
		echo "</table>";
		echo "</div>";
		
	echo "</div>";
	
	echo "<div class='fullcolumn'>\n";
	echo "<div class='leftcolumn'>\n";
	echo "\t<div class='card'>\n";
	getReviews();
	echo "</div>";
	echo "</div>";
	echo "</div>";
	//echo "</div>";
}
		

require("Copyrights.php");
require("Footer.php");
?>