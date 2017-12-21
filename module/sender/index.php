<?php

	require_once('controleur.php');
	

	$controleur = new ControleurSender();
	if(isset($_GET["action"]))
	        $action = htmlspecialchars($_GET["action"]);
	    else
	        $action="formulaire";

	switch($action) {

		case'formulaire':
			$controleur->formulaire();
			
		break;
		
		case'envoyer':
			$controleur->envoyer( htmlspecialchars($_POST['email'] ),htmlspecialchars($_POST['subj'] ),htmlspecialchars($_POST['mssg'] ));
			/*echo "<script type='text/javascript'>document.location.replace('index.php');</script>";*/
		break;	
				
	}





?>