<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title;?></title>
<meta name="description" xml:lang="fr" content="<?php echo $description;?>">
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="icon" type="image/png" href="ressources/fav.png" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.css">
<script src="js/jquery.js"></script>
<link href='http://fonts.googleapis.com/css?family=Gilda+Display|Cabin' rel='stylesheet' type='text/css'>
<script>
		$(function(){

		//on cree l'event click pour les liens qui ont la classe 'confirm'
		$('.confirm').click(function(){

			//on demande à l'utilisateur s'il confirme la suppression du livre
			var reponse = confirm('Voulez-vous vraiment supprimer cet article ?? Cette action est irréversible !!');

			//s'il ne confirme pas
			if(!reponse){
				//on annule le changement de page
				return false;

			//fin du test
			}
		//fin de l'event
		});
		});

		</script>
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>

	<section id="main">
    
    	<header>
            <div class="clear"></div>
            <h1><a><img src="ressources/logo.png" alt="Logo dazZzle" /></a></h1>
            
            
            <?php

			//si l'utilisateur est connecte
			if(!empty($_SESSION['pseudo'])){

			?>
			<li id="deco"><a href="article.php">Les articles</a></li>
            <li id="deco"><a href="logOut.php">Se déconnecter</a></li>
            
            <?php } ?>
        </header>