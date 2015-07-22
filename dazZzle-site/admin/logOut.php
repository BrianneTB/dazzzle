<?php

	//inclu les reglages
	include('includes/config.php');

	//on vide les donnees de session  
	$_SESSION['id'] = null;
	$_SESSION['pseudo'] = null;

	//on detruit la session
	session_destroy();

	//on redirige vers la page d'accueil
	header('Location: index.php');


?>