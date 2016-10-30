
<!--sign up -->




<?php
require 'connect.inc.php';
if(isset($_POST['qcode'])&&isset($_POST['qname'])&&isset($_FILES['inp']['name'])&&isset($_FILES['outp']['name'])&&isset($_FILES['ques']['name'])&&isset($_POST['tl']))/*to check that user has submitted the signup form*/
    { //getting values from fields using post method
      $qcode=$_POST['qcode'];
      $qnm=$_POST['qname'];
      $tl=$_POST['tl'];
      $tester=$_POST['pbte'];
      $edit=$_POST['editorial']; 
      $author=$_POST['pbau'];
      $in=$_FILES['inp']['name'];//getting file name
      $int=$_FILES['inp']['tmp_name'];//getting its temporary location
      $out=$_FILES['outp']['name'];//getting file name
      $outt=$_FILES['outp']['tmp_name'];//getting its temporary location
      $ques=$_FILES['ques']['name'];//getting file name
      $quest=$_FILES['ques']['tmp_name'];//getting its temporary location
      

      if(!empty($qcode)&&!empty($in)&&!empty($out)&&!empty($ques)&&!empty($tl)&&!empty($qnm))/*to see the values are not empty*/
        {
          
              $query1="SELECT `qid` from `oj`.`questions` where `qid`='".$qcode."';";/*query to check username already exists*/
              $reslt=mysql_query($query1);/*running the query*/
              if(mysql_num_rows($reslt)!=0)/*checking that same username exists*/
              {
                echo "<div class=\"alert alert-danger fade in signup\">question code exists<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//producing error if same username exists 
              }
              else
              {$locin='input/'.$in;
            $locout='output/'.$out;
            $locqu='questions/'.$ques;
               /*moving the profile picture onto our server*/
                if(move_uploaded_file($int,$locin)&&move_uploaded_file($outt,$locout)&&move_uploaded_file($quest,$locqu))
                {
                    $query="INSERT INTO `oj`.`questions` (`qid`,`qname`, `inpln`, `outln`, `qln`, `tl`) VALUES ('".mysql_real_escape_string($qcode)."','".mysql_real_escape_string($qnm)."','".mysql_real_escape_string($locin)."','".mysql_real_escape_string($locout)."','".mysql_real_escape_string($locqu)."',".mysql_real_escape_string($tl).");";//query to upload our data on server database
                    if($result=mysql_query($query))//run the query
                    {
                      echo "<br><br><br><br><div class=\"alert alert-success signup\">Your question has been added successfully<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";/*giving notification about successful creation of account*/
                       
                    }
              }
              else {echo "<div class=\"alert alert-danger fade in signup\">error uploading question<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";}//display error about image
            }
        

      }
      else echo "<div class=\"alert alert-danger fade in signup\">Please fill in all the fields<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a></div>";//display error about empty fields

    }
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>OJ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/weldes.css" type="text/css">
</head>
<body>




                    
                <form method="post" action="quesadd.php" enctype="multipart/form-data">
                    <div id="ustatus"> </div>
          <br>Question Code:<input type ="text" name="qcode" maxlength="30" value="<?php if(isset($qcode)) echo $qcode;?>" required>
          <br>Question Name:<input type ="text" name="qname" maxlength="200" value="<?php if(isset($qnm)) echo $qnm;?>" required>
          <br>author:<input type ="text" name="pbau" maxlength="40">
          <br>tester:<input type ="text" name="pbte" maxlength="40">
          <br>time limit:<input type ="text" name="tl" maxlength="40">
          <br>editorial:<input type ="text" name="editorial">
  
  <br>

    Input<br><br><input type="file" id="file" accept='text' name="inp" required>
<br>
    Output<br><br><input type="file" id="file" accept='text' name="outp" required>
<br>

Question<br><br><input type="file" id="file" accept='text' name="ques" required>
<br>

              
  
                
                <button type="submit">add question</button>
              </form>
           
    <script type="text/javascript" src=js/check.js></script>
</body>
</html>

