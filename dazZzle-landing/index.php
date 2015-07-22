<?php 

include('./inc/head2.php');

?>

	<div class="prebase">
		
		<p id="big">Alors jeune <span id="color">prépubard</span>,</p>
		<p>tu crois franchement que pour devenir un bon publicitaire il faut s'épuiser à se <span id="bold">cultiver</span> ?</p>
	    <p>Sache que les grands noms ont tous un secret classé zZz :</p>
		
	</div>
	
	<div class="baseline">
		
		<h1><a href="index.php"><img src="image/logo.png" alt="Logo dazZzle" ></a></h1>
	    <h2>La pilule de la veille*</h2>
	    <p class="ancre"><a href="#postbase"><i class="fa fa-chevron-down fa-2x"></i></a></p>
	</div>
	
	<div class="postbase" id="postbase">
		
		<?php
	
			session_start();
			require_once('php/config.php');
								 
								
			$email = 'email'; // email 
								
			// insertion de la news dans sa table: 
			if(isset($_POST['submit']))
			{
			$req=$mysql->prepare("INSERT INTO newsletter (email) VALUES (:email)"); 
			$insert = $req->execute(array('email'=>htmlspecialchars($_POST['email']))) or die(print_r($requete->errorInfo()));
			foreach($_POST as $email)
			{
				if(empty($email)){
					$errorInput='tous les champs sont obligatoires';	
				}
			}
			if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])){
				$errorInput='champ email invalide';
			}
									
								
			}
			echo '<p class="maux">Aux grands maux les grands remèdes, dazZzle te livre chaque jour </br> la veille adaptée à tes ambitions :</p>';
			echo '<form id="newsletter" method="POST" action="index.php">';
			echo '<input type="email" placeholder="Ton email, bien évidemment !" value="" name="email">';
			echo '<button class="btn btn-1 btn-1e" type="submit" name="submit" value=""> Réserver mon traitement</button>';
								 
			echo '</form>';
			echo '<p class="etoile">*Comprimé à prise digitale, respecter la notice, ne pas utiliser chez les publicitaires sans ambition</p>';
		?>
		
		<!--
		<div id="compteur">
			<div id="left" class="progress" style="width:300px; height: 150px;background-color:#3c3c3b;text-align:center">
			    <div class="progress2" style="width:150px; height: 150px; background-color:#00e1aa;"></div>
			</div>
			<div id="right">
				<h2>Tiens toi prêt !</h2>
				<p>2%</p>
			</div>
		</div>
		-->
	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" /></script>
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#load').hide();
			  
				$('#form1').submit(function() {
			        $('[name="sub"]').hide();
			        $('#load').show();
			    return false;
			    	
			    });
			   
			 });
			
		</script>
		 
		 
		<p id="soon">T'inquiète pas, on sera bientôt là,</p>
		<form id="form1" method="post" action="">
		<input type="submit" name="sub" value="Entraîne-toi !" />
		<img src="image/loader.gif" alt="En attendant entraîne-toi !" id="load" />
		</form>
		
	</div>

<?php 

include('./inc/footer3.php');

?>