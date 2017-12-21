<?php

	require_once(dirname(__FILE__) . "/../params_connexion.php");


Class ModeleMessagerie extends ParamsDB{
	protected $connexion;
	
	public function __construct(){
			$this->connexion = new PDO(self::$dns,self::$user,self::$pwd);
		
	}
	
	public function getRecherche($val){
		
		
		$requete=$this->connexion->prepare("select * from yodag_myparking.messagerie  where (login_expediteur=? or login_destinataire=?)
			and (login_expediteur like ? or login_destinataire like ? or objet like ? or contenu like ?)ORDER BY `messagerie`.`date` DESC ;");
		$requete->execute(array($this->getlogin(),$this->getlogin(),'%'.$val.'%','%'.$val.'%','%'.$val.'%','%'.$val.'%'));
		return $requete;
	}

	public function supprimer($id){
		
		$requete=$this->connexion->prepare("DELETE from yodag_myparking.messagerie where id_message=?;");
		$requete->execute(array($id));
		
	}
	public function getlogin(){
		$requete=$this->connexion->prepare("select * from  yodag_myparking.t_compte where id_user_co = ?;");
		$requete->execute(array($_SESSION['id_user']));
		$requete = $requete->fetch(PDO::FETCH_OBJ);
	
		return $requete->login;
	}

	public function envoyerMessage($destinataire ,$objet,$contenu){

		$requete=$this->connexion->prepare("select * from  yodag_myparking.t_compte where login = ?;");
		$requete->execute(array($destinataire));
		$requete = $requete->fetch(PDO::FETCH_OBJ);
		if(empty($requete)){
			echo" Login invalide";
			return 0;
		}
		else{
			
			$requete1=$this->connexion->prepare("insert into yodag_myparking.messagerie values (default,?,?,?,?,?);");
			$requete1->execute(array($this->getlogin(),$destinataire,$objet,$contenu,date('Y-m-d H:i:s')));	
		
		}
	}

	public function getMessagesRecu(){
		
		$requete=$this->connexion->prepare("select login_expediteur as login ,objet,contenu,date,id_message  from yodag_myparking.messagerie  where login_destinataire=? ORDER BY `messagerie`.`date` DESC ;");
		$requete->execute(array($this->getlogin()));
		return $requete;
	}

	public function getMessagesEnvoyer(){
		
		$requete=$this->connexion->prepare("select login_destinataire as login,objet,contenu,date,id_message from yodag_myparking.messagerie  where login_expediteur=? ORDER BY `messagerie`.`date` DESC ;");
		$requete->execute(array($this->getlogin()));
		return $requete;
	}
	public function getMessage($id){
	
		$requete=$this->connexion->prepare("select * from yodag_myparking.messagerie  where id_message=? ;");
		$requete->execute(array($id));
		return $requete;
	}

	
	

}


?>	