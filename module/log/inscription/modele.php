<?php

	
require_once(dirname(__FILE__) . "/../modele.php");

Class ModeleInscription extends Modele{
	public function __construct(){
		parent::__construct();
		
	}
	
	
	public function log($nom ,$prenom,$mail,$adresse,$tel,$login,$password,$password2){
		$login=$login. "@yodag_myparking.good";
		if($password2 !== $password){
			return -1;
		}
		$requete=$this->connexion->prepare("select * from yodag_myparking.t_compte where login=? ;");
		$requete->execute(array($login));
		$requete = $requete->fetch(PDO::FETCH_OBJ);
		if(!empty($requete)){			
			return -2;
		}

		$id=$this->connexion->prepare("select id_user from yodag_myparking.t_utilisateur where  adr_mail=? ");
		$id->execute(array($mail));
		$id = $id->fetch(PDO::FETCH_OBJ);
		if(!empty($id)){			
			return -3;
		}

		$requete=$this->connexion->prepare("INSERT INTO yodag_myparking.t_utilisateur VALUES (default,?,?,?,?,?,?)");
		$requete->execute(array($nom,$prenom,$adresse,$mail,$tel,'user'));
		$requete = $requete->fetch(PDO::FETCH_OBJ);

		$id=$this->connexion->prepare("select * from yodag_myparking.t_utilisateur where nom=? and  prenom=? and  adr_post=? and adr_mail=? and telephone= ?;");
		$id->execute(array($nom,$prenom,$adresse,$mail,$tel));
		$id = $id->fetch(PDO::FETCH_OBJ);
		$id = $id->id_user;


		$requete=$this->connexion->prepare("INSERT INTO yodag_myparking.t_compte VALUES (?,?,?)");
		$requete->execute(array($login,md5($password),$id));
		$requete = $requete->fetch(PDO::FETCH_OBJ);
		$_SESSION['id_user']=$id;
		$_SESSION['role']='user';

		

	}


}


?>	