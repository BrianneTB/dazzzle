<?php
	
    $title = "Veille | dazZzle";
    $description = "La dose de veille quotidienne";
    
    include('includes/config.php');
    
    $page = 'home.php';
    
		//on crée une requête qui va chercher tous les article validés
		
		$req_veille = $bdd->prepare('SELECT * FROM article');
	
		//on éxécute la requête
		$req_veille->execute();


	include('includes/header-user.php'); 
?>
    	
		<section id="contenu">
			
				<p style="text-align:left;font-weight:300">Salut jeune prépubard, si tu suis bien ta veille quotidienne, tu auras accès très prochainement à de <span class="vert">nouvelles fonctionnalités</span> Tu peux déjà en avoir un avant goût <span class="bold">(dans ta barre de menu !)</span></p>
            
            
            	<div id="owl-demo" class="owl-carousel">

					<?php

					//on lit tous les résultats (tant qu'il y en a)	
					while($donnees_veille = $req_veille->fetch()){
					?>
					

							
							<div>
								<div>
									<div class="avatar">
							
										<?php if(!empty($donnees_veille['image']) && $donnees_veille['image'] != ''){
										//on affiche l'image
											echo '<img id="image" src="./admin/'.$donnees_veille['image'].'" />';
	
										}?>
							
									</div>
									<div class="info">
									<h3><?php echo $donnees_veille['titre'];?></h3>
									<p><?php echo $donnees_veille['site'];?></p>
									<p><?php echo $donnees_veille['auteur'];?></p>
									<p><?php echo $donnees_veille['date'];?></p>
									<p><?php echo $donnees_veille['texte1'];?></p>
									
									</div>
									<div class="avatar">
							
										<?php if(!empty($donnees_veille['image2']) && $donnees_veille['image2'] != ''){
										//on affiche l'image
											echo '<img id="image" src="./admin/'.$donnees_veille['image2'].'" />';
	
										}?>
							
									</div>
									<div class="info">
									<h3><?php echo $donnees_veille['texte2'];?></h3>
									<p><?php echo $donnees_veille['origine'];?></p>
									</div>
								</div>
								
							</div>


					<?php } 
						
					?>
					</div>
			            
        </section>
        
        <script>
        
	        $(document).ready(function() {
 
			  $("#owl-demo").owlCarousel({
			    autoPlay : 3000,
			    stopOnHover : true,
			    navigation:true,
			    paginationSpeed : 1000,
			    goToFirstSpeed : 2000,
			    singleItem : true,
			    autoHeight : true,
			    transitionStyle:"fade"
			  });
			 
			});
			
        </script>

<?php

include('includes/footer-user.php');
?>