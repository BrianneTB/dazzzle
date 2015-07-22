<?php

	//on cree une fonction qui traduit les dates du format US vers le format FR
	function dateUStoFR($us){

		$dateFR = date("d/m/Y" , strtotime($us));

		return $dateFR;
	}

	//on cree une focntion qui crypte, salt, et re-crypte un mot de passe
	function crypte($mot){

		$etape1 = sha1($mot);
		$etape2 = $etape1.'BL';
		$etape3 = sha1($etape2);

		return $etape3;
	}

	//pour gerer les messages d'erreur
	function messageErreur($mess){
		
		return '<p class="error">'.$mess.'</p>';
	}

	function messageOk($mess){
		return '<p class="valid">'.$mess.'</p>';
	}
?>