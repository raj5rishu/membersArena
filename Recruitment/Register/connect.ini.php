<?php
/*this will connect to sql database*/
$conn_error = 'Could not connect. ';
$mysql_host = 'localhost';
$mysql_user = 'u361306742_mem';
$mysql_pass = 'nishank127';
$mysql_db = 'u361306742_mem';
if(!@mysql_connect($mysql_host, $mysql_user, $mysql_pass)||!@mysql_select_db($mysql_db))
 die ($conn_error);
?>