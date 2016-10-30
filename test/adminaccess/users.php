<html lang="en">
<head>
  <title>Users on Our Page</title>
 <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<style type="text/css">
img.pport{width: 130px;height: 170px;}
.icn-lg {width:20px;height: 20px;}
</style>
</head>
<body>
<div id="users">
</div>


<script type="text/javascript">

setInterval(function()
{
var un=$('#un').val();
$.post('getusers.php',{},function(data){
  $("#users").hide().html(data).show();
});
},1000);
</script>
</body>
</html>
