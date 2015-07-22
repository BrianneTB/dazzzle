<?php 

     //----------------------------------------------- 
     //DECLARE LES VARIABLES 
     //----------------------------------------------- 
	
	 $expediteur = 'contact@dazzzle.fr'; 
     $sujet = 'Inscription - dazZzle.fr';
	 
     $destinataire= $_POST['email'];
     $message_texte='Bonjour. '.$destinataire.'.'; 

     $message_html='<html> 
     <head> 
     <title>Message provenant du site www.dazZzle.fr</title> 
     </head> 
     <body>
     	<p>Bonjour.</p>
     	
     	<p>'.$expediteur.'vous a envoyé un message :</p>
     	
     	<p>Nous vous confirmons votre inscription sur dazZzle.fr. Bon courage à vous pour faire votre veille</p>
     	
     	<p>Adresse de réponse : '.$expediteur.'</p>
     	
     </body> 
     </html>'; 

     //----------------------------------------------- 
     //GENERE LA FRONTIERE DU MAIL ENTRE TEXTE ET HTML 
     //----------------------------------------------- 

     $frontiere = '-----=' . md5(uniqid(mt_rand())); 

     //----------------------------------------------- 
     //HEADERS DU MAIL 
     //----------------------------------------------- 

     $headers = 'From: "Nom" <'.$email_expediteur.'>'."\n"; 
     $headers .= 'Return-Path: <'.$email_expediteur.'>'."\n"; 
     $headers .= 'MIME-Version: 1.0'."\n"; 
     $headers .= 'Content-Type: multipart/mixed; boundary="'.$frontiere.'"'; 

     //----------------------------------------------- 
     //MESSAGE TEXTE 
     //----------------------------------------------- 
     $message = 'This is a multi-part message in MIME format.'."\n\n"; 

     $message .= '--'.$frontiere."\n"; 
     $message .= 'Content-Type: text/plain; charset="iso-8859-1"'."\n"; 
     $message .= 'Content-Transfer-Encoding: 8bit'."\n\n"; 
     $message .= $message_texte."\n\n"; 

     //----------------------------------------------- 
     //MESSAGE HTML 
     //----------------------------------------------- 
     $message .= '--'.$frontiere."\n"; 

     $message .= 'Content-Type: text/html; charset="iso-8859-1"'."\n"; 
     $message .= 'Content-Transfer-Encoding: 8bit'."\n\n"; 
     $message .= $message_html."\n\n"; 

     $message .= '--'.$frontiere."\n"; 

?>