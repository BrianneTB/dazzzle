<?php

	session_start();
	
    $title = " Compte | dazZzle";
    $description = "Espace compte utilisateur dazZzle";
    
    include('includes/header-user.php');
    
?>
	
	<?php 
	//on verifie que l'utilisateur n'est pas deja connecte, si oui, on le redirige vers l'accueil
	if(!empty($_SESSION)){
	
	?>
		<section id="compte" style="text-align:left;padding-left:2em;padding-right:2em">
			<h2>Compte</h2>
			<ul>
				<li><a href="profil.php">Profil<i class="mdi mdi-chevron-right pull-right"></i></a></li>
				<li><a href="mdp.php">Mot de passe<i class="mdi mdi-chevron-right pull-right"></i></a></li>
				<li><a href="deconnexion.php">Deconnexion<i class="mdi mdi-chevron-right pull-right"></i></a></li>
			</ul>
			
			<h2 style="margin-top:2em">Paramètre de veille</h2>
			<ul>
				<li><a href="theme.php">Thèmes<i class="mdi mdi-chevron-right pull-right"></i></a></li>
				<li><a href="heure.php">Heures<i class="mdi mdi-chevron-right pull-right"></i></a></li>
				<li><a href="notif.php">Notifications<i class="mdi mdi-chevron-right pull-right"></i></a></li>
			</ul>
		</section>
		
		
		<?php }else{
		
		//on le redirige vers la page d'accueil
		header('Location: index.php');
	}


    include('includes/footer-user.php');

?>