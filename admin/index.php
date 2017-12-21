<?php

	require_once('controleur.php');
	
if(isset($_SESSION['role'])=='admin'){
	$controleur = new ControleurAdmin();
	
	if(isset($_GET["action"]))
	        $action = htmlspecialchars($_GET["action"]);
	    else
	        $action="liste";
	    if(isset($_GET["id"])){
	        $id = htmlspecialchars($_GET["id"]);
	    }

	switch($action) {

		case'liste':
		
			$controleur->afficherUtilisateurs();
			
		break;

		case'Utilisateur':
		
			$controleur->afficherUtilisateur($id);
			
		break;

		case'SuppUtilisateur':
			
			$controleur->supprimerUtilisateur(htmlspecialchars($_POST['id']));
			
			echo "<script type='text/javascript'>document.location.replace('index.php?page=admin');</script>";
		break;

		case'forumSignaler':
			
			$controleur->afficherforumSignaler();
			
		break;	

		case'placeSignaler':
			
			$controleur->afficherplaceSignaler();
			
		break;	
		case'profilSignaler':
			
			$controleur->afficherprofilSignaler();
			
		break;	

		case'EnleverSignalePlace':
			
			$controleur->supprimerSignalerPlace(htmlspecialchars($_GET["id"]));
			
		break;	
		case'EnleverSignaleForum':
			
			$controleur->supprimerSignalerForum(htmlspecialchars($_GET["id"]));
			
		break;
		case'EnleverSignaleProfil':
			
			$controleur->supprimerSignalerProfil(htmlspecialchars($_GET["id"]));
			
		break;

		/*case'SuppSujet':
			$controleur-> supprimerSujet($_GET['id']);
			echo "<script type='text/javascript'>document.location.replace('index.php?page=forum');</script>";
		break;	*/
		
	}
}else{
	echo"Veuillez vous connecter ou vous inscrire";
}







?>