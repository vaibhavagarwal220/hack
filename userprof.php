

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');

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
  <title>DataBucks</title>
    

  <style type="text/css">
 
  a.sub{color:blue;}
  table a{color:blue;}
  .page{width:70%;margin:auto;}
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
/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

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
      ?>


      <?php
      
     echo "<div class=\"demo-card-square mdl-card mdl-shadow--2dp\">
  <div class=\"mdl-card__title mdl-card--expand\">
    <h2 class=\"mdl-card__title-text\"></h2>
    <h2 class=name>".$fname." ".$srname."</h2>
  </div>
  <div class=\"mdl-card__supporting-text\"><h6>Username</h6><h5> ".$qcode." <h5><br><h6>Points Earned</h6><h5> 100 <h5><br><h6>Data Used</h6><h5> 200 MB <h5><br><h6>Data Given</h6><h5> 500 MB <br><a href=http://www.paytm.com><img class=small src=img/paytm.jpg></a>";  
    echo "</div>";

  //echo "<div class=\"mdl-card__actions mdl-card--border\">
   // <a class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\">
   // View Updates
   //</a>
  //</div>
echo "</div><br><br><br>";


   
  }
}

?>

</div>

<!-- <div id="map"></div>-->



</body>
 </html>
