<?php 
require 'connect.inc.php';
if(!empty($_POST['username'])&&isset($_POST['username']))
{
	$usern1=$_POST['username'];
	$query1="SELECT username from user_in where username='$usern1';";/*query to check username already exists*/
    $reslt=mysql_query($query1);/*running the query*/
    if(mysql_num_rows($reslt)==0)/*checking that same username exists*/
        {echo "<strong>username available</strong>";
            }//producing error if same username exists
         
         else echo "<strong>Username already Exists</strong>"; 
}
?>