<?php

//créer une connexion a la bdd
$host = 'mysql:dbname=dazzzlefznema;host=dazzzlefznema.mysql.db;charset=UTF8';
$user = 'dazzzlefznema';
$pass = 'Jordan77';

try{
	$bdd = new PDO($host, $user, $pass);

}catch(PDOException $e){

	echo 'FATAL ERROR ! :' .$e->getMessage();
}

// on charge obligatoirement le fichier des fonctions
require_once('functions.php');

?>