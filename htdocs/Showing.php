<?php
require("Header.php");
require("Navbar.php");?>
<script> document.getElementById('showingtab').className='active';
		 document.getElementById('tabname').innerHTML="Library";
		 
function showPages(id){
	var totalNumberOfPages = 5;
	for(var i=1; i<=totalNumberOfPages; i++){
		if (document.getElementById('page'+i)) {
			document.getElementById('page'+i).style.display='none';
			}
		}
		if (document.getElementById('page'+id)) {
			document.getElementById('page'+id).style.display='block';
				}
};
</script>
<?php
//get genres
try
{
	require('Databases/connection.php');
	$sql= "select MGenre from movie GROUP BY MGenre";
	$statement=$db->prepare($sql);
	$statement->execute();
	while($row= $statement->fetch(PDO::FETCH_OBJ))
	{
		$genre_list[]= $row->MGenre;
	}
}
catch(PDOException $e)
{
	echo($e->getMessage());
}
//get movies
extract($_GET);
try 
	{
		require('Databases/connection.php');
		if(isset($genre))
		{
			$sql= "select * from movie where MGenre= ? ORDER BY MID DESC";
			$statement=$db->prepare($sql);
			$statement->execute(array($category));
		}
		else
		{
			$sql= "select * from movie ORDER BY MID DESC";
			$statement=$db->prepare($sql);
			$statement->execute();
		}
		
		echo "<form method='GET' action ='Showing.php'> \n";
		echo "<div class='stickycard'>";
		echo "\t<div class='row'>\n";
		echo "\t<table align='center'>\n";
		echo "\t<tr>\n";
		echo "\t<td>\n";
		echo "\t<select name='category' class='styled-select blue semi-square'>\n";
		//$rowcount=0;
		foreach($genre_list as $key)
		{
			echo "<option value='$key' ";
			if(isset($category))
				if($key==$category)
					echo "selected";
			echo ">";
			echo "$key";
			echo "</option>";
		}
		echo "</select";
		echo "</td>";
		echo "<td>";
		echo "<input class='cardbutton' type='submit' name='genre' value='Filter'>";
		echo "</td>";
		echo "<td>";
		echo "<a href='Showing.php'>Clear Filter</a>";
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
		echo "</div>";
		echo "</form>";

		echo "<div class='fullcolumn'>";
		echo "\t<div class='row'>\n";
		$rowcount=0;
		$no=0;
		while($row= $statement->fetch(PDO::FETCH_OBJ))
			{
				
				echo "<form method='POST' action ='displayMovie.php'> \n";
				echo "<div class='grid-container cardcolumn'>\n";
				echo "<div class='item$no grid-item restrictedcard2'>\n";
				echo "<table>\n";
				
				echo "<tr>\n";
				echo "<td>\n";
				echo "<h5 align='center' >$row->MName</h5>\n";
				echo "<input type='hidden' name='movieID' value='$row->MID'>\n";
				echo "<input type='hidden' name='movieName' value='$row->MName'>\n";
				
				echo "</td>\n";
				echo "</tr>\n";
				
				echo "<tr>\n";
				echo "<td align='center'>\n";
				echo "<img width='182px' height='286px' class='tbs img' align='center' src='$row->MCover'><br />\n";
				echo "<input type='hidden' name='coverpic' value='$row->MCover'>\n";
				echo "<input type='hidden' name='trailer' value='$row->Trailer'>\n";
				echo "<input type='hidden' name='summary' value='$row->Summary'>\n";
				
				echo "</td>\n";
				echo "</tr>\n";
				
				echo "<tr>\n";
				echo "<td align='center'>\n";
				echo "<input align='center' class='cardbutton' type='submit' name='viewDetails' value='View details'><br />\n";
				
				echo "</td>\n";
				echo "</tr>\n";
				
				echo "</table>";
				echo "</form>";
				//echo "</div>";
				//echo "</div>";
				echo "</div>";
				echo "</div>";
				$rowcount++;
				if($rowcount%3==0)
				{
					
					$no=0;
					echo "</div>";
					echo "\t<div class='row'>\n";
				}
					
				
			}
			echo "</div>";
			echo "</div>";
			
		
			
		
		
		
	}
	catch (PDOException $excp)
	{
		echo("<br /> ".$excp->getMessage()." <br />");
	}


require("Copyrights.php");
require("Footer.php");
?>
