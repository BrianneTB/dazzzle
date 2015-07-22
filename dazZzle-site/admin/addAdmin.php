<?php
	session_start();
	
	include('includes/config.php');

	//si l'utilisateur est déjà connecté 
	if(empty($_SESSION['pseudo'])){

		//on le redirige vers la page d'accueil
		header('Location: index.php');

	//fin du test
	}
	
	//on debut la variable $_POST
	//var_dump(!empty($_POST));

	//si on a reçu un formulaire
	if(!empty($_POST)){

		//on crée un message d'erreur vide
		$erreur = '';
		
		//on vérifie que les données sont valides, et sinon, on crée le message d'erreur correspondant
		if(empty($_POST['pseudo'])){
			$erreur = $erreur.'EH ! Le pseudo est vide ! ';
		
		//sinon
		}else{

			//on vérifie que le pseudo n'existe pas déjà dans la base
			//on crée une requête pour récupérer les utilisateurs avec le même pseudo
			$requete2 = $bdd->prepare('SELECT * FROM admin WHERE pseudo= :pseu');

			//on exécute la requête
			$requete2->execute(array(
				'pseu' => $_POST['pseudo']));
			//s'il y a un résultat (ou plus)
			if($requete2->rowCount() > 0){

				//on crée un message d'erreur
				$erreur = $erreur.'FATAL ERROR !! Ce pseudo existe déjà ! ';

			//fin du test
			}

		//fin du test
		}
		
		if(empty($_POST['password'])){
			$erreur = $erreur.'Hé ! Le mot de passe est vide ! ';
		}

		if($_POST['password'] != $_POST['password_confirm']){
			$erreur = $erreur.'Hé, les mots de passes ne sont pas identiques patate !';
		}

		//var_dump($erreur);

			//si on a pas crée de message d'erreur, 
			if($erreur == ''){
			//on enregistre dans la base de données
			$requete = $bdd->prepare('INSERT INTO admin (pseudo, password) VALUES (:pseu, :pass)');

			$requete->execute(array(
				'pseu' => $_POST['pseudo'],
				'pass' => crypte($_POST['password'])
				));
			//on crée la session de l'utilisateur
			$_SESSION['id'] = $bdd->lastInsertId();
			$_SESSION['pseudo'] = $_POST['pseudo'];

			//on le redirige vers la page d'accueil
			header('Location: index.php');

		//fin du test
		}
	//fin du traitement du formulaire
}

?>
		
		<?php include('includes/header.php');?>
        <section>

			<div>

				<h1>Créer un compte</h1>


				<form method="POST" action="addAdmin.php">

					<?php 

						//si il existe un message d'erreur
						if(isset($erreur) && $erreur != ''){

							//on l'affiche
							echo messageErreur($erreur);

						//fin du test
						}
					?>

					<input type="text" name="pseudo" placeholder="Ton petit nom" value="<?php 
					//si on a déjà reçu un formulaire
					if(!empty($_POST)){

					//on affiche le contenu du champ pseudo
					echo $_POST['pseudo'];
					//fin du test 
					}

					?>" />
					
					<input type="password" name="password" placeholder="Mot de passe"/>
					<input type="password" name="password_confirm" placeholder="Confirmer mot de passe"/>
					<br />

					<input type="submit" value="Créer le compte" />

				</form>
				
			</div>

		</section>
    
<?php

    include('includes/footer.php');

?>