<?php

//démarrer la session d'utilisateur
session_start();

//créer une connexion a la bdd
$host = 'mysql:dbname=ecklecktic;host=localhost;charset=UTF8';
$user = 'root';
$pass = 'root';

try{
	$bdd = new PDO($host, $user, $pass);

}catch(PDOException $e){

	echo 'FATAL ERROR ! :' .$e->getMessage();
}

// on charge obligatoirement le fichier des fonctions
require_once('functions.php');

?>

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