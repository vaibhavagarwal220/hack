

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
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
  <title><?php echo $qcode; ?>'s Profile</title>
    

  <style type="text/css">
 
  a.sub{color:blue;}
  table a{color:blue;}
  .page{width:70%;margin-left:2.5%;}
img.pport{display:inline;}
h2.name,h5{display:inline;}
.demo-card-square.mdl-card {
  width: 100%;
  height: 100%;

  }
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:
    url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;

}
aside{background-color:#f1f1f1;box-shadow:0px 0px 5px 1px;text-align:center;}

  </style>
</head>
<body>

  
 <?php
include 'navbar.php'
 ?>

<div class=page>
    <?php
require 'connect.inc.php';
$query="SELECT fname,srname,imgln,username,id from user_in where username='".$qcode."'";
$result=@mysql_query($query);
$numu=@mysql_num_rows($result);
if($numu==0) echo "<h1>No such user</h1>";
else
{
if($result) 
  {   
      $id=@mysql_result($result,0,'id');
      $fname=@mysql_result($result,0,'fname');
      $srname=@mysql_result($result,0,'srname');
      $img=@mysql_result($result,0,'imgln');
      
      $query1="SELECT distinct qid from submissions where result='AC' and user_id=".$id;
      $result1=@mysql_query($query1);
      $num=@mysql_num_rows($result1);

      $queryt="SELECT qid from submissions where result='TLE' and user_id=".$id;
      $resultt=@mysql_query($queryt);
      $numt=@mysql_num_rows($resultt);

      $queryc="SELECT qid from submissions where result='CE' and user_id=".$id;
      $resultc=@mysql_query($queryc);
      $numc=@mysql_num_rows($resultc);

      $queryw="SELECT qid from submissions where result='WA' and user_id=".$id;
      $resultw=@mysql_query($queryw);
      $numw=@mysql_num_rows($resultw);

      $queryr="SELECT qid from submissions where result='RE' and user_id=".$id;
      $resultr=@mysql_query($queryr);
      $numr=@mysql_num_rows($resultr);?>

      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Result', 'Submissions'],
          ['AC',     <?php echo $num;?>],
          ['TLE',      <?php echo $numt;?>],
          ['CE',  <?php echo $numc;?>],
          ['WA', <?php echo $numw;?>],
          ['RE',    <?php echo $numr;?>],
          

        ]);

        var options = {
          title: 'All submissions',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

      <?php
      
     echo "<div class=\"demo-card-square mdl-card mdl-shadow--2dp\">
  <div class=\"mdl-card__title mdl-card--expand\">
    <h2 class=\"mdl-card__title-text\"></h2>
    <img src=".$img." class=\"small1 img img-circle\">&nbsp;&nbsp;&nbsp;<h2 class=name>".$fname." ".$srname."</h2>
  </div>
  <div class=\"mdl-card__supporting-text\"><h6>Username</h6><h5> ".$qcode." <h5><br><h6>List of problems successfully solved</h6><h5>";
          for($i=0;$i<$num;$i++)
    { $qid=@mysql_result($result1,$i,'qid');
      if($i==$num-1) echo "<a href=subm.php?q=".$qid."&id=".$id." class=sub>".$qid."</a>";
      else echo "<a href=subm.php?q=".$qid."&id=".$id." class=sub>".$qid."</a>,";
      
    }
    echo "</h5><div id=\"piechart_3d\" style=\"width: 600px; height: 300px;\"></div>";


    echo "</div>";

  echo "<div class=\"mdl-card__actions mdl-card--border\">
    <a class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\">
      View Updates
    </a>
  </div>
</div><br><br><br>";


   
  }
}

?>

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
    { $quid=mysql_result($result,$i,'id');
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
