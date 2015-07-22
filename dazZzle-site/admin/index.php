<?php
	include('includes/config.php');

	$page = 'index.php';

	//si on a reçu un formulaire
	if(!empty($_POST)){

		//on cree un message d'erreur vide
		$erreur = '';

		//on vérifie que les donnees sont valides, et sinon on cree un message d'erreur
		if(empty($_POST['pseudo'])){
			$erreur = $erreur.'HE ! Le pseudo est vide ! ';
			//identique a 
			//$erreur .= 'Hé ! Le pseudo est vide !';
		}
		if(empty($_POST['password'])){
			$erreur .= 'EH ! Le mot de passe est vide !';
		}

		//si les donnees sont valides, on vefirie l'existence du pseudo et on recupere son mdp
		if($erreur == ''){

		// on fait une requete pour recuperer le pseudo et le mdp correspondant au pseudo saisi
		$requete = $bdd->prepare('SELECT * FROM admin WHERE pseudo= :pseudo');

		$requete->execute(array(
			'pseudo' => $_POST['pseudo']
			));

		//si le pseudo n'existe pas
		if($requete->rowCount() == 0){

		//on affiche un msg d'erreur
		$erreur .= 'NON NON ! Il n\'y a aucun utilisateur avec ce pseudo !';

		//si le pseudo existe
		}else{

		//on crypte le mdp donne par l'utilisateur 
		$passCrypte = crypte($_POST['password']);

		//on lit le resultat de la requete
		$donnee = $requete->fetch();

		//on vérifie que le mdp saisi correspond au mdp du pseudo
		if($passCrypte == $donnee['password']){

		//on se connecte
			$_SESSION['id'] = $donnee['id'];
			$_SESSION['pseudo'] = $donnee['pseudo'];

		//on redirige vers la page d'accueil
		header('Location: index.php');

		//sinon on affiche un msg d'erreur
		}else{
			$erreur .= 'NON NON! Le mot de passe ne correspond pas au pseudo ! ';
		}

		//fin du test pseudo existe
		}

		//fin du test des donnes valides
		}

		
	//fin du traitement
	}

?>

		<?php include('includes/header.php'); ?>

		<section>
		
			<div>
				<?php 
				//on verifie que l'utilisateur n'est pas deja connecte, si oui, on le redirige vers l'accueil
				if(!empty($_SESSION)){
					echo '<h3>Bienvenue '.$_SESSION['pseudo'].' !</h3>';
					echo '<h3>Vous pouvez maintenant modifier les informations du site dazZzle !</h3>';?>

					<a href="addAdmin.php">Créez un nouveau compte</a>
				<?php }else{

				?>


					<h1><?php echo 'Connectez vous'?></h1>

					<form method="POST" action="index.php">

						<?php

						//si il existe un msg d'erreur et qu'il n'est pas vide
						if(isset($erreur) && $erreur != ''){

							echo messageErreur($erreur);

						}

						?>

						<input class="home" type="text" name="pseudo" placeholder="Votre pseudo" value="<?php 
						//si on a deja recu un formulaire
						if(!empty($_POST)){
							
							echo $_POST['pseudo'];
						}
						?>"
						/>
						<input class="home" type="password" name="password" placeholder="Votre mot de passe" />
						<input type="submit" value="Se connecter" />

					</form>


				<?php } ?>
				
			</div>

		</section>

		<?php include('includes/footer.php'); ?>
