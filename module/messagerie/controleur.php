<?php
	require_once('modele.php');
	require_once('vue.php');

class ControleurMessagerie{
	protected $modele;
	protected $vue;
	


	function __construct(){
		$this->modele = new modeleMessagerie();
		$this->vue = new vueMessagerie();
	}
	
	public function afficherMessagesRecu(){
			
		$this->vue->afficherMessages($this->modele->getMessagesRecu());
	}
	public function afficherMessagesEnvoyer(){

		
		$this->vue->afficherMessages($this->modele->getMessagesEnvoyer());	
	}
	public function recherche($val){		
		$this->vue->afficherMessagesRecherche($this->modele->getRecherche($val));	
	}
	public function formulaire(){

		$this->vue->formulaire();
	}

	public function nav(){

		$this->vue->nav();
	}

	public function supprimer($id){

		$this->modele->supprimer($id);
	}

	public function unMessage($id){

		$this->vue->afficherUnMessage($this->modele->getMessage($id));
	}



	public function EnvoyerMessage($destinataire ,$objet,$contenu){
		if($this->modele->envoyerMessage($destinataire ,$objet,$contenu) == 0)
			$this->vue->formulaire();;

	}
	


}




?>