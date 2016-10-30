<?php
require '../connect.inc.php';
require '../core.inc.php';
$query="SELECT * from user_in;";

      if($result=mysql_query($query))
      {
        $num_rows=mysql_num_rows($result);
        if($num_rows==0)
          echo 'error retrieving';
        else if($num_rows>=1)
          {

            echo"<h1>USERS LIST</h1>";
            echo "<table class=\"table table-striped table-hover\">";
            echo 
            "<tr>
            <th>User ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Password</th>
            <th>Image</th>

            </tr>";
            for($ind=$num_rows-1;$ind>=0;$ind--)
            {
             $us_id=mysql_result($result,$ind,'id');
             $unm=mysql_result($result,$ind,'username');
             $fnm=mysql_result($result,$ind,'fname');
             $srnm=mysql_result($result,$ind,'srname');
             $pw=mysql_result($result,$ind,'pword');
             $imgl='../'.mysql_result($result,$ind,'imgln');
             
            echo 
            "<tr>
            <td>$us_id</td>
            <td>$unm</td>
            <td>$fnm</td>
            <td>$srnm</td>
            <td>$pw</td>
            <td><img src=\"$imgl\" class=pport></td>
            
            </tr>";
            }
            echo"</table>";
          }
      }

?>