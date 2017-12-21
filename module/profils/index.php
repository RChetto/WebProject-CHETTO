<?php

	require_once('controleur.php');
	
if(isset($_SESSION['id_user'])){
	$controleur = new ControleurProfil();
	if(isset($_GET["action"]))
	        $action = htmlspecialchars($_GET["action"]);
	    else
	        $action="accueil";
	   
	switch($action) {
		case'accueil':
			$controleur->getProfils($_SESSION['id_user']);
	
		break;

		case'recherche':
			$controleur->recherche($_POST['recherche']);
	
		break;
		case'afficherProfils':
			$controleur->getProfils($_GET['id']);
	
		break;


		case'formulaire':
			$controleur->form_modifier($_SESSION['id_user'],$_GET['attribu']);
	
		break;
		case'modifierNom':
			$controleur->modifierNom($_SESSION['id_user'],$_POST['val'],$_POST['password']);
	
		break;
		case'modifierPrenom':
			$controleur->modifierPrenom($_SESSION['id_user'],$_POST['val'],$_POST['password']);
	
		break;
		case'modifierAdresse':
			$controleur->modifierAdresse($_SESSION['id_user'],$_POST['val'],$_POST['password']);
	
		break;
		case'modifierMail':
			$controleur->modifierMail($_SESSION['id_user'],$_POST['val'],$_POST['password']);
	
		break;
		case'modifierTel':
			$controleur->modifierTel($_SESSION['id_user'],$_POST['val'],$_POST['password']);
	
		break;
		case'signalerProfil':
			$controleur->signalerProfil(htmlspecialchars($_GET["id"]));
			echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
	
		break;


			
	}
}else{
	include('module/fancy/fancy.php');	
}
?>
