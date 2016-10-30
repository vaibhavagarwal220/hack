<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
if(isset($_POST['nf'])&&isset($_POST['nf']))
{
$firstname=mysql_real_escape_string(htmlentities($_POST['nf']));
$lastname=mysql_real_escape_string(htmlentities($_POST['nl']));
$username=mysql_real_escape_string(htmlentities($_POST['unm']));
$update=mysql_query("UPDATE user_in SET fname='$firstname',srname='$lastname',username='$username' WHERE id=".getfield('id').";");
if($update==true) echo "New details are saved";
else echo "There was an error";
}
	?>
