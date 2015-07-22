<?php
define("SQL_HOST","dazzzlefznema.mysql.db");
define("SQL_USER","dazzzlefznema");
define("SQL_PASS","Jordan77");
define("SQL_DBNAME","dazzzlefznema");

try
{
	$mysql = new PDO("mysql:dbname=".SQL_DBNAME.";host=".SQL_HOST,SQL_USER,SQL_PASS);
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>