<?php
extract($_GET);
if(!isset($uname))
	die('set username first'); 
else
{
	try
	{
		require('connection.php');
		
		$sql="SELECT * from cuser where cusername= ?";
		
		$statement = $db->prepare($sql);
		$statement->execute(array($uname));

	$db =NULL;
	}
	catch(PDOException $ex) 
	{
		echo "Connection Error occured!";
		die ($ex->getMessage());
	}

    //get the type parameter from URL
    while($row = $statement -> fetch(PDO::FETCH_OBJ))
        {

          $path=$r[1]; 
           echo
               "<table>
                <tr>
                <td>
                <img src='$path' style='width:300px; height:400px;' />
                </td>
                <td>  $r[0] </td>
                </tr>
                </table>";
        }
  
 
}
?>
