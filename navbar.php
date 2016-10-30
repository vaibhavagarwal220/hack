<script src="https://www.gstatic.com/firebasejs/3.5.2/firebase.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyC4A9uXVeaF37C-NoyhHbt7nQ5HBS07J5s",
    authDomain: "databucks-1477758902761.firebaseapp.com",
    databaseURL: "https://databucks-1477758902761.firebaseio.com",
    storageBucket: "databucks-1477758902761.appspot.com",
    messagingSenderId: "917168259604"
  };
  firebase.initializeApp(config);
</script>

<link rel="shortcut icon" href="" type="image/x-icon" />
<link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Amatica+SC|Galada|Lato|Montserrat|PT+Sans|Suez+One" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="stylesheet" type="text/css" href="css/deslog1.css">
<link href="css/prism.css" rel="stylesheet" />
  <script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  <script src="js/prism.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/g/ace@1.2.4(min/ace.js+min/mode-c_cpp.js)"></script>
  <script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>
  <script type="text/javascript" src="edit_area/edit_area_full.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    // initialisation
    
    
    editAreaLoader.init({
      id: "sample5" // id of the textarea to transform  
      ,start_highlight: true
      ,allow_toggle: true
      ,language: "en"
      ,syntax: "c"
      ,word_wrap: true  
      ,toolbar: "search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, |, help"
      ,syntax_selection_allow: "c,cpp"
      
      ,EA_load_callback: "editAreaLoaded"
      ,show_line_colors: true
    });
    
  </script>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="share.php">DataBucks</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li><a href=surf.php><i class="material-icons">settings_input_antenna</i>Surf</a></li>
        <li><a href=share.php><i class="material-icons">rowing</i>Share</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
<style type="text/css">
#cwhite{background-color:white;}
a:hover{text-decoration:none;}
body{background-color:#939393;}
</style>  
<?php
if(loggedin())
{
$viewprof=getfield('username');
$lnimg=getfield('imgln');  
echo "<div id=\"cwhite\">
            <a class=\"btn\" href=\"#\">
              <img src=$lnimg class=\"icn\" >&nbsp;$name_f
            </a>
            <a id=\"demo-menu-lower-right\" class=\"mdl-button mdl-js-button mdl-button--icon\">
            <i class=\"material-icons\">more_vert</i></a>
  <div>
      <ul class=\"mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect\"
          for=\"demo-menu-lower-right\">
        <a href=\"profile.php\"><li class=\"mdl-menu__item\">Edit Profile</li></a>
        <a href=\"changep.php\"><li class=\"mdl-menu__item\">Change Password</li></a>
        <a href=\"logout.php\"><li class=\"mdl-menu__item\">Log Out</li></a>
        
      </ul>
        
  </div>
</div>";
}

//else 
//{
 // echo "  <ul class=\"nav navbar-nav navbar-right\">
  //      
   //     <li><a data-toggle=\"modal\" data-target=\"#modl\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>
    //  </ul>";
//}
?>

      
</ul> 
      
      

  </div>
</nav>