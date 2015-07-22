<?php

	if(!empty($_POST) && !empty($_POST['email'])){
		
		require_once 'includes/config.php';
		
		$req = $bdd->prepare('SELECT * FROM user WHERE email = ? AND confirmed_at IS NOT NULL');
		
		$req->execute([$_POST['email']]);
		$user = $req->fetch();
		
		if($user){
			session_start();
			$reset_token = str_random(60);
			$bdd->prepare('UPDATE userSET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token]);
			header('Location: home.php');
			exit();
			
			
		}else{
			$erreur = 'Mot de passe incorrect';
		}
		
		
	}
	

	include('includes/header.php')

?>

		<form action="" method="post">
			
			<input type="email" name="email" placeholder="Email"/>
			<input type="submit" value="Validez" />
			
		</form>

<?php

	include('includes/footer.php')

?>