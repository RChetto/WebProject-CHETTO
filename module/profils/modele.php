<?php

	require_once(dirname(__FILE__) . "/../params_connexion.php");


Class ModeleProfil extends ParamsDB{
	protected $connexion;
	
	public function __construct(){
			$this->connexion = new PDO(self::$dns,self::$user,self::$pwd);
		
	}

	public function getProfil($id){

		$requete=$this->connexion->prepare("select * from  yodag_myparking.t_utilisateur , yodag_myparking.t_compte where t_compte.id_user_co=t_utilisateur.id_user and  id_user=? ;");
		$requete->execute(array($id));
		return $requete;		
	}
	public function recherche($val){

		$requete=$this->connexion->prepare("select * from  yodag_myparking.t_utilisateur , yodag_myparking.t_compte where t_compte.id_user_co =t_utilisateur.id_user
			and (nom like ? or prenom like ? or adr_mail like ? or adr_post like ? or login like ?);");
		$requete->execute(array('%'.$val.'%','%'.$val.'%','%'.$val.'%','%'.$val.'%','%'.$val.'%'));
		return $requete;		
	}
	public function verifierPassword($password){
		$requete=$this->connexion->prepare("select * from  yodag_myparking.t_compte where id_user_co=? ;");
		$requete->execute(array($_SESSION['id_user']));
		$requete=$requete->fetch(PDO::FETCH_OBJ);
		if($requete->password == md5($password))
			return 1;
		else 
			return -1;
		
	}

	public function modifierNom($idUtilisateur,$val,$password){
		if($this->verifierPassword($password) == 1){
			$requete=$this->connexion->prepare("update  yodag_myparking.t_utilisateur  set nom=? where id_user=? ;");
			$requete->execute(array($val,$idUtilisateur));
			return 1;
		}else{
			echo "Mot de passe incorrect";
			return -1;
		}
			
		
	}
	public function modifierPrenom($idUtilisateur,$val,$password){
		if($this->verifierPassword($password) == 1){
			$requete=$this->connexion->prepare("update  yodag_myparking.t_utilisateur  set prenom=? where id_user=? ;");
			$requete->execute(array($val,$idUtilisateur));	
			return 1;
		}else{
			echo "Mot de passe incorrect";
			return -1;
		}
	
	}
	public function modifierAdresse($idUtilisateur,$val,$password){
		if($this->verifierPassword($password) == 1){
			$requete=$this->connexion->prepare("update  yodag_myparking.t_utilisateur  set adr_post=? where id_user=? ;");
			$requete->execute(array($val,$idUtilisateur));
			return 1;
		}else{
			echo "Mot de passe incorrect";
			return -1;
		}
		
	}
	public function modifierTel($idUtilisateur,$val,$password){
		$motif ='`^0[1-68][0-9]{8}$`';
		if(!preg_match($motif,$val)){ 
			echo "NUmero invalide";
			return -1;
		}
		if($this->verifierPassword($password) == 1){
			$requete=$this->connexion->prepare("update  yodag_myparking.t_utilisateur  set telephone=? where id_user=? ;");
			$requete->execute(array($val,$idUtilisateur));
			return 1;	
		}else{
			echo "Mot de passe incorrect";
			return -1;

		}
		
	}
	public function modifierMail($idUtilisateur,$val,$password){
		$requete=$this->connexion->prepare("select * from  yodag_myparking.t_utilisateur where id_user=? ;");
		$requete->execute(array($idUtilisateur));
		$requete=$requete->fetch(PDO::FETCH_OBJ);
		if($requete->adr_mail == $val or !filter_var($val, FILTER_VALIDATE_EMAIL)){
			echo "Adresse existante ou invalide";
			return -1;
		}

		if($this->verifierPassword($password) == 1){
			$requete=$this->connexion->prepare("update  yodag_myparking.t_utilisateur  set adr_mail=? where id_user=? ;");
			$requete->execute(array($val,$idUtilisateur));
			return 1;
		}else{
			echo "Mot de passe incorrect";
			return -1;
		}
				
	}

	public function signalerProfil($id){
		
		$requete4=$this->connexion->prepare("select id_user from yodag_myparking.profil_signaler where  id_user_signaler=? and id_user=?");
		$requete4->execute(array($id,$_SESSION['id_user']));
		$requete4 = $requete4->fetch(PDO::FETCH_OBJ);
		if(!empty($requete4)){
			$message = "Vous avez déjà signaler le Profil";
			echo "<script type='text/javascript'>alert('$message');</script>";
			return 0;
		}

		else{


			$requete5=$this->connexion->prepare("SELECT nb_c_signaler from yodag_myparking.profil_signaler where id_user_signaler=?");
			$requete5->execute(array($id));
			$requete5 = $requete5->fetch(PDO::FETCH_OBJ);
			if(!empty($requete5)){


			$requete2=$this->connexion->prepare("SELECT nb_c_signaler as nombre from yodag_myparking.profil_signaler where id_user_signaler=?");
			$requete2->execute(array($id));
			$requete2 = $requete2->fetch(PDO::FETCH_OBJ);
			$requete2 = $requete2->nombre;
			}else {
			$requete2=0;
			}
			$requete3=$this->connexion->prepare("insert into  yodag_myparking.profil_signaler values(default,?,?,?,now()); ");
			$requete3->execute(array($id,$_SESSION['id_user'],$requete2+1));


			
		}
	}


}

?>	