<?php
	require_once('modele.php');
	require_once('vue.php');

class ControleurProfil{
	protected $modele;
	protected $vue;
	


	function __construct(){
		$this->modele = new modeleProfil();
		$this->vue = new vueProfil();
	}
	public function recherche($val){
		
		$this->vue->afficherLesProfils($this->modele->recherche($val));
	
	}
	public function getProfils($id){
		
		$this->vue->afficherMonProfil($this->modele->getProfil($id));
	
	}
	public function form_modifier($id,$action){
		$this->vue->form_modifier($id,$action);
	}

	public function modifierNom($idUtilisateur,$val,$password){	
		$this->modele->modifierNom($idUtilisateur,$val,$password);
			$this->getProfils($idUtilisateur);
			
	}
	public function modifierPrenom($idUtilisateur,$val,$password){
		$this->modele->modifierPrenom($idUtilisateur,$val,$password);
			$this->getProfils($idUtilisateur);
		
	}
	public function modifierAdresse($idUtilisateur,$val,$password){
		$this->modele->modifierAdresse($idUtilisateur,$val,$password);
			$this->getProfils($idUtilisateur);
		
	}
	public function modifierTel($idUtilisateur,$val,$password){
		$this->modele->modifierTel($idUtilisateur,$val,$password);
		$this->getProfils($idUtilisateur);
			
		
	}
	public function modifierMail($idUtilisateur,$val,$password){
		$this->modele->modifierMail($idUtilisateur,$val,$password);
			$this->getProfils($idUtilisateur);
		
	}
	public function signalerProfil($id){
		$this->modele->signalerProfil($id);
	}
}




?>