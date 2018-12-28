<?php
require("Header.php");

require("Navbar.php");
?>
<script> document.getElementById('profiletab').className='active';
		 document.getElementById('tabname').innerHTML="Profile";</script>
<?php
if(isset($_SESSION['activeUser']))
{
	
	try 
		{
			require('../Databases/connection.php');
			$sql= "select * from cuser where UID= ?";
			$statement=$db->prepare($sql);
			$sessionUser= explode("#", $_SESSION['activeUser']);
			$id=$sessionUser[2];
			$statement->execute(array($id));
			$check= $statement->rowCount();
			// if($check<=0)
				// header('location:Login.php?error=4');
			//echo "<table> <br />";
			
			
			echo "<div class='fullcolumn'>\n";
			echo "<div class='row'>\n";
			while($row= $statement->fetch(PDO::FETCH_OBJ))
			{
					
					//print_r($row);
					echo "<form method='POST' action='editProfile.php'> \n";
					echo "<div class='grid-container cardcolumn'>\n";
					echo "<div class='item2 grid-item card2'>\n";
					echo "<table align='center'>\n";
					
					echo"<tr><td><img width='80px' height='80px' src='../$row->pic'/></td></tr>";
					echo "<tr>\n";
					echo "<td align='center'>\n";
					echo "<h3 >User Profile</h3>\n";
					echo "</td>\n";
					
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td>\n";
					echo "<label>First Name:</label>\n";
					echo "<td>\n";
					echo "<label name='firstName'>$row->Fname</label>\n";
					echo "</td>\n";
					echo "</tr>\n";
					
					echo "<tr>\n";
					echo "<td>\n";
					echo "<label>Last Name: </label>\n";
					echo "</td>\n";
					echo "<td>\n";
					echo "<label name='lastName' >$row->Lname</label>\n";
					echo "</td>\n";
					echo "</tr>\n";
					
					echo "<tr>\n";
					echo "<td>\n";
					echo "<label>Email: </label>\n";
					echo "</td>\n";
					echo "<td align ='left'>\n";
					echo "<label name='email' >$row->cemail</label>\n";
					echo "</td>\n";
					echo "</tr>\n";
					
					echo "<tr>\n";
					echo "<td>\n";
					echo "<label>Telephone NO: </label>\n";
					echo "</td>\n";
					echo "<td>\n";
					echo "<label name='tel' >$row->telephone</label>\n";
					echo "</td>\n";
					echo "</tr>\n";
					
					echo "<tr>\n";
					echo "<td colspan='2' align='center'>\n";
					echo "<input align='center' class='cardbutton' type='submit' name='edit' value='Edit Profile'><br />\n";
					
					echo "<td>\n";
					echo "</td>\n";
					echo "</td>\n";
					echo "</tr>\n";
					
					echo "</table>\n";
					echo "</form>\n";
					echo "</div>\n";
					echo "</div>\n";
					
				}
				echo "</div>\n";
				echo "</div>\n";
				
			
				
			
			
			
		}
		catch (PDOException $e)
		{
			echo($e->getMessage());
		}
}
echo "</div>\n";
echo "</div>\n";
echo "</div>\n";
    
require("Copyrights.php");
require("Footer.php");
?>
