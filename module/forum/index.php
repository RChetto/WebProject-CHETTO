<?php

	require_once('controleur.php');
	
if(isset($_SESSION['id_user'])){
	$controleur = new ControleurForum();
	if(isset($_GET["action"]))
	        $action = htmlspecialchars($_GET["action"]);
	    else
	        $action="liste";
	    if(isset($_GET["id"])){
	        $id = htmlspecialchars($_GET["id"]);
	    }

	switch($action) {

		case'Rechrche':
		
			$controleur->recherche(htmlspecialchars($_POST['recherche']));
			
		break;

		case'liste':
		
			$controleur->afficherSujets();
			
		break;

		case'msg':
		
			$controleur->afficherLesMsg($id);
			
		break;
	
		case'ajoutsujet':
			$controleur->formulaireAjoutSujet();
			break;

		case'repondre':
			$controleur->addMessage( htmlspecialchars($_POST['idSujet']) ,htmlspecialchars($_SESSION['id_user'] ), htmlspecialchars($_POST['reponse'] ));
			$idsujet=$_POST['idSujet'];
			echo "<script type='text/javascript'>document.location.replace('index.php?page=forum&action=msg&id=$idsujet');</script>";
		break;	
		
		case'addSujet':
		
			$controleur-> addSujet(htmlspecialchars($_POST['sujet'] ),htmlspecialchars($_POST['description']),htmlspecialchars($_SESSION['id_user']));
			echo "<script type='text/javascript'>document.location.replace('index.php?page=forum');</script>";
		break;	

		case'SuppMsg':

			$id=$_GET['id'];
			$idSujet=$_GET['idSujet'];
			
			$controleur->supprimerMessage($id);
			echo "<script type='text/javascript'>document.location.replace('index.php?page=forum&action=msg&id=$idSujet');</script>";
		break;	
		
		case'SuppSujet':
			$controleur-> supprimerSujet(htmlspecialchars($_GET['id']));
			echo "<script type='text/javascript'>document.location.replace('index.php?page=forum');</script>";
		break;	

		case'signalerForum':
			$controleur->signalerForum(htmlspecialchars($_GET["id"]));
			echo "<script type='text/javascript'>document.location.replace('index.php?page=forum');</script>";
	
		break;	
	}
}else{
		
		include('module/fancy/fancy.php');	   

		   }


?>