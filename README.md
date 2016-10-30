#DataBucks
Project in HTML,CSS,jQuery,PHP
1. import oj1.sql file.This will create all required tables as well as database.
2. change the connect.inc.php file according to your mysql server username and password
i.e. on line 2 of connect.inc.php
     mysql_connect('localhost','mysql_server_username','mysql_server_password')
3.if you are on a linux installation of xampp
		copy all the contents of this folder to /opt/lampp/lampp/htdocs/hack
  (make sure that the folder has permissions of read and write)
4.if you are on a windows installations of xampp
		copy all the contents of this folder to htdocs/hack folder inside the xampp installation folder
5.start a apache server as well as mysql server using xampp.
6.open localhost/hack/index.php.

