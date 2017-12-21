<?php

	require_once(dirname(__FILE__) . "/../params_connexion.php");


Class ModeleRecherche extends ParamsDB{
	protected $connexion;
	
	public function __construct(){
			$this->connexion = new PDO(self::$dns,self::$user);
		
	}
	public function addPlace($id_user_pl,$prix,$adresse,$codePostal,$ville,$type,$description,$pmr,$photo){


		$requete=$this->connexion->prepare("insert into myparking.t_place values (?,default,?,?,?,?,?,?,?,5,NULL);");
		$requete->execute(array($id_user_pl,$prix,$adresse,$codePostal,$ville,$type,$description,$pmr));


		$id_place=$this->connexion->prepare("select * from myparking.t_place where id_user_pl=? and  description =?;");
		$id_place->execute(array($id_user_pl,$description));
		$id_place = $id_place->fetch(PDO::FETCH_OBJ);
		$id_place = $id_place->id_place;

		

			if (isset($_FILES['photo']['tmp_name'] )){
				
				$nom="images/photoEmplacement/".$id_place.".jpg";
				$resultat= move_uploaded_file($_FILES['photo']['tmp_name'],$nom);
				if($resultat){
					echo "transfert réussi";
					$requete=$this->connexion->prepare("update t_place set photo=? where id_place=?;");
					$requete->execute(array($nom,$id_place));
				}

			}
	}

	public function rechercheAv($prix_jour,$adresse, $codePostal, $ville, $type , $pmr){
/*
		if(strcmp($nomvar2,"null")==0){
			$requete=$this->connexion->prepare("select * from myparking.t_place where ".$nomvar1."=?;");
			$requete->execute(array($var1));
			return $requete;
		} else {
			$requete=$this->connexion->prepare("select * from myparking.t_place where ".$nomvar1."=? or ".$nomvar2."=?;");
			$requete->execute(array($var1,$var2));
			return $requete;
		}*/

			$requete=$this->connexion->prepare("select * from myparking.t_place, myparking.t_compte where 
			t_compte.id_user_co = t_place.id_user_pl and code_postal=? and ville =? and type=? and pmr=?  ");
			$requete->execute(array( $codePostal, $ville, $type , $pmr));
			echo "$prix_jour, $codePostal, $ville, $type , $pmr";
			return $requete;
	}
	public function getCommentaire($id){

		$requete=$this->connexion->prepare("select * from myparking.commentaire, myparking.t_compte where 
		t_compte.id_user_co = commentaire.id_user and id_place=? ");
		$requete->execute(array($id));
		return $requete;
		

	}
	public function getPlace($id){

		$requete=$this->connexion->prepare("select * from myparking.t_place, myparking.t_compte where 
		t_compte.id_user_co = t_place.id_user_pl and id_place=? ");
		$requete->execute(array($id));
		return $requete;
		

	}
	public function getAllPlace(){

		$requete=$this->connexion->prepare("select * from myparking.t_place, myparking.t_compte where 
		t_compte.id_user_co = t_place.id_user_pl and id_place NOT IN (select id_place from myparking.louer) ORDER BY `t_place`.`note` ASC");

		$requete->execute(array());
		return $requete;
		

	}
	public function calculeNbJour($dateDebut,$dateFin){
         $now = new DateTime();
  		$dateDebut = new DateTime($dateDebut);
  		$dateFin = new DateTime($dateFin);
 	 return  $dateDebut->diff($dateFin)->days;
		

	}
	public function calculePrix($dateDebut,$dateFin,$id){
         $jours=$this->calculeNbJour($dateDebut,$dateFin);
         $place=$this->getPlace($id);
         $place=$place->fetch(PDO::FETCH_OBJ);

 	 return  $jours*$place->prix_jour;
		

	}
	public function addCommentaire($idPlace,$commentaire){

		$requete=$this->connexion->prepare("insert into  myparking.commentaire values(default,?,?,?,?); ");
		$requete->execute(array($idPlace,$_SESSION['id_user'],$commentaire,date('Y-m-d H:i:s')));
		

	}
	public function suppCommentaire($id){
		$requete=$this->connexion->prepare("select * from myparking.commentaire where  id_com=?");
		$requete->execute(array($id));
		$requete =$requete ->fetch(PDO::FETCH_OBJ);

		if($_SESSION['id_user']==$requete->id_user or $_SESSION['role']=='admin'){
			$requete=$this->connexion->prepare("delete from  myparking.commentaire where id_com=?; ");
		$requete->execute(array($id));
		}

		
	}
	public function suppPlace($id){
		$requete=$this->connexion->prepare("select * from myparking.t_place where  id_place=?");
		$requete->execute(array($id));
		$requete =$requete ->fetch(PDO::FETCH_OBJ);
		
		if($_SESSION['id_user']==$requete->id_user_pl or $_SESSION['role']=='admin'){
			$requete=$this->connexion->prepare("delete from  myparking.t_place where id_place=?; ");
		$requete->execute(array($id));
		}

		
	}
	public function louer($idPlace,$dateDebut,$dateFin){
		
		$requete=$this->connexion->prepare("select * from myparking.t_place where  id_place=?");
		$requete->execute(array($idPlace));
		$requete =$requete ->fetch(PDO::FETCH_OBJ);
		
		if($_SESSION['id_user']==$requete->id_user_pl ){
			$requete=$this->connexion->prepare("insert into myparking.louer values(?,?,?)");
			$requete->execute(array($idPlace,$dateDebut,$dateFin));
		
		}

		
	}
	public function verification_louer(){
		$requete=$this->connexion->prepare("delete from myparking.louer where date_fin <= ?");
		$requete->execute(array(date('Y-m-d H:i:s')));

		
	}
	public function signalerPlace($id){
		
		$requete4=$this->connexion->prepare("select id_user from myparking.p_signaler where  id_place=? and id_user=?");
		$requete4->execute(array($id,$_SESSION['id_user']));
		$requete4 = $requete4->fetch(PDO::FETCH_OBJ);
		if(!empty($requete4)){
			$message = "Vous avez déjà signaler la place";
			echo "<script type='text/javascript'>alert('$message');</script>";
			return 0;
		}

		else{


			$requete5=$this->connexion->prepare("SELECT p_s_nombre from myparking.p_signaler where  id_place=?");
			$requete5->execute(array($id));
			$requete5 = $requete5->fetch(PDO::FETCH_OBJ);
			if(!empty($requete5)){


			$requete2=$this->connexion->prepare("SELECT p_s_nombre as nombre from myparking.p_signaler where  id_place=?");
			$requete2->execute(array($id));
			$requete2 = $requete2->fetch(PDO::FETCH_OBJ);
			$requete2 = $requete2->nombre;
			}else {
			$requete2=0;
			}
			$requete3=$this->connexion->prepare("insert into  myparking.p_signaler values(default,?,?,?); ");
			$requete3->execute(array($id,$_SESSION['id_user'],$requete2+1));


			
		}
	}


}
?>	