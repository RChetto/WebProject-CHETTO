<?php

	require_once('controleur.php');
	
if(isset($_SESSION['id_user'])){
	$controleur = new ControleurMessagerie();
	if(isset($_GET["action"]))
	        $action = htmlspecialchars($_GET["action"]);
	    else
	        $action="messageRecu";

	    $controleur->nav();
	switch($action) {
		case'Rechrche':
		
			$controleur->recherche(htmlspecialchars($_POST['recherche']));
			
		break;

		case'messageRecu':
		
			$controleur->afficherMessagesRecu();
			
		break;



		case'messageEnvoyer':
		
			$controleur->afficherMessagesEnvoyer();
			
		break;

		case'formulaire':
		
			$controleur->formulaire();
			
		break;
		case'supprimer':
		
			$controleur->supprimer(htmlspecialchars($_GET["id"]));
			
		break;

		case'afficherMessage':
		
			$controleur->unMessage(htmlspecialchars($_GET["id"]));
			
		break;
		case'envoyerMessage':
			$controleur->envoyerMessage(htmlspecialchars($_POST['destinataire']),htmlspecialchars($_POST["objet"]),htmlspecialchars($_POST["contenu"]));
			
		break;

	
	}
}else{
	include('module/fancy/fancy.php');	
}







?>