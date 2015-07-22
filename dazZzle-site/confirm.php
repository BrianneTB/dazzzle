<?php

$user_id = $_GET['id'];
$token = $_GET['token'];
require 'includes/config.php'
$req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
$req->execute([$user_id]);
$user = $req->fetch();
session_start();

if($user && $user->confirmation_token == $token){

	$bdd->prepare('UPDATE user SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
	$_SESSION['auth'] = $user;
	header('Location: home.php');
	
}else{
	$_SESSION['flash']['danger'] = "Ce lien de validation n'est plus valide"
	header('Location: index.php');
}

?>