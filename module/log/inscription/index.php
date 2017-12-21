<?php
	require_once('controleur.php');
	

if(empty($_GET['action'])){
	$action="formulaire";
}
else{	
	$action= htmlspecialchars($_GET['action']);
}
$controleur = new ControleurInscription();
switch($action) {
	
	case'inscription':

		$controleur->logControleur(htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['prenom']),htmlspecialchars($_POST['mail']),htmlspecialchars($_POST['adresse']),htmlspecialchars($_POST['tel']),htmlspecialchars($_POST['login']),htmlspecialchars($_POST['pass']),htmlspecialchars($_POST['pass_confirm']));
		

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