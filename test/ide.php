<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$id=getfield('id');
$time=time()+3.5*60*60;


  /*echo "<div class=awe>Logged in since ".date('d-M-Y H:i:s' , $time)." </div><br><div class=awe>Your IP Address is ".retip()."</div><br><br>";*/    
?>
 <html>
 <head>
   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/weldes.css">  
 

<title>OnlineIDE</title>




  <style type="text/css">
  
  #sample5{height:400px; width: 100%;}
  .mdl-textfield{
    height:200px;
    width:100%;
}

  a{color:white;}
  h6{display:inline;}
  .contain{width:70%;margin: auto;}

  </style>
</head>
<body>
  
 <?php
include 'navbar.php'
 ?>

<div class=contain>

<?php


if(isset($_POST['ln'])) {
$code=$_POST['ln'];

if(!empty($code)&&!empty($qcode)){
$my_file = 'codes/file.c';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
fwrite($handle, $code);
exec("./o", $output, $status);
        echo "status: " . $status;
          if($status==0) $res="AC";
          else if($status==1) $res="TLE";
          else if($status==2) $res="CE";
          else if($status==3) $res="RE";
          else if($status==4) $res="WA";
          else if($status==5) $res="MLE";
          echo "<br>output: " . implode("<br>", $output);

          
          
}
}




?>



<!-- Floating Multiline Textfield -->
<form action="ide.php" method=post>
  
    <textarea type="text" id="sample5" name=ln></textarea>
    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
  <input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
  <span class="mdl-checkbox__label">Provide Custom Input</span>
<br></label>
     <div class="mdl-textfield mdl-js-textfield" id="hideme">
    <textarea class="mdl-textfield__input" type="text" id="sample6" rows=7></textarea>
    <label class="mdl-textfield__label" for="sample6">enter input here</label>
  </div>
    
  <input type="submit" value=submit class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
</form>
        



    
  </div>

</body>
<script>
$('#hideme').hide();
     $('#checkbox-2').click(function(){
      $('#hideme').toggle();
     })

</script>
 </html>
