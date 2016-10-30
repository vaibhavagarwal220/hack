<?php
require 'core.inc.php';
require 'connect.inc.php';

if(isset($_POST['q']))
  $quid=$_POST['q'];

$query="SELECT * from contests where cid='".$quid."'";
$result=mysql_query($query);
$query1="SELECT NOW();";
$result1=mysql_query($query1);
if($result) 
	{
			$sdate=mysql_result($result,0,'sdate');
			$edate=mysql_result($result,0,'edate');
      $stime=mysql_result($result,0,'stime');
      $etime=mysql_result($result,0,'etime');
      $sstamp=$sdate.' '.$stime;
      $estamp=$edate.' '.$etime;
      $nstamp=mysql_result($result1,0);
  //    echo "Start:".$sstamp."<br>";
    //  echo "End:".$estamp."<br>";
      //echo "Now:".$nstamp."<br>";

      $query2="SELECT TIMESTAMPDIFF(MINUTE,'".$nstamp."','".$sstamp."')%60";
      $result2=mysql_query($query2);
      $min=mysql_result($result2,0);

      $query3="SELECT TIMESTAMPDIFF(DAY,'".$nstamp."','".$sstamp."')";
      $result3=mysql_query($query3);
      $day=mysql_result($result3,0);

      $query4="SELECT TIMESTAMPDIFF(HOUR,'".$nstamp."','".$sstamp."')%24";
      $result4=mysql_query($query4);
      $hour=mysql_result($result4,0);

      $query5="SELECT TIMESTAMPDIFF(SECOND,'".$nstamp."','".$sstamp."')%60";
      $result5=mysql_query($query5);
      $sec=mysql_result($result5,0);
      
      //$query6="SELECT TIMESTAMPDIFF(MONTH,'".$nstamp."','".$sstamp."')%12";
      //$result6=mysql_query($query6);
      //$mon=mysql_result($result6,0);
      
      //$query7="SELECT TIMESTAMPDIFF(YEAR,'".$nstamp."','".$sstamp."')";
      //$result7=mysql_query($query7);
      //$years=mysql_result($result7,0);

//      echo "<br>".$years."<br>"."<br>".$mon."<br>"."<br>".$day."<br>"."<br>".$hour."<br>"."<br>".$min."<br>"."<br>".$sec."<br>";

      //if($years>0)
      //echo "<h5>Problems will appear in ".$years." Years ".$mon." Months ".$day." Days ".$hour." Hours ".$min." Minutes ".$sec." Seconds</h5>";
      //else if($mon>0)
      //echo "<h5>Problems will appear in ".$mon." Months ".$day." Days ".$hour." Hours ".$min." Minutes ".$sec." Seconds</h5>";
      //else 
            if($day>0)
      echo "<h5>Problems will appear in ".$day." Days ".$hour." Hours ".$min." Minutes ".$sec." Seconds</h5>";
      else if($hour>0)
      echo "<h5>Problems will appear in ".$hour." Hours ".$min." Minutes ".$sec." Seconds.";
      else if($min>0)
      echo "<h5>Problems will appear in ".$min." Minutes ".$sec." Seconds</h5>";
      else if($sec>0)
      echo "<h5>Problems will appear in ".$sec." Seconds</h5>";
      else  echo "0"; 
      
    	}
?>