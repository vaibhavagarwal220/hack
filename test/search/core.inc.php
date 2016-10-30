<?php
ob_start();
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
function onln($iuser)
{
  if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
   { if ($iuser==$_SESSION['user_id']) return true;
      else return false;
    }
  else
    return false;
}
function getfield($field)
{
  $query="SELECT $field from user_in where id='".$_SESSION['user_id']."';";
if($query_res=mysql_query($query))
  {if($fieldres=mysql_result($query_res,0,$field));
    {
    return $fieldres;
    }
  }
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

 ?>
