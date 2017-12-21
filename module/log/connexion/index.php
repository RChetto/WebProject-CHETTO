<?php
	require_once('controleur.php');
	

if(empty($_GET['action'])){
	$action="formulaire";
}
else{	
	$action= htmlspecialchars($_GET['action']);
}
$controleur = new ControleurConnexion();
switch($action) {
	
	
		case'connection':
			$controleur->logControleur(htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['password']));


		break;	
		
		case'formulaire':
			if(!isset($_SESSION['id_user']))
				$controleur->formulaireControleur();
			else
				echo " Vous etes deja connecter ";
	
			
		break;
	
	
	case'deConnection':
		$controleur->deLogControleur();

	break;	
	
	
	
	
}









?>