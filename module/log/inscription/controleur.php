<?php
	
	require_once(dirname(__FILE__) . "/../controleur.php");
	require_once('vue.php');
	require_once('modele.php');

class ControleurInscription extends Controleur{
	
	function __construct(){
		parent::__construct(new ModeleInscription(),new VueInscription());
	}
	
		public function logControleur($nom ,$prenom,$mail,$adresse,$tel,$login,$password,$password2){
		
		$result = $this->modele->log($nom ,$prenom,$mail,$adresse,$tel,$login,$password,$password2);
		if($result == -1 or $result==-2 or $result==-3){
				
			
			if($result == -1){
				echo " Les deux mot de passe ne sont pas identique ";
			}else if ( $result==-2 ) {
				echo " Login existe deja";
			}else if ($result==-3) {
				echo " Adresse mail existe deja";
			}
			$this->vue->formulaire();
		}
		
		else{
			echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
		}
	
	}
	

}




?>