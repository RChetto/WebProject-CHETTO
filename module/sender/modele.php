<?php

	require_once(dirname(__FILE__) . "/../params_connexion.php");


Class ModeleSender extends ParamsDB{
	protected $connexion;
	
	public function __construct(){
			$this->connexion = new PDO(self::$dns,self::$user);
		
	}
	
	public function envoyer($destinataire,$objet,$message ){
		
		$expediteur = "yassine.daghoui@gmail.com";
		$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
		$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
		$headers .= 'From: "Nom_de_expediteur"<'.$expediteur.'>'."\n"; // Expediteur
		$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire     
		
		/*echo " $expediteur <br>";*/
		echo "$objet <br>";
		echo "$message <br>";
		echo "$headers <br>";

		ini_set("SMTP","smtp.bouygtel.fr");


		if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
		{
		    echo 'Votre message a bien été envoyé ';
		}
		else // Non envoyé
		{
		    echo "Votre message n'a pas pu être envoyé";
		}
	}
}


?>	