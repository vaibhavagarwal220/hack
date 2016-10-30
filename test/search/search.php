<?php
require 'connect.inc.php'; 
if(isset($_POST['sterm'])){
	$sterm=mysql_real_escape_string(htmlentities($_POST['sterm']));
	if(!empty($sterm))
	{
	$query=mysql_query("SELECT * FROM user_in where (username LIKE '%$sterm%')||(fname LIKE '%$sterm%')||(srname LIKE '%$sterm%')||(concat(concat(fname,' '),srname) LIKE '%$sterm%')");
	$rows=mysql_num_rows($query);
	$suffix=($rows!=1)?'s':'';
	echo "<br><i>Your search for <b>$sterm</b> returned $rows result$suffix</i><br>";
	for($i=0;$i<$rows;$i++){
	$fname=mysql_result($query,$i,'fname');
	$srname=mysql_result($query,$i,'srname');
	$username=mysql_result($query,$i,'username');

	echo "<br><strong>$fname $srname</strong> <br> <i>$username</i><br>";
	}		
	}
}
?>