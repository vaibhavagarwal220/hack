<?php
include 'connect.inc.php';
if(isset($_POST['ln'])){
$code=$_POST['ln'];
if(!empty($code)){
$my_file = 'codes/file.c';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
fwrite($handle, $code);
}
}
?>
<?php
if(isset($_FILES['file']['name'])&&!empty($_FILES['file']['name']))
{   $name=$_FILES['file']['name'];
 echo $name;
    $tmpname=$_FILES['file']['tmp_name'];
    $location='codes/'.$name;
    if(move_uploaded_file($tmpname,$location))
    {
        echo 'Uploaded';

    }
    else
    {
        echo 'Problem Uploading';
    }
}
?>
<?php

exec("./o", $output, $status);
echo "status: " . $status;
if($status==0) echo "<br>Correct Answer";
else if($status==1) echo "<br>Time Limit Exceeded";
else if($status==2) echo "<br>Compilation Error";
else if($status==3) echo "<br>Segmenttion Fault";
echo "<br>output: " . implode("<br>", $output);
?>
<!DOCTYPE html>
<html>
<head>
    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/g/ace@1.2.4(min/ace.js+min/mode-c_cpp.js)"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
<style type="text/css">
#editor{ 
        position:relative;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        height:350px;
        width:1200px;
    }
</style>
	<title>OnlineJudge</title>
</head>
<body>

  <div id="editor">//your code goes here
</div>
<!-- Floating Multiline Textfield -->
<form action=a.php method=post>
  <div class="mdl-textfield mdl-js-textfield">
    <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" name=ln></textarea>
    <label class="mdl-textfield__label" for="sample5">Enter Your Code Here</label>
  </div>
  <input type="submit" value=submit>
</form>

<form action="a.php" method="POST" enctype="multipart/form-data" >
            <input type="file" name="file" accept=".c,.cpp,.java">
            <input type="submit" value="submit">
        </form>
        

</body>
<script>
     $('#sample5').hide();
     var editor = ace.edit("editor");
   editor.setTheme("ace/theme/twilight");
   editor.getSession().setMode("ace/mode/c_cpp");
   
   editor.getSession().on('change', function(e) {
    // e.type, etc
    $('#sample5').val(editor.getSession().getValue());

});

</script>

</html>
