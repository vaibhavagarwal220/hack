<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
$id=getfield('fname');
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
    <title>CodeSpace</title>
  <style type="text/css">
  aside{float:left;position:absolute;left:75%;top:5%;overflow:auto;}
  #contain{width:70%;margin:auto;}
  </style>
</head>
<body>
  
<?php
include 'navbar.php'
 ?>

 <div id="contain">
<h2>Judge Enviroment</h2>
<div class="col-sm-6">
<div class="btn btn-success"><i class=material-icons>done</i> AC (Accepted)</div><br><br>
<div class="btn btn-danger"><i class=material-icons>highlight_off</i> WA (Wrong Answer)</div><br><br>
<div class="btn btn-warning"><i class=material-icons>error_outline</i> RE (Runtime Error)</div><br><br>
<div class="btn btn-info"><i class=material-icons>alarm</i> TLE (Time Limit Exceeded)</div><br><br>
<div class="btn btn-primary"><i class=material-icons>warning</i> CE (Compilation Error)</div><br><br>
      </div>
<aside>
<h4>Recent submissions</h4>
<?php
$query="SELECT id,qid,user_id,result from submissions order by time desc limit 10 ";

$result=mysql_query($query);

$num=mysql_num_rows($result);
if($result&&$num) 
	{
    
    


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

      $query2="SELECT username from user_in where id=".$uid;
      $result2=mysql_query($query2);
      $uname=mysql_result($result2,0,'username');
      

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
</aside>
 </div>



</body>
 </html>
