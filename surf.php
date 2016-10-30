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

$time=time()+3.5*60*60;
  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>

<html>
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
       <form method="post" action="connected.php">
         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="uname" maxlength="40">
    <label class="mdl-textfield__label" for="nameuser">Enter Hotspot's Name
  </label></div>
  <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="pword" maxlength="40">
    <label class="mdl-textfield__label" for="nameuser">Enter amount of Data(in MB).
  </label></div>
  <br>
  <button class="btn btn-primary"  data-toggle="modal" data-target="#myModal" type="submit">Get Password</button></div>
  <br>
</form>

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
