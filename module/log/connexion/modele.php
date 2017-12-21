<?php

	
	require_once(dirname(__FILE__) . "/../modele.php");


Class ModeleConnexion extends Modele{
	public function __construct(){
		parent::__construct();
		
	}
	
	
	public function log($nom ,$password){
		
		$requete=$this->connexion->prepare("select * from yodag_myparking.t_compte ,yodag_myparking.t_utilisateur where login=? and password =? and t_compte.id_user_co=t_utilisateur.id_user;");
		$requete->execute(array($nom,md5($password)));
		$requete = $requete->fetch(PDO::FETCH_OBJ);
		

		if($requete == false)		
			return -1;
		
			
		else{
				
				$_SESSION['role']=$requete->role;
				$_SESSION['id_user']= $requete->id_user_co;
				return 1;
				
			

		}

		

	}


}


?>	