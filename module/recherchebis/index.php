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

		
		
		$controleur->add($_SESSION['id_user'],$_POST['prix'],$_POST['adresse'],$_POST['codePostal'],$_POST['ville'],$_POST['type'],$_POST['description'],$_POST['pmr'],null);	
		echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";

			
			/*echo "<script type='text/javascript'>document.location.replace('index.php');</script>";*/
		break;

		case'form_avancee':
		
			$controleur->form_rechercheAv();
			
		break;

		case'afficherUnePlace':
		
			$controleur->afficherUnePlace($_GET["id"]);
			
		break;

		case'addCommentaire':
			$idPlace=$_GET["idPlace"];
			$controleur->addCommentaire($idPlace,$_POST["commentaire"]);
			echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche&action=afficherUnePlace&id=$idPlace');</script>";
			
		break;

		case 'avancee':
			
/*			if (!isset($_POST["ville"])||!isset($_POST["codepostal"])) {
			
				echo "<script type='text/javascript'>document.location.replace('recherche.php?action=form_avancee');</script>";
			
			}// on redirige si les post ont échoué ou si les deux champs sont vides

			if (empty($_POST["ville"])&& empty($_POST["codepostal"])) {

				echo "<script type='text/javascript'>document.location.replace('recherche.php?action=form_avancee');</script>";
			
			}else if(!empty($_POST["ville"])&&empty($_POST["codepostal"])){
			
				$controleur->rechercheAv2("ville",$_POST["ville"]);
			
			}else if(empty($_POST["ville"])&&!empty($_POST["codepostal"])){
			
				$controleur->rechercheAv2("code_postal",$_POST["codepostal"]);
			
			}else{
			
				$controleur->rechercheAv2("code_postal",$_POST["codepostal"],"ville",$_POST["ville"]);
			
			}*/
			$controleur->rechercheAv2($_POST["prix"],$_POST["adresse"], $_POST["codePostal"], $_POST["ville"], $_POST["type"],
				$_POST["pmr"]);
			
		break;
		case'suppPlace':
			$controleur->suppPlace($_GET["id"]);
			echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";
	
		break;
		case'suppCommentaire':
			$controleur->suppCommentaire($_GET["id"]);
			$idPlace=$_GET["idPlace"];
			echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche&action=afficherUnePlace&id=$idPlace');</script>";
			
	
		break;
		case'louer':
			$controleur->louer($_GET["id"],$_POST["debut"],$_POST["fin"]);
			/*echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";*/
	
		break;

		case'signalerPlace':
			$controleur->signalerPlace($_GET["id"]);
			echo "<script type='text/javascript'>document.location.replace('index.php?page=recherche');</script>";
	
		break;



			
	}
}else{
	echo"Veuillez vous connecter ou vous inscrire";
}
?>
