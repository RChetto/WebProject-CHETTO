<?php
	require_once('modele.php');
	require_once('vue.php');

class ControleurAdmin{
	protected $modele;
	protected $vue;
	
	private $modeleforum;
	private $vueforum;

	function __construct(){
		$this->modele = new modeleAdmin();
		$this->vue = new vueAdmin();

		
	}
	
	public function afficherUtilisateurs(){
			
			$this->vue->afficherUtilisateurs($this->modele->getUtilisateur(),$this->modele->countUtilisateur(),
				$this->modele->countPlace(),$this->modele->countmessageSignaler(),$this->modele->countForumSignaler(),$this->modele->countProfilSignaler());
			$this->vue->buttonAdmin();

	}


	public function afficherUtilisateur($id){
			
			$this->vue->afficherUtilisateurs($this->modele->getUnUtilisateur($id));

	}

	public function supprimerUtilisateur($id){
		
		$this->modele->supprimerUtilisateur($id);
		
	}
	public function supprimerSignalerPlace($id){
		
		$this->modele->enleverPlaceSignaler($id);
		$this->vue->afficherplaceSignaler($this->modele->getPlaceSignaler());
	
	}
	public function supprimerSignalerForum($id){
		
		$this->modele->enleverForumSignaler($id);
		$this->vue->afficherforumSignaler($this->modele->getForumSignaler());
		
	}
	public function supprimerSignalerProfil($id){
		
		$this->modele->enleverProfilSignaler($id);
		$this->vue->afficherLesProfilsSignaler($this->modele->getProfilSignaler());
		
	}
	

	public function afficherforumSignaler(){


		$this->vue->afficherforumSignaler($this->modele->getForumSignaler());
	}


	public function afficherprofilSignaler(){


		$this->vue->afficherLesProfilsSignaler($this->modele->getProfilSignaler());
	}

	public function afficherplaceSignaler(){


		$this->vue->afficherplaceSignaler($this->modele->getPlaceSignaler());
	}
	/*public function afficherLesMsg($id){

		$this->vueforum->afficherMessages($this->modele->getMessages($id),$this->modele->getDescription($id));
		$this->vueforum->addMessage($id);

	
	
	
	
	public function supprimerMessage($id){
		
		$this->modeleforum->supprimerMessage($id);
		$this->vue->afficherUtilisateurs($this->modele->getUtilisateur());
	}
	*/
}




?>