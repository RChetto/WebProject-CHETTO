<?php
	require_once('modele.php');
	require_once('vue.php');

class ControleurSender{
	protected $modele;
	protected $vue;
	


	function __construct(){
		$this->modele = new modeleSender();
		$this->vue = new vueSender();
	}
	
	public function formulaire(){
		
		$this->vue->formulaire();
	
	}
	public function envoyer($expediteur,$objet,$message){
		$this->modele->envoyer($expediteur,$objet,$message);
		
	}
	
	

}




?>