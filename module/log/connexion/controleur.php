<?php

	require_once(dirname(__FILE__) . "/../controleur.php");
	require_once('vue.php');
	require_once('modele.php');

class ControleurConnexion extends Controleur{
	
	function __construct(){
		parent::__construct(new ModeleConnexion(),new VueConnexion());
	}
	
		public function logControleur($nom,$password){
		

		$result = $this->modele->log($nom,$password);
		if($result == -1){
				
			$this->vue->formulaire();
			echo " Error";
		}
		else{					



			echo"<script type='text/javascript'>document.location.replace('index.php');</script>"; 
		}
	}
	

}




?>