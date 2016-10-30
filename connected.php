<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
$id=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$duse=getfield('dused');
$dgiv=getfield('dgive');
$poin=getfield('points');
$pwrd="";
$nmuser="";
$usernm="";
$time=time()+3.5*60*60;
  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>

<?php
/*to directly login in case of preset cookies*/
if(isset($_POST['uname'])&&isset($_POST['pword']))//check if the values are set i.e. form is submitted by user
{
$usernm=$_POST['uname'];//getting values using more secure post method

$passw=$_POST['pword'];



if(!empty($usernm) && !empty($passw))/*check the fields are not empty*/
    {
    $query="SELECT * from hotspot where hotnm='".mysql_real_escape_string($usernm)."';";
    
    /*query to see any user is there with a given username and password*/

      if($result=mysql_query($query))/*run the query */
      {
        $num_rows=mysql_num_rows($result);
        if($num_rows==0)/*check if no rows are returned there is no such user*/
          echo "<div class=\"alert alert-danger fade in log\">No HotSpot Found<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";
        else if($num_rows==1)
          { /*get user id from mysql table*/
            $nmuser=mysql_result($result,0,'username');
             $pwrd=mysql_result($result,0,'pword');
            $query1="Update user_in set dgive=dgive+".mysql_real_escape_string($passw)." where username='".mysql_real_escape_string($nmuser)."';";
    $query2="Update user_in set dused=dused+".mysql_real_escape_string($passw)." where username='".mysql_real_escape_string($usern)."';";
    $query3="Update user_in set points=points-".mysql_real_escape_string($passw)." where username='".mysql_real_escape_string($usern)."';";
    $query4="Update user_in set points=points+".mysql_real_escape_string($passw)." where username='".mysql_real_escape_string($nmuser)."';";
    mysql_query($query1);
    mysql_query($query2);
    mysql_query($query3);
    mysql_query($query4);        
          }
       } //check all fields are filled
else echo "<div class=\"alert alert-danger fade in log\">Please fill in all the fields<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";
}
}
?> <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DataBucks</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 

  <style type="text/css">
  #map {

        height: 75%;
        width:40%; 

      }
  #contain{width:70%;margin:auto;}
    #conne{position:absolute;left:50%;top:30%;}
  </style>
</head>
<body>
  
<?php
include 'navbar.php'
 ?>
<style type="text/css">
  aside{float:right;margin-bottom:0px;}

</style>
<style type="text/css">
  *{font-family:Roboto;}</style>
 <div id="contain">
       <div id="map"></div><div id="conne">
       <form method="post" action="surf.php">
       <h4>Shared WiFI Network</h4>
        <h5>Connected to </h5> <h4><?php echo $usernm?></h4><br>

        <h5> Password </h5> <h4><?php echo $pwrd?></h4>
       <button class="btn btn-danger" type="submit">End Session</button></div>
  <br>
</form>
&nbsp;&nbsp;&nbsp;*Your points will be deducted according to our calculation of your data usage.<br>&nbsp;&nbsp;&nbsp;Keep sharing your WiFi to earn more points.
        *Make sure you end Session after usage
        <br>
        *Do not reload,close or press the back button.

        
        

   
     <aside>

<?php        $query="SELECT fname,srname,imgln,username,id from user_in where username='".$usern."'";
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
  <div class=\"mdl-card__supporting-text\"><h6>Username</h6><h5> ".$usern."  <h5><br><h6>Points Earned</h6><h5> ".$poin." <h5><br><h6>Data Used</h6><h5> ".$duse." MB <h5><br><h6>Data Given</h6><h5> ".$dgiv." MB <br><a href=http://www.paytm.com><img class=small src=img/paytm.jpg></a>";  
    echo "</div>";

  //echo "<div class=\"mdl-card__actions mdl-card--border\">
   // <a class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\">
   // View Updates
   //</a>
  //</div>
echo "</div>";


   
  }
}

?>

     </aside>
 </div>

<script>
      function initMap() {
        var uluru = {lat: 31.7754, lng: 76.9861};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4A9uXVeaF37C-NoyhHbt7nQ5HBS07J5s&callback=initMap">
    </script>
</body>
 </html>
