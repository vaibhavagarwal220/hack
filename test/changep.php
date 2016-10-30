<?php
include 'core.inc.php';
include 'connect.inc.php';
if(!loggedin()) {header('Location:index.php');}
$id=getfield('id');
$name_f=getfield('fname');
$name_sr=getfield('srname');
$ln_img=getfield('imgln');
$usern=getfield('username');
$pwd=getfield('pword');

?>

 <html>
 <head>

    <title>Change Your Password</title>   
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 

  <style type="text/css">

    .contain{width:70%;margin:auto;}
    #slideNotice{background-color:#f0f0f0;display:none;height:50px;position:relative;top:0;left:0;width:100%;text-align:center;font-family: Aclonicaregular;font-size: 20px;font-weight: bold;padding: 8px;scroll-behavior: auto;color: black;}
    .upld,.btn-success,.pport{margin-left:40px;}
    input{border-radius: 5px;}
    button{font-family: Tahoma;}
  </style>

</head>
<body>

<?php
include 'navbar.php'
 ?>
    <div class=contain>
    <div id="slideNotice"></div> 
                
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type=password id="opwd" maxlength="40">
    <label class="mdl-textfield__label" for="unam">Old Password
  </label></div>
           <br> <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type=password id="npwd" maxlength="40">
    <label class="mdl-textfield__label" for="unam">New password
  </label></div>
        <br>    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type=password id="npwdc" maxlength="40">
    <label class="mdl-textfield__label" for="unam">New Password
  </label></div>
<br>

                  <input type=button id="save_btn" value="save" class="btn btn-success">
        
        
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/changep.js"></script>
</body>
 </html>
