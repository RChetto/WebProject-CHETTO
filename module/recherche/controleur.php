<?php
	require_once('modele.php');
	require_once('vue.php');

class ControleurRecherche{
	protected $modele;
	protected $vue;
	


	function __construct(){
		$this->modele = new modeleRecherche();
		$this->vue = new vueRecherche();
	}
	public function formulaire(){
		
		$this->vue->addPlace();
	
	}	
	public function add($id_user_pl,$prix,$adresse,$codePostal,$ville,$type,$description,$pmr,$photo){
		$this->modele->addPlace($id_user_pl,$prix,$adresse,$codePostal,$ville,$type,$description,$pmr,$photo);
	

	}
	public function form_rechercheAv(){
			$this->vue->formulaireRecherche();

	}

	public function accueil(){
			$this->vue->accueil();
			$this->vue->afficherPlaces($this->modele->getAllPlace());

	}

	public function rechercheAv2($prix_jour,$adresse, $codePostal, $ville, $type , $pmr){
			$this->vue->afficherPlaces($this->modele->rechercheAv($prix_jour,$adresse, $codePostal, $ville, $type , $pmr));
	}
	
	
	public function afficherUnePlace($id){
		if($this->modele->VerifierPlace($id) == 1 or $_SESSION['role'] == "admin"){
			$this->vue->afficherUnePlace($this->modele->getPlace($id),$this->modele->moyenNote($id));
			$this->vue->formulaire_louer($id);
			$this->vue->afficherCommentaire($this->modele->getCommentaire($id),$id);
			$this->vue->addCommentaire($id);
		
		}
		else{
			echo "Place déja louer";
		}


	}
	public function louer($idPlace,$dateDebut,$dateFin){
		if($this->modele->dejaLouer($idPlace,date("Y-m-d", strtotime($dateDebut)),date("Y-m-d", strtotime($dateFin))) == 1){
			$dateDebut=date("d-m-Y", strtotime($dateDebut));
			$dateFin=date("d-m-Y", strtotime($dateFin));

			$jours=$this->modele->calculeNbJour($dateDebut,$dateFin);
			$prix=$this->modele->calculePrix($dateDebut,$dateFin,$idPlace);
			$this->vue->msgApresLocation($jours,$prix,$dateDebut,$dateFin);
			$this->vue->valide($idPlace,$dateDebut,$dateFin,$jours,$prix);
		}
		else{
			echo "Cette place est deja louer pour cette periode";
		}
		

	}
	public function validerLocation($idPlace,$dateDebut,$dateFin,$jours,$prix){
		$this->modele->louer($idPlace,date("Y-m-d", strtotime($dateDebut)),date("Y-m-d", strtotime($dateFin)));
		$this->modele->envoyerMessage($idPlace,$dateDebut,$dateFin,$jours,$prix);
		$this->vue->msgApresLocation($jours,$prix,$dateDebut,$dateFin);
		
		

	}
	public function verification_louer(){
		$this->modele->verification_louer();
	}
	
	public function addCommentaire($idPlace,$commentaire){
		$this->modele->addCommentaire($idPlace,$commentaire);
	}

		public function suppPlace($id){
		$this->modele->suppPlace($id);
	}
		public function suppCommentaire($id){
		$this->modele->suppCommentaire($id);
	}
	public function signalerPlace($id){
		$this->modele->signalerPlace($id);
	}

	public function modifierNote($id,$note1){
		$this->modele->noter($id,$note1);
		$this->afficherUnePlace($id);
	}

}




?>