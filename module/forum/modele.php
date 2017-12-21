<?php

	require_once(dirname(__FILE__) . "/../params_connexion.php");


Class ModeleForum extends ParamsDB{
	protected $connexion;
	
	public function __construct(){
			$this->connexion = new PDO(self::$dns,self::$user,self::$pwd);
		
	}
	
	public function getRecherche($val){
		
		$requete=$this->connexion->prepare("SELECT * FROM t_sujet WHERE t_sujet.description_sujet LIKE ? or nom_sujet like ?");
		$requete->execute(array('%'.$val.'%','%'.$val.'%'));
		return $requete;
	}

	public function getSujet(){
		
		$requete=$this->connexion->query("select * from yodag_myparking.t_sujet ORDER BY `t_sujet`.`date_sujet` DESC;");
		return $requete;
	}
	public function getUnSujet($id){

		$requete=$this->connexion->prepare("select * from yodag_myparking.t_sujet where id_sujet=?;");
		$requete->execute(array($id));
		return $requete;
	}

	public function supprimerSujet($id){

		$requete2=$this->connexion->prepare("DELETE FROM  yodag_myparking.forum_signaler where id_sujet=?;");
		$requete2->execute(array($id));

		$requete=$this->connexion->prepare("DELETE FROM  yodag_myparking.t_sujet where id_sujet=?;");
		$requete->execute(array($id));
		
	}

	public function supprimerMessage($id){
		
		$requete=$this->connexion->prepare("DELETE from yodag_myparking.t_message where id_message=?;");
		$requete->execute(array($id));
		
	}

	public function getDescription($id){
		$requete=$this->connexion->prepare("select * from yodag_myparking.t_sujet where id_sujet=?;");
		$requete->execute(array($id));
		return $requete;

	}
	public function addSujet($nom_sujet,$description ,$id_user_su){
		$requete=$this->connexion->prepare("insert into yodag_myparking.t_sujet values (default,?,?,?,?);");
		$requete->execute(array($nom_sujet,$description,date('Y-m-d H:i:s') ,$id_user_su));
	}

	public function getMessages($id){
		
		$requete=$this->connexion->prepare("select * from yodag_myparking.t_message , yodag_myparking.t_compte where id_sujet_me=? and t_message.id_user_me=t_compte.id_user_co
			ORDER BY `t_message`.`date_post` DESC ;");
		$requete->execute(array($id));
		return $requete;
	}

	public function getUnMessage($id){
		$requete=$this->connexion->prepare("select * from yodag_myparking.t_message where id_message=?;");
		$requete->execute(array($id));
		return $requete;
	}
	public function addMsg( $id_sujet_me ,$id_user_me , $message ){
		$requete=$this->connexion->prepare("insert into yodag_myparking.t_message values (default,?,?,?,?);");
		$requete->execute(array( $id_sujet_me ,$id_user_me , date('Y-m-d H:i:s'), $message));
	}
			
	
	public function signalerForum($id){
		
		$requete4=$this->connexion->prepare("select id_user from yodag_myparking.forum_signaler where  id_sujet=? and id_user=?");
		$requete4->execute(array($id,$_SESSION['id_user']));
		$requete4 = $requete4->fetch(PDO::FETCH_OBJ);
		if(!empty($requete4)){
			$message = "Vous avez déjà signaler le message";
			echo "<script type='text/javascript'>alert('$message');</script>";
			return 0;
		}

		else{

			$requete5=$this->connexion->prepare("SELECT m_s_nombre from yodag_myparking.forum_signaler where  id_sujet=?");
			$requete5->execute(array($id));
			$requete5 = $requete5->fetch(PDO::FETCH_OBJ);
			if(!empty($requete5)){

			$requete2=$this->connexion->prepare("SELECT m_s_nombre as nombre from yodag_myparking.forum_signaler where  id_sujet=?");
			$requete2->execute(array($id));
			$requete2 = $requete2->fetch(PDO::FETCH_OBJ);
			$requete2 = $requete2->nombre;
			}else {
			$requete2=0;
			}
			$requete3=$this->connexion->prepare("insert into  yodag_myparking.forum_signaler values(default,?,?,?,now()); ");
			$requete3->execute(array($id,$_SESSION['id_user'],$requete2+1));


			
		}
	}

}


?>	