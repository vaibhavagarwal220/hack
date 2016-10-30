<?php
require 'connect.inc.php';
require 'core.inc.php';

if(isset($_POST['q']))
  $quid=$_POST['q'];

$query="SELECT qid from keptin where cid='".$quid."'";
$result=mysql_query($query);
$num=mysql_num_rows($result);
if($result&&$num) 
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

      $query3="SELECT qname from questions where qid='".$qid."'";
      $result3=mysql_query($query3);
			$qname=mysql_result($result3,0,'qname');

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
  else {echo "<h1>No problems uploaded Yet</h1>";}

?>