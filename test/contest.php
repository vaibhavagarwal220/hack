

<?php
require 'core.inc.php';
require 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$name_f=getfield('fname');
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
  <title>Practice Arena</title>

  <style type="text/css">
  a.sub{color:blue;}
  table a{color:blue;}
  .page{width:70%;margin:auto;}
img.pport{display:inline;}
h2.name,h5{display:inline;}
#time {padding:20px;display:none;}

  </style>
</head>
<body>
<?php
include 'navbar.php';?>
<div class=page>


<?php

 if(isset($_GET['q'])&&cexists($_GET['q']))
  $quid=$_GET['q'];

else
  {
//echo "<script>
//$(\"#time\").hide();
//</script>";
$queryqw="SELECT * from contests";
getcontests($queryqw);


}
 ?>

 <script>
$.post('remtime.php',{q:'<?php echo $quid;?>'},function(data){
$.post('caltime.php',{q:'<?php echo $quid;?>'},function(data1){
          
        if(data!="0"&&data1=="0") {
          $("#time").hide().html(data).show();
          
        }
        else if(data=="0"&&data1=="0") {
          alert('Contest Ended');
          <?php
           $quer="DELETE from keptin where cid='".$quid."';";
           $quer_res=@mysql_query($query);
          ?>
        }
        else 
        {
          
        }
      });
    });
</script>


    

<div id="questions">
</div>

<aside id="time">
</aside>

<script type="text/javascript">

          var inter=setInterval(function()
{

$.post('caltime.php',{q:'<?php echo $quid;?>'},function(data){
  if(data!="0") $("#time").hide().html(data).show();
  else {


    clearInterval(inter);
    
    
    $.post('getprob.php',{q:'<?php echo $quid;?>'},function(data){$("#questions").hide().html(data).show();});
    
    var interq=setInterval(function(){

      $.post('getprob.php',{q:'<?php echo $quid;?>'},function(data){$("#questions").hide().html(data).show();});

    },10000);
    
    var interp=setInterval(function(){

      $.post('remtime.php',{q:'<?php echo $quid;?>'},function(data){
        if(data!="0") $("#time").hide().html(data).show();
        else 
        {
          <?php
           $quer="DELETE from keptin where cid='".$quid."';";
           $quer_res=@mysql_query($query);
          ?>
          clearInterval(interp);
          clearInterval(interq);
          alert('Ended');

        }
      });

    },1000);
        
  }
});
},100);
        
        


</script>

    
  
</div>
</body>
 </html>
