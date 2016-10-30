

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$myid=getfield('id');
$time=time()+3.5*60*60;

if(isset($_GET['q']))
  {$qcode=$_GET['q'];
  $flag="and 1";}
else
  header('Location:practice.php');
if(isset($_GET['id'])){
  $user=$_GET['id'];
  $flag="and user_id=".$user;
   

}
  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Practice Arena</title>


  <style type="text/css">
  .nt{margin-top:40px;}
  a{color:green;}
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

$query2="SELECT username from user_in where id=".$myid;
      $result2=mysql_query($query2);
      $uname=mysql_result($result2,0,'username');

$query="SELECT id,qid,user_id,result from submissions where qid='".$qcode."' ".$flag;

$result=mysql_query($query);

$num=mysql_num_rows($result);
if($result&&$num) 
	{
    if($flag=="and 1") echo "<h3>All submissions for ".$qcode." </h3>";
    else if($myid!=$user) 
      {
        $query3="SELECT username from user_in where id=".$user;
      $result3=mysql_query($query3);
      $numr=mysql_num_rows($result3);
      if($numr==0) header("Location:practice.php");
      $uname=@mysql_result($result3,0,'username');

        echo "<h3><a href=userprof.php?q=".$uname.">".$uname."</a>'s submissions for <a href=problem.php?q=".$qcode.">".$qcode."</a> </h3>";
        
      }
    else echo "<h3>My submissions for ".$qcode." </h3>";

		echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
			  <thead>
    			<tr>
              <th class=\"mdl-data-table__cell--non-numeric\">ID</th>
      				<th class=\"mdl-data-table__cell--non-numeric\">Code</th>
              <th class=\"mdl-data-table__cell--non-numeric\">Result</th>
              <th class=\"mdl-data-table__cell--non-numeric\">Username</th>
      			</tr>
  			  </thead>
  			  <tbody>";
          if($num==0) echo "<tr><td></td><td>No submissions</td><td></td><td></td></tr>";
		for($i=0;$i<$num;$i++)
		{	$quid=mysql_result($result,$i,'id');
      $qid=mysql_result($result,$i,'qid');
      $res=mysql_result($result,$i,'result');
      $uid=mysql_result($result,$i,'user_id');
      

			echo "<tr>";
			echo "<td class=\"mdl-data-table__cell--non-numeric\">".$quid."</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"showcode.php?q=".$quid."\">".$qid."</a></td>";
      if ($res=="AC") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>done</i></td>";
      else if ($res=="WA") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>highlight_off</i></td>";
      else if ($res=="RE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>error_outline</i></td>";
      else if ($res=="TLE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>alarm</i></td>";
      else if ($res=="CE") echo "<td class=\"mdl-data-table__cell--non-numeric\"><i class=material-icons>warning</i></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\"><a href=\"userprof.php?q=".$uname."\">".$uname."</a></td>";      
      echo "</tr>";
		}
	echo "</tbody>
		</table>";
	}
  else echo "<h1>No submissions</h1>";
?>
  
<div>
</body>
 </html>
