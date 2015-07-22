<?php
	include('includes/config.php');
	
	//on verifie que l'utilisateur est connecté
	if(empty($_SESSION)){
		header('Location: index.php');
	}

	//si on a reçu un formulaire
	if(!empty($_POST)){

		//var_dump($_POST);
		//var_dump($_FILES ['image']['size']);

		//on vérifie que les champs obligatoires sont bien remplis
		//print_r($_POST);
		//print_r($_FILES);
		
		$erreur = '';
		if(empty($_POST['titre'])
			|| empty($_POST['site'])
			|| empty($_POST['auteur'])
			|| empty($_POST['date'])
			|| empty($_FILES['image'])
			|| empty($_POST['texte1'])
			|| empty($_FILES['image2'])
			|| empty($_POST['texte2'])
			|| empty($_POST['original'])){
			$erreur .='Les champs obligatoires doivent être complétés !!';
		}
		//var_dump($_POST);

		/* TRAITEMENT DE L'IMG */
		//si on a recu un fichier
		if($_FILES['image']['size'] != 0){

		//on verifie que le formulaire a bien recu le fichier sans erreur, s'il y en a une, on modifie notre variable d'erreur
		if($_FILES['image']['error'] != 0){
			$erreur .='Oupps ! Le fichier a un LEGER soucis ! Essayez-en un autre pour voir !';
		}
		//on cree un tableau des extenbsions autorisees
		$ext = array('jpg', 'jpeg', 'gif', 'png');

		//strrchr = recupere la partie d'une chaine de caractere qui est apres le dernier terme trouve ici derriere le dernier point
		//substr = recupere une sous chaine a partir d'un caractere fixe
		$ext_envoyee = strrchr($_FILES['image']['name'],'.');

		$ext_envoyee = substr($ext_envoyee, 1);

		$ext_envoyee = strtolower($ext_envoyee);

		//on recupere l'extensiion du fichier envoye n'est pas autorisee 
		if(!in_array($ext_envoyee, $ext)){
			//on met a jour les erreurs 
			$erreur .= 'Cette extension n\'est pas autorisée !!';
			}

		/* fin de l'image */ 
		}
		
		/* TRAITEMENT DE L'IMG2 */
		//si on a recu un fichier
		if($_FILES['image2']['size'] != 0){

		//on verifie que le formulaire a bien recu le fichier sans erreur, s'il y en a une, on modifie notre variable d'erreur
		if($_FILES['image2']['error'] != 0){
			$erreur .='Oupps ! Le fichier a un LEGER soucis ! Essayez-en un autre pour voir !';
		}
		//on cree un tableau des extenbsions autorisees
		$ext2 = array('jpg', 'jpeg', 'gif', 'png');

		//strrchr = recupere la partie d'une chaine de caractere qui est apres le dernier terme trouve ici derriere le dernier point
		//substr = recupere une sous chaine a partir d'un caractere fixe
		$ext_envoyee2 = strrchr($_FILES['image2']['name'],'.');

		$ext_envoyee2 = substr($ext_envoyee2, 1);

		$ext_envoyee2 = strtolower($ext_envoyee2);

		//on recupere l'extensiion du fichier envoye n'est pas autorisee 
		if(!in_array($ext_envoyee2, $ext2)){
			//on met a jour les erreurs 
			$erreur .= 'Cette extension n\'est pas autorisée !!';
			}

		/* fin de l'image */ 
		}
		
		
		//s'il n'y a pas d'erreurs
		if($erreur == ''){

			//on initialise le tableau des donnees a mettre dans la base
			$tab = array(
				'titre' =>$_POST['titre'],
				'site' =>$_POST['site'],
				'auteur' =>$_POST['auteur'],
				'date' =>$_POST['date'],
				'texte1' =>$_POST['texte1'],
				'texte2' =>$_POST['texte2'],
				'original' =>$_POST['original']
				);
			
		//on initialise les morceaux de requete a ajouter
		$colums = '';
		$values = '';
		$col_image = '';
		$val_image = '';

		//si on a recu un fichier
		if($_FILES['image']['size'] != 0){

			//on cree le nouveau nom pour notre fichier
			$nom = 'images/'.time().'_1.'.$ext_envoyee;

			//on le deplace sur notre serveur
			move_uploaded_file($_FILES['image']['tmp_name'], $nom);

			//on gere nos variables de requete
			$col_image = ', image';
			$val_image = ', :image';

			$tab['image'] = $nom;
		//fin du test
		}
		
		//on initialise les morceaux de requete a ajouter
		$colums2 = '';
		$values2 = '';
		$col_image2 = '';
		$val_image2 = '';

		//si on a recu un fichier
		if($_FILES['image2']['size'] != 0){

			//on cree le nouveau nom pour notre fichier
			$nom2 = 'images/'.time().'_2.'.$ext_envoyee2;

			//on le deplace sur notre serveur
			move_uploaded_file($_FILES['image2']['tmp_name'], $nom2);

			//on gere nos variables de requete
			$col_image2 = ', image2';
			$val_image2 = ', :image2';

			$tab['image2'] = $nom2;
		//fin du test
		}

			//on cree et execute la requete
			$req_addArticle = $bdd->prepare('INSERT INTO article (titre, site, auteur, date, texte1, texte2, original' .$colums.$col_image.$colums2.$col_image2.') VALUES (:titre, :site, :auteur, :date, :texte1, :texte2, :original'.$values.$val_image.$values2.$val_image2.')');
			
			$req_addArticle->execute($tab);

			//print_r($tab);
			//print_r($colums);
			//var_dump($tab);
			//var_dump($req_addbook);

			//on recharge la page (pour enlever la question lors d'un f5)
			header('Location: addArticle.php?valid');
			}

	//fin du traitement du formulaire
	}

?>		

		<?php include('includes/header.php'); ?>

		<section>

			<div>
				<h1>Ajouter un article</h1>


				<form  action="addArticle.php" method="POST" enctype="multipart/form-data">

					<?php

					//s'il y a un message d'erreur
					if(isset($erreur) && $erreur != ''){

						//on l'affiche
						echo messageErreur($erreur);

					//fin du test
					}

					//s'il y a un message de validation
					if(isset($_GET['valid'])){

						//on l'affiche
						echo messageOk('L\'article a bien été ajouté !');

					//fin du test
					}
					?>


					<input type="text" name="titre" placeholder="Nom de l'article" />
					<br />
					<input type="text" name="site" placeholder="www.site.fr" />
					<br />
					<input type="text" name="auteur" placeholder="Auteur" />
					<br />
					<input type="date" name="date" />
					<br />

					<label for="image">Première image</label>
					<input type="file" name="image" id="image" /> 

					<!-- input cache qui indique la taille maximale du fichier, ici 1Mo -->
					<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
					<br />
					
					<textarea name="texte1" placeholder="Article part 1"></textarea>
					<br />
					
					<label for="image">Deuxième image</label>
					<input type="file" name="image2" id="image2" /> 

					<!-- input cache qui indique la taille maximale du fichier, ici 1Mo -->
					<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
					<br />
					
					<textarea name="texte2" placeholder="Article part 2"></textarea>
					<br />
					
					<input type="text" name="original" placeholder="Lien article www.site.fr" />
					<br />
					
					<input type="submit" value="Ajouter" />

				</form>

			</div>

		</section>

		<?php include('includes/footer.php'); ?>
