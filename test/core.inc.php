<?php


session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER']))
{
  $page=$_SERVER['HTTP_REFERER'];
}
function loggedin()
{
  if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
    return true;
  else
    return false;
}
//function onln($uname)
//{
  //$query="SELECT COUNT(*) from online where username='$uname'";
  //$res=mysql_query($query);
  //$rows=mysql_result($res,0,'COUNT(*)');
  //if ($rows==0) return false;
 // else if($rows==1) return true;
//}
function getfield($field)
{
  $query="SELECT $field from user_in where id='".$_SESSION['user_id']."';";
if($query_res=mysql_query($query))
  {if($fieldres=mysql_result($query_res,0,$field))
    {
    return $fieldres;
    }
  }
}

function cexists($cont)
{
  $query="SELECT * from contests where cid='".$cont."';";
$query_res=@mysql_query($query);
  if(mysql_num_rows($query_res))
    {
    return true;
    }
    else 
      return false;
  
}

function retip()
{
  if(@$ipc=$_SERVER['HTTP_CLIENT_IP']||
  @$ipf=$_SERVER['HTTP_X_FORWARDED_FOR']||
  @$ipr=$_SERVER['REMOTE_ADDR']){
if(!empty($ipc)) return $ipc;
else if(!empty($ipf)) return $ipf;
else return $ipr;
}}

function getcontests($queryqw)
{

$resultqw=@mysql_query($queryqw);

$numqw=@mysql_num_rows($resultqw);

if($resultqw&&$numqw) 
  {
    echo "<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
        <thead>
          <tr>
              <th class=\"mdl-data-table__cell--non-numeric\">Contest Name</th>
              
              <th class=\"mdl-data-table__cell--non-numeric\">Start Time</th>
              <th class=\"mdl-data-table__cell--non-numeric\">End Time</th>
            </tr>
          </thead>
          <tbody>";
    
    for($i=0;$i<$numqw;$i++)
    { $nm=@mysql_result($resultqw,$i,'name');
      $cid=@mysql_result($resultqw,$i,'cid');
      $st=@mysql_result($resultqw,$i,'stime');
      $sd=@mysql_result($resultqw,$i,'sdate');
      $et=@mysql_result($resultqw,$i,'etime');
      $ed=@mysql_result($resultqw,$i,'edate');


      echo "<tr>";
      echo "<td class=\"mdl-data-table__cell--non-numeric \"><a href=\"contest.php?q=".$cid."\">".$nm."</a></td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">".$sd."<br>".$st."</td>";
      echo "<td class=\"mdl-data-table__cell--non-numeric\">".$ed."<br>".$et."</td>";      
      echo "</tr>";
    }
  echo "</tbody>
    </table>";
  }
  else {echo "<h1>No problems uploaded Yet</h1>";}



  
 
}


 ?>
