

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$time=time()+3.5*60*60;
  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Practice Arena</title>


  <style type="text/css">
  .nt{margin-top:40px;}
  a{color:white;}
  table a{color:blue;}
  .page{width:70%;margin:auto;}

  </style>
</head>
<body>
  
 <?php
include 'navbar.php'
 ?>

<div class=page>
    <?php
require 'connect.inc.php';
$query="SELECT * 
FROM questions";
$result=mysql_query($query);
$num=mysql_num_rows($result);

$query1="SELECT DISTINCT questions.qid,questions.qname
FROM questions,keptin
WHERE questions.qid != keptin.qid";
$result1=mysql_query($query1);
$num1=mysql_num_rows($result1);
if($num1) {$result=$result1;$num=$num1;}

if($result) 
	{
		echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
			  <thead>
    			<tr>
      				<th class=\"mdl-data-table__cell--non-numeric\">Name</th>
      				<th class=\"mdl-data-table__cell--non-numeric\">Code</th>
      				<th class=\"mdl-data-table__cell--non-numeric\">Successful Submissions</th>
              <th class=\"mdl-data-table__cell--non-numeric\">Accuracy</th>
    				</tr>
  			  </thead>
  			  <tbody>";
		for($i=0;$i<$num;$i++)
		{	$qid=mysql_result($result,$i,'qid');
			$qname=mysql_result($result,$i,'qname');
      $query1="SELECT count(*) from submissions where result='AC' AND qid='".$qid."'";
      $result1=mysql_query($query1);
      $succnum=mysql_result($result1,0,'count(*)');
      $query2="SELECT count(*) from submissions where qid='".$qid."'";
      $result2=mysql_query($query2);
      $totalnum=mysql_result($result2,0,'count(*)');
      if($totalnum==0) $acc=0; 
      else $acc=$succnum*100/$totalnum;
			echo "<tr>";
			echo "<td class=\"mdl-data-table__cell--non-numeric \"><a href=\"problem.php?q=".$qid."\">".$qname."</a></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"submit.php?q=".$qid."\">".$qid."</a></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"submit.php?q=".$qid."\">".$succnum."</a></td>";
			echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"submit.php?q=".$qid."\">".$acc."</a></td>";
      
      echo "</tr>";
		}
	echo "</tbody>
		</table>";
	}
?>
  
<div>
</body>
 </html>
