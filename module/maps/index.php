<?php
	require_once('controleur.php');
	
if(isset($_SESSION['id_user'])){
	$controleur = new ControleurMaps();
	
		
			$controleur->lancement();
			
		
}else{
	echo"Veuillez vous connecté ou vous inscrire";
}







?>