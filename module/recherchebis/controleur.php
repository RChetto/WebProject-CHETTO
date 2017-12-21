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
			$this->vue->afficherUnePlace($this->modele->getPlace($id));
			$this->vue->formulaire_louer($id);
			$this->vue->afficherCommentaire($this->modele->getCommentaire($id),$id);
			$this->vue->addCommentaire($id);

	}
	public function louer($idPlace,$dateDebut,$dateFin){
		
		$this->modele->louer($idPlace,$dateDebut,$dateFin);
		echo" <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#div1').click(function () {
                alert('I clicked');
            });
        });
		</script>";
		$jours=$this->modele->calculeNbJour($dateDebut,$dateFin);
		$prix=$this->modele->calculePrix($dateDebut,$dateFin,$idPlace);
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

}




?>