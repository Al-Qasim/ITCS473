<?php
require("Header.php");

require("Navbar.php");
?>
<script> document.getElementById('profiletab').className='active';
		 document.getElementById('tabname').innerHTML="Profile";
		 
		 
//-----------------------------------------------Ajax------------------------------------------


function GetXmlHttpObject()
{ 
    var xmlHttp=null; 
    try 
        { 
        // Firefox, Opera 8.0+, Safari 
        xmlHttp=new XMLHttpRequest(); 
        }
    catch (e) 
        { 
        // Internet Explorer 
        try 
            { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); } 
        catch (e) 
            { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
        } 
    return xmlHttp; 
} 


function showPic(str)
{
    
    if (str.length==0)
    {   
        document.getElementById("pic").src="";   
        return;
    }

    xmlHttp = GetXmlHttpObject();

    if (xmlHttp==null)
    {   
        alert ("Your browser does not support AJAX!");   
        return;
    } 

    var url="getpics.php";
    url = url + "?choosePic=" + str;
    url = url + "&sid=" + Math.random(); //another way to prevent caching

    xmlHttp.onreadystatechange = stateChanged; //Not a function call
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
    
} 
function stateChanged()
{ 
    if (xmlHttp.readyState==4)
    { 
	   document.getElementById("pic").src=xmlHttp.responseText;
	   // the old way: list.innerHTML=xmlHttp.responseText;
    }
    
}

//----------------------------------------------------------------------------------------
		 </script>
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
					echo "<form method='POST' action='updatePic.php'> \n";
					echo "<div class='grid-container cardcolumn'>\n";
					echo "<div class='item2 grid-item card2'>\n";
					echo "<table align='center'>\n";
					
					echo"<tr><td>";
					echo "<h3 >User Profile</h3>\n";
					echo "</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td align='center'>\n";
					echo "<span id='picspan'><img id='pic' width='80px' height='80px' src='../$row->pic'/></span></td>";
					echo "<td>\n";
					echo "<input name='uname' type='hidden' value='$sessionUser[0]'>\n";
					echo "<select name='choosePic' onchange='showPic(this.value)'>\n";
					echo "<option ";
					// if($row->pic=="default.png")
						echo "selected>";
					// else
						// echo ">";
					echo "Default</option>\n";
					
					echo "<option ";
					// if($row->pic=="male.png")
						// echo "selected>";
					// else
						echo ">";
					echo "Male</option>\n";
					
					echo "<option ";
					// if($row->pic=="male.png")
						// echo "selected>";
					// else
						echo ">";
					echo "Female</option>\n";
					echo "<option ";
					// if($row->pic=="male.png")
						// echo "selected>";
					// else
						echo ">";
					echo "Popcorn</option>\n";
					echo "</select>\n";
					echo "</td>\n";
					echo "<td>\n";
					echo "<input type='submit' class='cardbutton' name='edit' value='Change Pic'><br />\n";
					echo "</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "</form>\n";
					echo "<form method='POST' action='updatePassword.php'>\n";
					
					echo "<td>\n";
					echo "<label>Password:</label>\n";
					echo "</td>\n";
					echo "<td>\n";
					echo "<input type='password' name='pass' >\n";
					echo "</td>\n";
					echo "<td rowspan='2'>\n";
					echo "<input  align='center' class='cardbutton' type='submit' name='editpass' value='Change Password'><br />\n";
					echo "</td>\n";
					echo "</tr>\n";
					
					echo "<tr>\n";
					echo "<td>\n";
					echo "<label>Confirm Password: </label>\n";
					echo "</td>\n";
					echo "<td>\n";
					echo "<input type='password' name='cpass' />\n";
					echo "</td>\n";
					echo "</tr>\n";
					
					echo "</form>\n";
					echo "<tr>\n";
					echo "<td>\n";
					echo "<form method='POST' action='updateEmail.php'>\n";
					echo "<label>Email: </label>\n";
					echo "</td>\n";
					echo "<td>\n";
					echo "<input type='email' name='email' />\n";
					echo "</td>\n";
					echo "<td>\n";
					echo "<input align='center' class='cardbutton' type='submit' name='edit' value='Change Email'><br />\n";
					echo "</td>\n";
					echo "</tr>\n";
					
					echo "<tr>\n";
					echo "<td>\n";
					echo "<label>Telephone NO: </label>\n";
					echo "</td>\n";
					echo "<td>\n";
					echo "</form>\n";
					echo "<form method='POST' action='updateTel.php'>\n";
					echo "<input type='tel' name='tele' />\n";
					echo "<td>\n";
					echo "<input align='center' class='cardbutton' type='submit' name='edit' value='Change Telephone'><br />\n";
					echo "</td>\n";
					echo "</form>\n";
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
