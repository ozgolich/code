<?php

$dbname = 'test';
$dbuser = 'test';
$dbpassword = 'test';
$host = 'localhost';

mysql_connect($host, $dbuser, $dbpassword);
mysql_select_db($dbname);

?>
