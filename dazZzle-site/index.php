<?php
    $title = "dazZzle, la pilule de la veille";
    $description = "Description de ouf de la home";

    include('includes/header-home.php');
    include('includes/config.php');
	
		//si on a reçu un formulaire
	if(!empty($_POST)){

		//on crée un message d'erreur vide
		$erreur = '';
		
		//on vérifie que les données sont valides, et sinon, on crée le message d'erreur correspondant
		if(empty($_POST['agence'])){
			$erreur = $erreur.'EH ! Le nom d\'agence est vide ! ';
		
		//sinon
		}else{

			//on vérifie que le pseudo n'existe pas déjà dans la base
			//on crée une requête pour récupérer les utilisateurs avec le même email
			$requete2 = $bdd->prepare('SELECT * FROM inscription WHERE agence= :agence, email= :email');

			//on exécute la requête
			$requete2->execute(array(				
				'email' => $_POST['email']));
			//s'il y a un résultat (ou plus)
			if($requete2->rowCount() > 0){

				//on crée un message d'erreur
				$erreur = $erreur.'Ce compte existe déjà ! ';

			//fin du test
			}

		//fin du test
		}

		//var_dump($erreur);

			//si on a pas crée de message d'erreur, 
			if($erreur == ''){
			//on enregistre dans la base de données
			$requete = $bdd->prepare('INSERT INTO inscription (agence, email) VALUES (:agence, :email)');

			$requete->execute(array(
				'agence' => $_POST['agence'],
				'email' => $_POST['email']
				));

		//fin du test
		}
	//fin du traitement du formulaire
}

	
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

</script>

	<main>
		<article id="home">
            <h2><span style="font-size:2em" class="bold">Ta veille </span><span style="font-size:1.35em;">personnalisée,</span><br/> <span style="font-size:1.6em;">pour <span class="regular vert">briller </span></span><span style="font-size:1.4em;">sans te fouler.</span></h2>
			<a class="big-btn-green" href="#contact">Cultivez-moi</a>
			<p id="discover">Découvrir dazZzle</p>
			<a href="#secret" class="fleche-bas">
				<i class="mdi mdi-chevron-down"></i>
			</a>
		</article>
        
		<article id="secret">
            <h2 id="secret_title">Sache que les grands <br class="hidden-desktop" />publicitaires ont tous<br/> un secret classé <span class="bold vert">zZz</span> :<br/></h2>
			<h1><a href="index.php"><img class="logo-secret" src="images/logo-baseline.png" alt="Logo dazZzle" ></a></h1>
            <div class="imgsocial"><img src="images/illu-responsive.png" class="hidden-mobile" alt="dazzzle responsive"/><img class="img-main" style="margin-top: 3em;" src="images/main-pilule.png" alt="main + pilule" width="150"/></div>
		</article>
<div id="bloc-gris">
    <h1 class="center hidden-mobile" style="font-family: 'Oswald', sans-serif;margin-top:1em;font-size:4em;font-weight:300">Notice d'utilisation</h1>
    
    
             		<article id="substances" class="hidden-mobile">

                    <div class="mid-width pull-left img-bloc"><img src="images/substances.png" alt="Substances actives" class="substances-img" />
</div>
                    <div class="mid-width pull-right text-bloc">
			<div><h2>Substances actives</h2>
                <p>Une veille professionnelle c’est bien, une veille professionnelle <span class="bold">ET</span> personnalisée c’est mieux !</p>
			<p>Créé ta propre pilule<br/> pour te cultiver suivant tes intérêts.<br/> <span class="bold"><span class="vert">dazZzle</span> s’occupe du reste</span></p>
                </div>
                    </div>
                            <div class="clearfix"></div>

    		</article>

         		<article id="substances" class="hidden-desktop">
                    
			<h2>Substances actives</h2>
			<img class="substances-img" src="images/substances.png" alt="Substances actives"/>
			<p>Créé ta propre pilule<br/> pour te cultiver suivant tes intérêts.<br/> <span class="bold"><span class="vert">dazZzle</span> s’occupe du reste</span></p>
		</article>   
    
    
    <div class="clearfix"></div>

        
    
  		<article id="posologie" class="hidden-mobile">
<div class="mid-width pull-left img-bloc">
<img src="images/img-posologie.png" width="450" alt="1 pilule par jour pendant 2 heures" />
            </div>
            <div class="mid-width pull-right text-bloc">
                <div>

            <h2>Posologie</h2>
                    <p><span class="bold vert">dazZzle</span> t’offre ta pilule <span class="bold">chaque jour</span> pendant <span class="bold">deux heures</span> pour visionner un nombre illimité d’articles. </p>
            <p>Après il faudra quand même te bouger<br/>pour mettre tes idées sur papier !</p>
                </div>
            </div>
		</article>  
    

    
    		<article id="posologie" class="hidden-desktop">
			<h2>Posologie</h2>
<img src="images/img-posologie.png" width="300" style="margin-top:2em;" alt="1 pilule par jour pendant 2 heures" />

			<p style="margin-top:2em;">Après il faudra quand même te bouger<br/>pour mettre tes idées sur papier !</p>
		</article>
    
    
    
                            <div class="clearfix"></div>
             
		<article id="action" class="hidden-mobile">
            <div class="mid-width pull-left img-bloc">
            <img src="images/pubard.png" class="img-pubard" alt="pubard dazZzle" />

            </div>
            
            <div class="mid-width pull-right text-bloc">
                <div>
            <h2>Action</h2>
			<p><span class="bold">Rien de plus simple :</span> à droite tu gardes, à gauche tu passes. </p>
                    <p>Tu peux même partager les articles qui t’intéressent.</p>
            <p><span class="bold">1 comprimé par jour</span> réduira visiblement<br class="hidden-mobile" /> les signes de ton manque de culture<br class="hidden-mobile" />et t’aidera à trouver <span class="bold">LA</span> bonne idée.</p>
            </div>
                </div>
			
            
		</article>
    
    		<article id="action" class="hidden-desktop">
			<h2>Action</h2>
			<p><span class="bold vert">dazZzle</span>, c’est pour ton bien.</p>
			<img class="img-pubard" src="images/pubard.png" alt="pubard dazZzle" />
            <p><span class="bold">1 comprimé par jour</span> réduira visiblement<br/> les signes de ton manque de culture<br/>et t’aidera à trouver <span class="bold">LA</span> bonne idée.</p>
		</article>
    
                            <div class="clearfix"></div>
                            
        <article id="voie" class="hidden-mobile">
        <div class="mid-width pull-left img-bloc">
            <div class="notif-bloc">
                <div id="voie-admin">
                <div class="pull-left mid-width">
                    <i class="mdi mdi-email"></i>
                    <p>Mail</p>
                </div>
                <div class="pull-right mid-width">
                    <i class="mdi mdi-message-text"></i>
                    <p>Notification</p>
                </div>
                <div class="clearfix"></div>
            </div>
            </div>
        </div>
        
        <div class="mid-width pull-right text-bloc">
            <div>			
                <h2>Voie d'administration</h2>
            <p style="margin-top:3em"><span style="font-weight:400">Chaque matin,</span><br/><span style="font-weight:700">ta veille vient te chercher.</span></p>
                <p style="font-style:italic;">On te laisse le choix de la notification<br/> pour faire passer la pilule en douceur</p>
            </div>
        </div>


            
			
		</article>
    
    
    
    <article id="voie" class="hidden-desktop">
			<h2>Voie d'administration</h2>
            <p style="margin-top:3em"><span style="font-weight:400">Chaque matin,</span><br/><span style="font-weight:700">ta veille vient te chercher.</span></p>
            <div id="voie-admin">
                <div class="pull-left mid-width">
                    <i class="mdi mdi-email"></i>
                    <p>Mail</p>
                </div>
                <div class="pull-right mid-width">
                    <i class="mdi mdi-message-text"></i>
                    <p>Notification</p>
                </div>
                <div class="clearfix"></div>
            </div>
			<p style="font-style:italic;margin-top: 4.5em;">On te laisse le choix<br/> pour faire passer la pilule en douceur</p>
		</article>
                            <div class="clearfix"></div>
    
    
        
        
		<article id="effets" class="hidden-mobile">
            <div class="mid-width pull-left img-bloc"><img src="images/warning.png" class="warning-img" alt="Attention, Effets secondaires !" />
			</div>
            <div class="mid-width pull-right text-bloc">
                <div>			
                    <h2>Effets secondaires</h2> 
                    <p style="font-family: 'Oswald', sans-serif;text-transform:uppercase;font-size:2.5em" class="bold">Attention !</p>
                    <p>Risques de gonflement des chevilles<br/>et de montée en grade express !</p>

                </div>
            </div>

			

		</article>
    
    
        
		<article id="effets" class="hidden-desktop">
			<h2>Effets secondaires</h2>
			<img  class="warning-img" src="images/warning.png" alt="Attention, Effets secondaires !" />
			<p style="font-family: 'Oswald', sans-serif;text-transform:uppercase;font-size:1.5em" class="bold">Attention !</p>
            <p>Risques de gonflement des chevilles<br/>et de montée en grade express !</p>
		</article>
    
                                <div class="clearfix"></div>
        <a href="#contact"><button type="" name="" value="" class="big-btn-green hidden-mobile" style="padding-left:1em;padding-right:1em;margin-top:3em;cursor:pointer" >L’essayer pour l’adopter</button></a>
        
        
        <article id="contact">
			<h2>Commencer le traitement</h2>
			<p>Prendre dazZzle, ça se mérite !</p>
			<p style="padding-bottom:1em;">Demande ton invitation pour accéder à l'application, on va vérifier ton ordonnance</p>
            <div class="wrap">
			<form method="post" action="./index.php">
                <div class="input-grp">
				<input type="text" name="agence" id="agence" placeholder="Ton agence" /><br/>
				<input type="email" name="email" id="email" placeholder="E-mail" /><br/>
                <!--<input type="textarea" style="height:5em" name="message" id="message" placeholder="Merci dazZzle pour ..." /><br/>-->
                    </div>
				<button type="submit" name="submit" value="Demander ma pilule" class="big-btn-green" style="padding-left:1em;padding-right:1em;margin-top:0px;" ><i class="mdi mdi-send"></i> Demander ma pilule</button>
			</form>
                </div>
		</article>
		<div class="clearfix"></div>
        
        </div>
        
		<article id="prescription">
			<h2 class="hidden-desktop">Prescription</h2>
			<img src="images/quote-top.png" class="quote-top" alt="quote top" />
				<p class="light thanks">Merci dazZzle. <img src="images/pill.png" class="pill-img" alt="piule logo mini" /> </p>
				<p class="italic" style="color:#666">Envoyé depuis mon jacuzZzi</p>
				<p class="italic bold">J.S.</p>
<img class="quote-bottom" src="images/quote-bottom.png" width="100" alt="quote bottom" />
        </article>
        
        
<div class="footer-gris mid-width pull-left">
        
        </div>
	</main>

<?php

    include('includes/footer-home.php');

?>