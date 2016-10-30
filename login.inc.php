<?php

if(isset($_POST['eml'])&&isset($_POST['phn'])&&isset($_POST['uname1'])&&isset($_POST['pword1'])&&isset($_POST['pword11'])&&isset($_POST['namef1'])&&isset($_POST['namel1'])&&isset($_FILES['proim']['name']))/*to check that user has submitted the signup form*/
    {$usern1=$_POST['uname1'];//getting values from fields using post method
      $passw=$_POST['pword1'];
      $fname=$_POST['namef1'];
      $lname=$_POST['namel1'];
      $eml=$_POST['eml'];
      $phn=$_POST['phn'];
      $tomatch=$_POST['pword11'];
      $impronm=$_FILES['proim']['name'];//getting file name
      $improtmp=$_FILES['proim']['tmp_name'];//getting its temporary location
      $hashed=md5($passw);
      
      if(!empty($usern1) && !empty($passw)&& !empty($fname) && !empty($lname)&&!empty($impronm) && !empty($eml) && !empty($phn))/*to see the values are not empty*/
        {
          if($tomatch==$passw)/*matching password and re-enter password*/
            {
              $query1="SELECT username from user_in where username='$usern1';";/*query to check username already exists*/
              $reslt=mysql_query($query1);/*running the query*/
              if(mysql_num_rows($reslt)==1)/*checking that same username exists*/
              {
                echo "<div class=\"alert alert-danger fade in signup\">Username already Exists<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//producing error if same username exists 
              }
              else
              {$location='imgprof/'.$impronm;
                if(move_uploaded_file($improtmp,$location))
                {
                    $query="INSERT INTO `oj1`.`user_in` (`id`, `fname`, `srname`, `pword`, `username`, `email`, `phone`, `score`,`imgln`) VALUES (NULL,'".mysql_real_escape_string($fname)."','".mysql_real_escape_string($lname)."','".mysql_real_escape_string($hashed)."','".mysql_real_escape_string($usern1)."','".mysql_real_escape_string($eml)."','".mysql_real_escape_string($phn)."','1000','".mysql_real_escape_string($location)."');";//query to upload our data on server database
                    if($result=mysql_query($query))//run the query
                    {
                      echo "<br><br><br><br><div class=\"alert alert-success signup\">Your account has been created successfully<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";/*giving notification about successful creation of account*/
                       $query="SELECT id from user_in where username='".mysql_real_escape_string($usern1)."' AND pword='".mysql_real_escape_string($hashed)."';";//finding the id of newly made account
                        $result=mysql_query($query);//run the query

                        $us_id=mysql_result($result,0,'id');
                          //getting the user id
                        //$t=time(); 
                        //$query1="CREATE TABLE `oj`.`$us_id` ( `id` INT NOT NULL AUTO_INCREMENT ,  `msgto` INT NOT NULL ,  `type` VARCHAR(10) NOT NULL ,  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `content` VARCHAR(1000) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB";
                          //if(!mysql_query($query1)) echo 'error';
          
                $_SESSION['user_id']=$us_id;//starting the session for the user
                      header('Location: index.php');
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
?>





                

  <?php
if(!empty($_COOKIE['uid'])&&isset($_COOKIE['uid'])){$_SESSION['user_id']=$_COOKIE['uid'];
            header('Location: index.php');}/*to directly login in case of preset cookies*/
else {if(isset($_POST['uname'])&&isset($_POST['pword']))//check if the values are set i.e. form is submitted by user
{$usern=$_POST['uname'];//getting values using more secure post method

$passw=$_POST['pword'];

$hashed=md5($passw);

if(!empty($usern) && !empty($passw))/*check the fields are not empty*/
    {
    $query="SELECT id from user_in where username='".mysql_real_escape_string($usern)."' AND pword='".mysql_real_escape_string($hashed)."';";/*query to see any user is there with a given username and password*/

      if($result=mysql_query($query))/*run the query */
      {
        $num_rows=mysql_num_rows($result);
        if($num_rows==0)/*check if no rows are returned there is no such user*/
          echo "<div class=\"alert alert-danger fade in log\">Invalid Credentials<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";
        else if($num_rows==1)
          { /*get user id from mysql table*/
            $us_id=mysql_result($result,0,'id');
      $t=time();
       /*check if the checkbox is selected to make cookies*/  
       if(isset($_POST['rmmbr'])&&!empty($_POST['rmmbr'])) setcookie('uid',$us_id,$t+60*60*24*365);

      /*start a session and send to index1.php*/$_SESSION['user_id']=$us_id;
            
            
            header('Location: index.php');}
          
      }
    }//check all fields are filled
else echo "<div class=\"alert alert-danger fade in log\">Please fill in all the fields<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";
}}
?>
      




<!DOCTYPE html>
<html lang="en">
<head>
  <title>DataBucks</title>
  <link rel="shortcut icon" href="" type="image/x-icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>  
  <style>

#logins{display: none;}
#logups{display: none;}

.page{height:678px;width:70%;
background-size:100%;margin:auto;overflow:auto;}
  
  #file { display: none;}
 /* *{font-family:'Bitter';}*/
.inc {font-size:16px;}
.inc1{font-size:20px;}
.inc2{font-size:32px ;}

  </style>

  <script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
    });
  //alert($(window).height());
  //alert($(window).width());
    var h=$(window).height();
    var w=$(window).width();
    $('.page').height(h);
    $('.page').width(w);
    $('#login').height(h);
    $('#login').width(w); 
  </script>



  <link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">

  <!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
  <link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="css/partical-animation.css">
        <!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
  <link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
        <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <link rel="stylesheet" type="text/css" href="css/color/blue.css">



</head>
<body>







 <div class="preloader">
    <div class="loader theme_background_color">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- [ /PRELOADER ]
=============================================================================================================================-->
<!-- [WRAPPER ]
=============================================================================================================================-->
<div class="wrapper">
  <!-- [NAV]
 ============================================================================================================================-->    
   <!-- Navigation
    ==========================================-->
    <nav  class=" ramsh-menu navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.php">Data<span class="themecolor">Bucks</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#home" class="page-scroll">Home</a></li>
            <li><a href="#about" class="page-scroll">About</a></li>
            <li><a href="#service" class="page-scroll">Services</a></li>
            <li><a href="#teams" class="page-scroll">Team</a></li>
            <li><a href="#about" class="page-scroll">Existing User</a></li>
            <li><a href="#about" class="page-scroll">New User</a></li>
            <li><a href="#contact" class="page-scroll">Contact</a></li>

            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
   <!-- [/NAV]
 ============================================================================================================================--> 
<!--sign up -->
    <script type="text/javascript" src=js/check.js></script>
   <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
    <section class="main-heading text-center" id="home">
        <div id="particles-js"></div>
        <div class="overlay">
        <div class="container ">
            <div class="row">
                <div class="col-md-12 col-sm-12 animate fadeInDown">
                   <h1 class="text-capitalize inc2">Welcome on <strong>Data<span class="themecolor">Bucks</span></strong></h1>
               <p class="lead inc1">One for all<strong>,all for one</strong></p>
               <p class=inc>Be part of the mobile crowdsourced Wifi network where you can earn <br>points for sharing your data or use your points to consume data.</p>



                </div>
                 <br><a href="#about" class="fa fa-angle-down page-scroll img-circle"></a><br>Start
            </div>
            
        </div>
        </div>
    </section>
 <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
 
 
 <!-- [ABOUT US]
 ============================================================================================================================-->
 <section class="aboutus white-background black" id="about">
     <div class="container">
         <div class="row">
             <div class="col-md-6 col-sm-6">
               <div class="aboutText">
  


                        <div class="sectionTitle fadeInDown">
                            <h4>About us</h4>
                            <h2>Some words <strong>about us</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">We love connecting people through hotspot. Using our platform people will connect in a way they will never forget.</p>    <br><br>
                               <button type="submit" class="btn btn-primary black-background" id="logbtn">Log In</button>
                               <button type="submit" class="btn btn-primary black-background" id="signbtn">Sign Up</button>

  <form method="post" action="<?php echo $current_file;?>" id="logins">
         
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type ="text" name="uname" id="unam" maxlength="40" value="<?php if(isset($usern)) echo $usern;?>">
                    <label class="mdl-textfield__label" for="unam">
                      Username
                    </label>
                  </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type ="password" name="pword" id="unam3" value="">
                  <label class="mdl-textfield__label" for="unam3">
                    Password
                  </label>
                </div><br>
                Remember Me<br><input type="checkbox" name=rmmbr id="rmmbr"><br>
                <br>
                <input type="submit" value="Log In" class="btn btn-primary black-background">
                  </form>

                   <form method="post" action="<?php echo $current_file;?>" enctype="multipart/form-data" id="logups">
  <br>
  <input type="file" id="file" accept='image/*' name="proim" >
<label for="file" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
  <i class="material-icons">person_outline</i>
</label>
    <br><br><br>
    <div id="ustatus"> </div>
    <br>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="uname1" maxlength="40" value="<?php if(isset($usern1)) echo $usern1;?>" id="nameuser">
    <label class="mdl-textfield__label" for="nameuser">Username:
  </label></div>
  <br>
   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" type="password" name="pword1" id="p1">
    <label class="mdl-textfield__label" for="p1">Password:</label>
  </div>
<br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="password" name="pword11" id="p2">
    <label class="mdl-textfield__label" for="p2">Retype Password:</label>
  </div>
<br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="namef1" maxlength="30" value="<?php if(isset($fname)) echo $fname;?>" id="fnm">
    <label class="mdl-textfield__label" for="fnm">First Name:</label>
  </div>
  <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="text" name="namel1" maxlength="30" value="<?php if(isset($lname)) echo $lname;?>" id="lnm">
    <label class="mdl-textfield__label" for="lnm">Last Name:</label>
  </div>
  <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type ="email" name="eml" maxlength="30" value="<?php if(isset($eml)) echo $eml;?>" id="em">
    <label class="mdl-textfield__label" for="lnm">Email:</label>
  </div>
  <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="phn" maxlength="30" value="<?php if(isset($phn)) echo $phn;?>" id="ph">
    <label class="mdl-textfield__label" for="ph">Phone</label>
    <span class="mdl-textfield__error">Input is not a number!</span>
  </div>
  <br>
  <br>
  <button type="submit" class="btn btn-primary black-background" id="contactbtn">Submit</button>
  <br>
</form>

                        <ul class="aboutList">
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Mission</strong> - <em>We deliver uniqueness and quality</em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Skills</strong> - <em>Delivering fast and excellent results</em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Clients</strong> - <em>Satisfied clients thanks to our experience</em>
                            </li>
                        </ul>
                    </div>  
                 
                
             </div>
             <div class="col-md-6 col-sm-6">
                 <img src="images/pc1.png" class="img-responsive" alt="pc"/>
             </div>              
         </div>        
     </div>     
 </section>
 
 <!-- [/ABOUTUS]
 ============================================================================================================================-->
 
 
 
 <!-- [SERVICES]
 ============================================================================================================================-->
 <section class="our-services theme_background_color white text-center" id="service">
 <div class="container">
     <div class="row">
         <div class="col-md-12">
            <div class="sectionTitle text-center white">
                <h2>Take a look at <strong>our services</strong></h2>
                <div class="line white-background">
                 </div>
                <div class="clearfix"></div>
                <p class="intro"></p>
            </div> 
         </div>         
     </div>
     
     <div class="gap"></div>
     
     <div class="col-md-4 col-sm-6 O-service">
                    <i class=""></i>
                    <h4><strong>One click Access</strong></h4>
                    <p>With DataBucks, your smartphone can identify Wifi connectivity sharers in your locale and prompt to connect in one click.</p>
                </div>

                <div class="col-md-4 col-sm-6 O-service">
                    <i class=""></i>
                    <h4><strong>Clear points scheme</strong></h4>
                    <p>Our clear published pricing allows you to choose the right package for you to consume data on the go.</p>
                </div>

                <div class="col-md-4 col-sm-6 O-service">
                    <i class=""></i>
                    <h4><strong>Spend points for what you use</strong></h4>
                    <p>.
Be it checking your emails, collaborating real time on work or skyping with your family, our easy to understand pricing and accurate data session tracking ensures that you will pay for only what you use.</p>
                </div>


     
 </div>    
 </section>
 
 
 
 <!-- [/SERVICES]
 ============================================================================================================================-->
 
  <!-- [OUR TEAM]
 ============================================================================================================================-->
 <section class="our-team text-center" id="teams">
    <div class="overlay">
            <div class="container">
                <div class="sectionTitle center">
                    <h2>This is  <strong>our team</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>

                <div id="team" class="owl-carousel owl-theme row">
                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/2.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Vaibhav</h3>
                                <p>Member</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="images/team/02.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Deepanshu</h3>
                                <p>Member</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/1.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Kushagra</h3>
                                <p>Member</p>
                                <p>The idea is not to live forever,but to do something that will.</p>
                            </div>
                        </div>
                    </div>



                </div>
                
            </div>
        </div>
     
 </section>
 <!-- [/OUR TEAM]
 ============================================================================================================================-->
 
 
 <!-- [CONTACT]
 ============================================================================================================================-->
 <section class="contact-remsh white-background black" id="contact">
 <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="sectionTitle text-center">
                        <h2>Feel free to <strong>contact us</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                                   
                    </div>

                   <form id="contact-form" method="POST" action="php/sendmail.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary black-background" id="contactbtn">Submit</button>
                    </form>

                </div>
            </div>

        </div>
 </section>
 
 <!-- [/CONTACT]
 ============================================================================================================================-->
 
 
 
 
 <!-- [FOOTER]
 ============================================================================================================================-->
 <footer class="footer">
        <div class="container">
            <div class="pull-left fnav">
                <p></p>
            </div>
            <div class="pull-right fnav">
                <ul class="footer-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
 
 <!-- [/FOOTER]
 ============================================================================================================================-->
 
 
 
</div>
 

<!-- [ /WRAPPER ]
=============================================================================================================================-->

  <!-- [ DEFAULT SCRIPT ] -->
  <script src="library/modernizr.custom.97074.js"></script>
  <script src="library/jquery-1.11.3.min.js"></script>
        <script src="library/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>  
  <!-- [ PLUGIN SCRIPT ] -->
  <script src="js/plugins.js"></script>
  <!-- [ SLIDER SCRIPT ] -->  
        <script src="js/owl.carousel.js"></script> 
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
         <!-- [ PARTICLE SCRIPT ] -->
  <script src="js/particles.min.js"></script>
  <script src="js/partical-animation.js"></script>
        <!-- [ PORTFOLIO SCRIPT ] -->
        <script type="text/javascript" src="js/jquery.isotope.js"></script>
  
        <!-- [ COMMON SCRIPT ] -->
  <script src="js/common.js"></script>

<script type="text/javascript">
$('#logbtn').click(function(){
  $('#logups').hide();
  $('#logins').toggle();
  
});
$('#signbtn').click(function(){
  $('#logins').hide();
  $('#logups').toggle();
  
});
</script>
</body>
</html>
