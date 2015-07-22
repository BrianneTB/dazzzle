<?php
	session_start();
	include('includes/config.php');
	
	//on verifie que l'utilisateur est connecté
	if(empty($_SESSION)){
		header('Location: index.php');
	}

	$page = 'article.php';
	
	//on crée une requête qui va chercher tous les article validés
	$requete_article = $bdd->prepare('SELECT * FROM article');

	//on éxécute la requête
	$requete_article->execute();
 
?>
		
		<?php include('includes/header.php'); ?>
						

		<section>

			<h2>Les articles</h2>
			<a href="addArticle.php">Ajouter un article</a>

			<div>

				<table>
				

					<?php

					//on lit tous les résultats (tant qu'il y en a)
					while($donnee_article = $requete_article->fetch()){
					?>

						<tr>
							<td><?php
								//si la case cover n'est pas vide, ni null
								if(!empty($donnee_article['image']) && $donnee_article['image'] != ''){
									//on affiche l'image
									echo '<img id="image" src="../admin/'.$donnee_article['image'].'" />';

								}

								?></td>
							<td><?php echo $donnee_article['titre']; ?></td>
							<td><?php echo $donnee_article['site']; ?></td>
							<td><?php echo $donnee_article['auteur']; ?></td>
							<td><?php echo $donnee_article['date']; ?></td>
							<td><?php echo $donnee_article['texte1']; ?></td>
							<td><?php
								//si la case cover n'est pas vide, ni null
								if(!empty($donnee_article['image2']) && $donnee_article['image2'] != ''){
									//on affiche l'image
									echo '<img id="image2" src="../admin/'.$donnee_article['image2'].'" />';

								}

								?></td>
							<td><?php echo $donnee_article['texte2']; ?></td>
							<td><?php echo $donnee_article['original']; ?></td>

							<?php

							//si l'utilisateur est connecte
							if(!empty($_SESSION)){

							//on ajoute une case avec le lien de mofification
							?><td>
								<a href="deleteArticle.php?id=<?php echo $donnee_article['id']; ?>" class="confirm">Supprimer</a>
							</td>

							<?php }	?>
						</tr>

					<?php } ?>

				</table>
			</div>

		</section>


		<?php include('includes/footer.php'); ?>
