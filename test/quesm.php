<?php
include 'connect.inc.php';
if(isset($_POST['stat'])&&isset($_POST['in'])&&isset($_POST['out'])&&isset($_POST['test'])&&isset($_POST['exin'])&&isset($_POST['exout'])&&isset($_POST['qcode'])&&isset($_POST['qnm']) ){
$prob=nl2br($_POST['stat']);
$inf=nl2br($_POST['in']);
$outf=nl2br($_POST['out']);
$cons=nl2br($_POST['test']);
$exin=nl2br($_POST['exin']);
$exout=nl2br($_POST['exout']);
$qcode=$_POST['qcode'];
$name=$_POST['qnm'];
if(!empty($prob)&&!empty($inf)&&!empty($outf)&&!empty($cons)&&!empty($exin)&&!empty($exout)&&!empty($qcode)){

$my_file = 'questext/'.$qcode.'txt';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
$code="<h2>".$name."</h2><h5>Problem Code:".$qcode."</h5><br><p>".$prob."</p><br><h4>Input Format:</h4><br><p>".$inf."</p><h4>Output Format</h4><p>".$outf."</p><br><h4>Constraints:</h4><p>".$cons."</p><br><h4>Example Test Cases:</h4> <br> <h5>Input Format</h5><p>".$exin."</p><br><h5>Output Format</h5><p>".$exout."</p>";
fwrite($handle, $code);
}
}
?>


<!DOCTYPE html>
<html>
<head>
    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/g/ace@1.2.4(min/ace.js+min/mode-c_cpp.js)"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  <title>OnlineJudge</title>
</head>
<body>

<form action="quesm.php" method="post">
    <br><input type=text maxlength=20 name=qcode placeholder="question code">
    <br><input type=text maxlength=200 name=qnm placeholder="question name">
    <br>Problem statement<br><textarea type="text" rows= "10" name=stat cols=100></textarea>
    <br>Input Format<br><textarea type="text" rows= "5" name=in cols=100></textarea>
    <br>Output Format<br><textarea type="text" rows= "5" name=out cols=100></textarea>
    <br>Constraints<br><textarea type="text" rows= "5" name=test cols=100></textarea>
    <br>Example Input<br><textarea type="text" rows= "10" name=exin cols=100></textarea>
    <br>Example Output<br><textarea type="text" rows= "10" name=exout cols=100></textarea>
  <br><input type="submit" value=submit>
</form>


        

</body>


</html>
