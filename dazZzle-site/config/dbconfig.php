<?php

define('DB_SERVER', 'dazzzlefznema.mysql.db');
define('DB_USERNAME', 'dazzzlefznema');
define('DB_PASSWORD', 'Jordan77');
define('DB_DATABASE', 'dazzzlefznema');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>
