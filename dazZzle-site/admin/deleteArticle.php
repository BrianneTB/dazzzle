<?php

	//on inclut les settings
	include('includes/config.php');

	//on verifie que l'utilisateur est connecté
	if(empty($_SESSION)){
		header('Location: index.php');
	}

	//on cree une requete pour supprimer le livre
	$requete = $bdd->prepare('DELETE FROM article WHERE id= :num');

	//on execute la requete en parametrant la ligne du ligne du livre qu'il faut supprimer
	$requete->execute(array(
		'num'=> $_GET['id']

	));

	//on redirige sur la page d'accueil
	header('Location: article.php');
	

?>