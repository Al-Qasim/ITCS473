<?php
echo "<div class='topnavmember'> \n";
echo "<a id='hometab' class='' href='Home.php'>Home</a> \n";
echo "<a id='showingtab' class='' href='Showing.php'>Showing Now</a> \n";
echo "<a id='reviewtab' class='' href='Reviews.php'>Reviews</a> \n";
echo "<a id='bookingstab' class='' href='Bookings.php'>Bookings</a> \n";
echo "<a id='abouttab' class='' href='About.php'>About Site</a> \n";
echo "<a id='profiletab' class='' href='Profile.php' style='float:right'>Profile</a> \n";
echo "<a id='logouttab' class='logout' href='Logout.php' style='float:right'>Log Out</a> \n";
echo "</div> \n";
require("checkSession.php");
?>