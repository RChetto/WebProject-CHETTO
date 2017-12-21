<?php

	require_once(dirname(__FILE__) . "/../module/params_connexion.php");


Class ModeleAdmin extends ParamsDB{
	protected $connexion;
	
	public function __construct(){
			$this->connexion = new PDO(self::$dns,self::$user,self::$pwd);
		
	}
	
	public function getUtilisateur(){
		
		$requete=$this->connexion->query("select * from yodag_myparking.t_utilisateur;");
		return $requete;
	}
	public function getUnUtilisateur($id){

		$requete=$this->connexion->prepare("select * from yodag_myparking.t_utilisateur where id_user=?;");
		$requete->execute(array($id));
		return $requete;
	}

	public function supprimerUtilisateur($id){
		
		
		$requete1=$this->connexion->prepare("DELETE FROM  yodag_myparking.commentaire where id_user=?;");
		$requete1->execute(array($id));

		$requete2=$this->connexion->prepare("DELETE FROM  yodag_myparking.forum_signaler where id_user=?;");
		$requete2->execute(array($id));

		$requete7=$this->connexion->prepare("DELETE FROM  yodag_myparking.profil_signaler where id_user=?;");
		$requete7->execute(array($id));

		$requete3=$this->connexion->prepare("DELETE FROM  yodag_myparking.p_signaler where id_user=?;");
		$requete3->execute(array($id));

		$requete4=$this->connexion->prepare("DELETE FROM  yodag_myparking.t_message where id_user_me=?;");
		$requete4->execute(array($id));

		$requete5=$this->connexion->prepare("DELETE FROM  yodag_myparking.t_place where id_user_pl=?;");
		$requete5->execute(array($id));

		$requete6=$this->connexion->prepare("DELETE FROM  yodag_myparking.t_sujet where id_user_su=?;");
		$requete6->execute(array($id));

		$requete=$this->connexion->prepare("DELETE FROM  yodag_myparking.t_utilisateur where id_user=?;");
		$requete->execute(array($id));

	
		$requete8=$this->connexion->prepare("DELETE FROM  yodag_myparking.t_compte where id_user_co=?;");
		$requete8->execute(array($id));
	

	
		
	}
	function countUtilisateur(){
		$requete=$this->connexion->query(" SELECT COUNT(id_user) as num from yodag_myparking.t_utilisateur;");
		return $requete;
		
	}



	function countPlace(){
		$requete=$this->connexion->query(" SELECT COUNT(id_place) as num  from yodag_myparking.t_place;");
		return $requete;

	}
	function countmessageSignaler(){

		$requete=$this->connexion->query(" SELECT COUNT(DISTINCT id_place) as num from yodag_myparking.p_signaler ;");
		return $requete;

	}

	function countProfilSignaler(){

		$requete=$this->connexion->query(" SELECT COUNT(DISTINCT id_user_signaler) as num from yodag_myparking.profil_signaler ;");
		return $requete;

	}
	function countForumSignaler(){

		$requete=$this->connexion->query(" SELECT COUNT(DISTINCT id_sujet) as num from yodag_myparking.forum_signaler ;");
		return $requete;

	}

	public function getDescription($id){
		$requete=$this->connexion->prepare("select * from yodag_myparking.t_utilisateur where id_user=?;");
		$requete->execute(array($id));
		return $requete;

	}
	
	public function getForumSignaler(){
		$requete=$this->connexion->query("SELECT * from forum_signaler ,t_sujet where forum_signaler.id_sujet=t_sujet.id_sujet ;");
		return $requete;
	}

	public function getPlaceSignaler(){
		$requete=$this->connexion->query("select * from p_signaler ,t_place where p_signaler.id_place=t_place.id_place ;");
		return $requete;
	}

	public function getProfilSignaler(){
		$requete=$this->connexion->query("select * from profil_signaler ,t_utilisateur,t_compte where profil_signaler.id_user_signaler=t_utilisateur.id_user and t_compte.id_user_co=t_utilisateur.id_user ;");
		return $requete;
	}

	public function getUnForumSignaler($id){

		$requete=$this->connexion->prepare("select * from forum_signaler ,t_sujet where forum_signaler.id_sujet=t_sujet.id_sujet and id_sujet=?;");
		$requete->execute(array($id));
		return $requete;
	}

	public function enleverPlaceSignaler($id){

		$requete2=$this->connexion->prepare("DELETE FROM  yodag_myparking.p_signaler where id_place=?;");
		$requete2->execute(array($id));
	}

	public function enleverForumSignaler($id){

		$requete2=$this->connexion->prepare("DELETE FROM  yodag_myparking.forum_signaler where id_sujet=?;");
		$requete2->execute(array($id));
	}
	public function enleverProfilSignaler($id){

		$requete2=$this->connexion->prepare("DELETE FROM  yodag_myparking.profil_signaler where id_user_signaler=?;");
		$requete2->execute(array($id));
	}

}


?>	