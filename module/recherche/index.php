<?php

	require_once('controleur.php');
	
if(isset($_SESSION['id_user'])){
	$controleur = new ControleurRecherche();
	if(isset($_GET["action"]))
	        $action = htmlspecialchars($_GET["action"]);
	    else
	        $action="accueil";
	 
	$controleur->verification_louer();

	switch($action) {
		case'accueil':
			$controleur->accueil();
	
		break;

		case'formulaire':
			$controleur->formulaire();
	
		break;

		case'add':
		
		$controleur->add($_SESSION['id_user'],htmlspecialchars($_POST['prix']),htmlspecialchars($_POST['adresse']),htmlspecialchars($_POST['codePostal']),htmlspecialchars($_POST['ville']),htmlspecialchars($_POST['type']),htmlspecialchars($_POST['description']),htmlspecialchars($_POST['pmr']),null);	
		echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";
	
		break;

		case'form_avancee':
		
			$controleur->form_rechercheAv();
			
		break;

		case'afficherUnePlace':
		
			$controleur->afficherUnePlace(htmlspecialchars($_GET["id"]));
			//include('module/etoile/fancy.php');
			
		break;

		case'addCommentaire':
			$idPlace=$_GET["idPlace"];
			$controleur->addCommentaire($idPlace,htmlspecialchars($_POST["commentaire"]));
			echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche&action=afficherUnePlace&id=$idPlace');</script>";
			
		break;

		case 'avancee':
			

			$controleur->rechercheAv2(htmlspecialchars($_POST["prix"]),htmlspecialchars($_POST["adresse"]), htmlspecialchars($_POST["codePostal"]),htmlspecialchars( $_POST["ville"]), htmlspecialchars($_POST["type"]),
				htmlspecialchars($_POST["pmr"]));
			
		break;
		case'suppPlace':
			$controleur->suppPlace(htmlspecialchars($_GET["id"]));
			echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";
	
		break;
		case'suppCommentaire':
			$controleur->suppCommentaire(htmlspecialchars($_GET["id"]));
			$idPlace=$_GET["idPlace"];
			echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche&action=afficherUnePlace&id=$idPlace');</script>";
			
	
		break;
		case'louer':
			$controleur->louer($_GET["id"],htmlspecialchars($_POST["debut"]),htmlspecialchars($_POST["fin"]));
			/*echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";*/
	
		break;

		case'validerLocation':

			$controleur->validerLocation(htmlspecialchars($_GET["idPlace"]),htmlspecialchars($_GET["dateDebut"]),htmlspecialchars($_GET["dateFin"]),htmlspecialchars($_GET["jours"]),htmlspecialchars($_GET["prix"]));
			/*echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";*/
	
		break;

		case'signalerPlace':
			$controleur->signalerPlace(htmlspecialchars($_GET["id"]));
			echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";
	
		break;

		case'modifierNote':
			$controleur->modifierNote(htmlspecialchars($_GET["id"]),htmlspecialchars($_GET["note1"]));
			
			//$controleur->afficherUnePlace(htmlspecialchars($_GET["id"]));
			//echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";
	
		break;


			
	}
}else{
	include('module/fancy/fancy.php');	
}
?>
