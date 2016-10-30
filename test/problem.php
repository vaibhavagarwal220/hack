<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$id=getfield('id');
$time=time()+3.5*60*60;
if(isset($_GET['q']))
  $qcode=$_GET['q'];
else
  header('Location:practice.php');

  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online Judge</title>

  <style type="text/css">
  #ques{width:70%;margin: auto;}
  a{color:green;}
  </style>
</head>
<body>
  
 <?php
include 'navbar.php'
 ?>

<div id="ques">
<?php

if(!empty($qcode)){
$my_file = 'questions/'.$qcode."txt";
$inread = @file($my_file) or die('<h1>No Such Problem</h1>');
echo "<a href=\"submit.php?q=".$qcode."\" class=\"btn btn-default\" target=_blank>Submit</a>";
echo "<a href=\"subm.php?q=".$qcode."\" class=\"btn btn-default\" target=_blank>All Submissions</a>";
echo "<a href=\"subm.php?q=".$qcode."&id=".$id."\" class=\"btn btn-default\" target=_blank>My submissions</a>";
foreach($inread as $line)
  echo $line;
}
?>
</div>
  </body>
 </html>
