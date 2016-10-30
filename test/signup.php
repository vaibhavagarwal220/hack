
<!--sign up -->




<?php
require 'core.inc.php';
require 'connect.inc.php';
echo 'Hellofir';
  if(!loggedin()){
    if(isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['uname1'])&&isset($_POST['pword1'])&&isset($_POST['pword11'])&&isset($_POST['namef1'])&&isset($_POST['namel1'])&&isset($_FILES['proim']['name']))/*to check that user has submitted the signup form*/
    {echo 'Hellobeg';
    $usern1=$_POST['uname1'];//getting values from fields using post method
      $passw=$_POST['pword1'];
      $fname=$_POST['namef1'];
      $lname=$_POST['namel1'];
      $eml=$_POST['email'];
      $phn=$_POST['phone'];
      $tomatch=$_POST['pword11'];
      $impronm=$_FILES['proim']['name'];//getting file name
      $improtmp=$_FILES['proim']['tmp_name'];//getting its temporary location
      $hashed=md5($passw);//encrypting the password

      if(!empty($usern1) && !empty($passw)&& !empty($fname) && !empty($lname)&&!empty($impronm) && !empty($eml) && !empty($phn))/*to see the values are not empty*/
        {echo 'Hellonotem';
          if($tomatch==$passw)/*matching password and re-enter password*/
            {
              $query1="SELECT username from user_in where username='$usern1';";/*query to check username already exists*/
              $reslt=mysql_query($query1);/*running the query*/
              if(mysql_num_rows($reslt)==1)/*checking that same username exists*/
              {echo 'Hello';
                echo "<div class=\"alert alert-danger fade in signup\">Username already Exists<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//producing error if same username exists 
              }
              else
              {echo 'Hellomatch';
                $location='imgprof/'.$impronm;
                echo $location;
                echo $improtmp;/*moving the profile picture onto our server*/
                if(move_uploaded_file($improtmp,$location))
                {echo 'Helloup';
                    $query="INSERT INTO `oj`.`user_in` (`id`, `fname`, `srname`, `pword`, `username`, `email`, `phone`, `score`,`imgln`) VALUES (NULL,'".mysql_real_escape_string($fname)."','".mysql_real_escape_string($lname)."','".mysql_real_escape_string($hashed)."','".mysql_real_escape_string($usern1)."','".mysql_real_escape_string($eml)."',".mysql_real_escape_string($phn).",1000,'".mysql_real_escape_string($location)."');";//query to upload our data on server database
                    if($result=mysql_query($query))//run the query
                    {echo 'Hellofin';
                      echo "<br><br><br><br><div class=\"alert alert-success signup\">Your account has been created successfully<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";/*giving notification about successful creation of account*/
                       $query="SELECT id from user_in where username='".mysql_real_escape_string($usern1)."' AND pword='".mysql_real_escape_string($hashed)."';";//finding the id of newly made account
                        $result=mysql_query($query);//run the query

                        $us_id=mysql_result($result,0,'id');
                          //getting the user id
                        //$t=time(); 
                        //$query1="CREATE TABLE `oj`.`$us_id` ( `id` INT NOT NULL AUTO_INCREMENT ,  `msgto` INT NOT NULL ,  `type` VARCHAR(10) NOT NULL ,  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `content` VARCHAR(1000) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
                          //if(!mysql_query($query1)) echo 'error';
          
                $_SESSION['user_id']=$us_id;//starting the session for the user
                      header('Location: index1.php');
                    }
              }
              else {echo "<div class=\"alert alert-danger fade in signup\">error uploading image<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";}//display error about image
            }
            }
        else
        {
        echo "<div class=\"alert alert-danger fade in signup\">Passwords do not match<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//display error about password
        }

      }
  else echo "<div class=\"alert alert-danger fade in signup\">Please fill in all the fields<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//display error about empty fields
  }
}
else if(loggedin())
{
  echo "<div class=\"alert alert-danger fade in signup\">Already logged in and registered<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//display error on already being logged in
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css" type="text/css">
  <style>
    .log{padding:15px;}
    .signup{padding:15px;}
    .form-group{margin-left: 10px;margin-right: 10px;}
    .lg {font-size:100px;}
    h1,h2.ttl,h3.subttl {padding:7px; margin-left:10px;}
    
    .jumbotron{background-color: rgba(231,131,112);
      background-repeat: round;color:#7DA1E9;}
      .bg-grey{background-color: "grey";}
      *{color: white;}
       
#background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100%;
    opacity: 0.4;
    filter:alpha(opacity=40);
    display:none;
}

.head{
    width: 150px;
    height: 160px;
}
body {
    text-align: center;
    background: #e9ebee;
    padding-top: 12px;
    line-height: 2;
}

#login{height:615px;width:1366px;
background-size:100%;border:1px solid white;margin:auto;
padding-top:200px;}
.page{height:615px;width:1366px;
background-size:100%;border:1px solid white;margin:auto;overflow:auto;}
  *{color:black;}
  </style>

  <script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
    });
    var h=$(window).height();
    var w=$(window).width();
    $('.page').height(h);
    $('.page').width(w);
    $('#login').height(h);
    $('#login').width(w); 
  </script>
</head>
<body>       

                  <form method="post" action="signup.php" enctype="multipart/form-data">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="uname1" maxlength="40" value="<?php if(isset($usern1)) echo $usern1;?>" required id="nameuser" >
    <label class="mdl-textfield__label" for="nameuser">Username:<div class=\"alert alert-info fade in \" id="ustatus"><a href="" class=\"close\" data-dismiss=\"alert\">&times;</a></div>
  </div></label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" type="password" name="pword1" required id="p1">
    <label class="mdl-textfield__label" for="p1">Password:</label>
  </div>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" name="pword11" required id="p2">
    <label class="mdl-textfield__label" for="p2">Retype Password:</label>
  </div>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="namef1" maxlength="30" value="<?php if(isset($fname)) echo $fname;?>" required id="fnm">
    <label class="mdl-textfield__label" for="fnm">First Name:</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="namel1" maxlength="30" value="<?php if(isset($lname)) echo $lname;?>" required id="lnm">
    <label class="mdl-textfield__label" for="lnm">Last Name:</label>
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="email" name="eml" maxlength="30" value="<?php if(isset($eml)) echo $eml;?>" required id="em">
    <label class="mdl-textfield__label" for="lnm">Email:</label>
  </div>

  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="phn" maxlength="30" value="<?php if(isset($phn)) echo $phn;?>" required id="ph">
    <label class="mdl-textfield__label" for="ph">Phone</label>
    <span class="mdl-textfield__error">Input is not a number!</span>
  </div>

            
                    <input type="file" accept='image/*' name="proim" required>
                
                
                <button type="submit" class="btn btn-default">Create Account</button>
                

              </form>






  <!--<div id="signup" class=page>
    <form method="post" action="<?php echo $current_file;?>" enctype="multipart/form-data" class= "form-horizontal">
    <h1>SIGN UP</h1>
        <div class='form-group'>
            <div class="col-sm-offset-2 col-sm-6"><input type="text" name="uname1" maxlength="40" value="<?php if(isset($usern1)) echo $usern1;?>" required placeholder=username class="form-control" id="nameuser" minlength=6></div>
            <div class="col-sm-3" id="ustatus">
            </div>
            </div><br><br>
      <div class='form-group'>
            <div class="col-sm-offset-2 col-sm-6"><input placeholder="password" type="password" name="pword1" required class="form-control"></div></div><br><br>
        
        
        <div class="form-group"><div class="col-sm-offset-2 col-sm-6"><input type="password" name="pword11" required class="form-control" placeholder="re-enter password"></div></div><br><br>
      
        
        <div class="form-group"><div class="col-sm-offset-2 col-sm-6"><input type="text" name="namef1" maxlength="30" value="<?php if(isset($fname)) echo $fname;?>" required class="form-control" placeholder="first name"></div></div><br><br>
      
        
        <div class="form-group"><div class="col-sm-offset-2 col-sm-6"><input type="text" name="namel1" maxlength="30" value="<?php if(isset($fname)) echo $lname;?>" required class="form-control" placeholder="last name"></div></div><br><br>
      
        
        <div class="form-group"><label for="proim" class="control-label col-sm-2">Image:</label><div class=col-sm-6>   <input type="file" name="proim" required  class="form-control" accept="image/*"></div></div>
      
        
        <label for="butn" class="control-label col-sm-2"></label> <div class=col-sm-6>   <input type="submit" value="Sign Up" class="btn btn-primary"  class="form-control" id=btnsignup></div>
    </form>
  </div>-->
        
    
    <script type="text/javascript" src=js/check.js></script>
</body>
</html>
