<?php
require 'core.inc.php';
require 'connect.inc.php';
setcookie('uid',$us_id,$t-60*60*24*365);
session_destroy();
header('Location:index.php');
$unm=getfield('username');
$query="DELETE FROM `online` WHERE username='$unm'";
$res=mysql_query($query);
?>
