<?php
	require_once('modele.php');
	require_once('vue.php');

class ControleurForum{
	protected $modele;
	protected $vue;
	


	function __construct(){
		$this->modele = new modeleForum();
		$this->vue = new vueForum();
	}
	
	public function afficherSujets(){
			
			$this->vue->afficherSujets($this->modele->getSujet());
			$this->vue->addSujet();
	}
	public function recherche($val){		
		$this->vue->afficherSujets($this->modele->getRecherche($val));	
	}

	public function afficherLesMsg($id){

		
		$this->vue->afficherMessages($this->modele->getMessages($id),$this->modele->getDescription($id),$id);
		$this->vue->addMessage($id);

	
	}
	public function formulaireAjoutSujet(){

		$this->vue->addSujet();
	}



	public function addSujet($nom_sujet,$description,$id_user_su){
		$this->modele->addSujet($nom_sujet,$description,$id_user_su);

	}
	
	public function addMessage($id_sujet_me ,$id_user_me , $message ){
		$this->modele->addMsg( $id_sujet_me ,$id_user_me , $message );
		
	}
	
	public function supprimerSujet($id){
		if($this->modele->getUnSujet($id)->fetch(PDO::FETCH_OBJ)->id_user_su == $_SESSION['id_user']or $_SESSION['role']=='admin'){
			$this->modele->supprimerSujet($id);
		}
		
	}


	public function supprimerMessage($id){
		if($this->modele->getUnMessage($id)->fetch(PDO::FETCH_OBJ)->id_user_me == $_SESSION['id_user']or $_SESSION['role']=='admin'){
			$this->modele->supprimerMessage($id);
		}
	}
	public function signalerForum($id){
		$this->modele->signalerForum($id);
	}
	

}




?>