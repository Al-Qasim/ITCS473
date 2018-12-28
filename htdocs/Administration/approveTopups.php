<?php
require("Header.php");
require("Navbar.php");?>
<script> document.getElementById('topuptab').className='active';
		 document.getElementById('tabname').innerHTML="Topup Approval";</script><?php
$user=array("");
function getUsers()
{
	try
	{
		global $user;
		require("../Databases/connection.php");
		$sql= "select * from cuser";
		$statementU=$db->prepare($sql);
		$statementU->execute();
		$check= $statementU->rowCount();
		if($check<=0)
		{
			while($row= $statementU->fetch(PDO::FETCH_OBJ))
			{
				$user=$row->UID ."#". $row->cusername;
			}
		}
	}
	catch(PDOException $e)
	{
		echo($e->getMessage());
	}
}		 
function getTopRequests()
{
	global $user;
	$actualuser= $user[0];
	try
	{
		
		require("../Databases/connection.php");
		$sql= "select * from toprequests where request_status= ? ORDER BY request_id DESC";
		$statement=$db->prepare($sql);
		$statement->execute(array("Pending"));
		$check= $statement->rowCount();
		if($check<=0)
		{
			echo "<div class='fullcolumn'>\n";
			echo "<div class='card'>\n";
			echo "<p style='color: tomato;' align='center'>There aren't any requests at the moment.</p>\n";
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
			echo "<tr scope='tbs row'><th colspan='2'> Topup Amount</th></tr> \n";
			while($row = $statement->fetch(PDO::FETCH_OBJ))
			{
				echo "<tr>\n";
				echo "<th></th>\n"; 
				echo "<th colspan='2'> Posted Date/Time: ". $row->request_time ."</th>\n</tr>\n";
				echo "<tr>\n";
				echo "<td align='center' >";
				echo "$actualuser\n";
				echo ("</td>\n");
				echo "\n<td>";
				echo ($row->topAmount);
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

getTopRequests();

require("Copyrights.php");
require("Footer.php");
?>