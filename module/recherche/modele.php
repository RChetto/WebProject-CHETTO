<?php

	require_once(dirname(__FILE__) . "/../params_connexion.php");


Class ModeleRecherche extends ParamsDB{
	protected $connexion;
	
	public function __construct(){
			$this->connexion = new PDO(self::$dns,self::$user,self::$pwd);
		
	}
	public function addPlace($id_user_pl,$prix,$adresse,$codePostal,$ville,$type,$description,$pmr,$photo){


		$requete=$this->connexion->prepare("insert into yodag_myparking.t_place values (?,default,?,?,?,?,?,?,?,5,NULL);");
		$requete->execute(array($id_user_pl,$prix,$adresse,$codePostal,$ville,$type,$description,$pmr));



		$id_place=$this->connexion->prepare("select * from yodag_myparking.t_place where id_user_pl=? and  description =?;");
		$id_place->execute(array($id_user_pl,$description));
		$id_place = $id_place->fetch(PDO::FETCH_OBJ);
		$id_place = $id_place->id_place;

		$requete=$this->connexion->prepare("insert into yodag_myparking.note values (?,?,5);");
		$requete->execute(array($id_user_pl,$id_place));

			


			if( isset($_POST['upload']) ) // si formulaire soumis
			{
			    $content_dir = 'upload/'; // dossier où sera déplacé le fichier

			    $tmp_file = $_FILES['fichier']['tmp_name'];

			    




			if (isset($_FILES['photo']['tmp_name'] )){
				 $tmp_file = $_FILES['photo']['tmp_name'];

				 if( !is_uploaded_file($tmp_file) )
			    {
			        exit("Le fichier est introuvable");
			    }

			    // on vérifie maintenant l'extension
			    $type_file = $_FILES['fichier']['type'];

			    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
			    {
			        exit("Le fichier n'est pas une image");
			    }

			    // on copie le fichier dans le dossier de destination
			    $name_file = $_FILES['fichier']['name'];

			    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) ){
			        exit("Impossible de copier le fichier dans $content_dir");
			    }

			    if( preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name_file) )
				{
			    exit("Nom de fichier non valide");
				}
				else if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
				{
			    exit("Impossible de copier le fichier dans $content_dir");
				}

			    echo "Le fichier a bien été uploadé";
				}


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
			$requete=$this->connexion->prepare("select * from yodag_myparking.t_place where ".$nomvar1."=?;");
			$requete->execute(array($var1));
			return $requete;
		} else {
			$requete=$this->connexion->prepare("select * from yodag_myparking.t_place where ".$nomvar1."=? or ".$nomvar2."=?;");
			$requete->execute(array($var1,$var2));
			return $requete;
		}*/

	/*				$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
			t_compte.id_user_co = t_place.id_user_pl and pmr=?   and id_place NOT IN (select id_place from yodag_myparking.louer) ORDER BY `t_place`.`note` ASC");
			$requete->execute(array( $pmr));

			$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
			t_compte.id_user_co = t_place.id_user_pl and code_postal=?   and id_place NOT IN (select id_place from yodag_myparking.louer) ORDER BY `t_place`.`note` ASC");
			$requete->execute(array( $codePostal));

			$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
			t_compte.id_user_co = t_place.id_user_pl and ville =? and id_place NOT IN (select id_place from yodag_myparking.louer) ORDER BY `t_place`.`note` ASC");
			$requete->execute(array( $ville));


			$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
			t_compte.id_user_co = t_place.id_user_pl and code_postal=?  and type=? and id_place NOT IN (select id_place from yodag_myparking.louer) ORDER BY `t_place`.`note` ASC");
			$requete->execute(array($type));

			$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
			t_compte.id_user_co = t_place.id_user_pl and code_postal=? and ville =? and type=? and pmr=?   and id_place NOT IN (select id_place from yodag_myparking.louer) ORDER BY `t_place`.`note` ASC");
			$requete->execute(array( $codePostal, $ville, $type , $pmr));


			$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
			t_compte.id_user_co = t_place.id_user_pl and code_postal=? and ville =? and type=? and pmr=?   and id_place NOT IN (select id_place from yodag_myparking.louer) ORDER BY `t_place`.`note` ASC");
			$requete->execute(array( $codePostal, $ville, $type , $pmr));

			$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
			t_compte.id_user_co = t_place.id_user_pl and code_postal=? and ville =? and type=? and pmr=?   and id_place NOT IN (select id_place from yodag_myparking.louer) ORDER BY `t_place`.`note` ASC");
			$requete->execute(array( $codePostal, $ville, $type , $pmr));
			*/

			$rep="";
			$tableau = array();
			if($codePostal != null){
				$rep= $rep . " and code_postal=? ";
				array_push($tableau, $codePostal);

			}if($ville != null){
				$rep=$rep . " and ville =? ";
				array_push($tableau, $ville);

			}if($type != null){
				$rep=$rep . " and type=? ";
				array_push($tableau, $type);

			}if($pmr != null){
				$rep=$rep . " and pmr=? ";
				array_push($tableau, $pmr);

			
			}if($prix_jour != null){
				$rep=$rep . " and prix_jour <= ? ";
				array_push($tableau, $prix_jour);

			}





			$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
			t_compte.id_user_co = t_place.id_user_pl ". $rep .  " and id_place NOT IN (select id_place from yodag_myparking.louer) ORDER BY `t_place`.`note` ASC");
			$requete->execute($tableau);
			return $requete;
	}

	public function getCommentaire($id){

		$requete=$this->connexion->prepare("select * from yodag_myparking.commentaire, yodag_myparking.t_compte where 
		t_compte.id_user_co = commentaire.id_user and id_place=? ");
		$requete->execute(array($id));
		return $requete;
		

	}
	public function getPlace($id){

		$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
		t_compte.id_user_co = t_place.id_user_pl and id_place=? ");
		$requete->execute(array($id));
		return $requete;
		

	}
	public function VerifierPlace($id){

		$requete=$this->connexion->prepare("select * from yodag_myparking.louer where id_place=? ");
		$requete->execute(array($id));
		if($requete->fetch(PDO::FETCH_OBJ) == NULL)
			return 1;
		else 
			return -1;		

	}
	public function getAllPlace(){

		$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
		t_compte.id_user_co = t_place.id_user_pl and id_place not in (select id_place from yodag_myparking.louer) ORDER BY `t_place`.`note` ASC");

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

		$requete=$this->connexion->prepare("insert into  yodag_myparking.commentaire values(default,?,?,?,?); ");
		$requete->execute(array($idPlace,$_SESSION['id_user'],$commentaire,date('Y-m-d H:i:s')));
		

	}
	public function suppCommentaire($id){
		$requete=$this->connexion->prepare("select * from yodag_myparking.commentaire where  id_com=?");
		$requete->execute(array($id));
		$requete =$requete ->fetch(PDO::FETCH_OBJ);

		if($_SESSION['id_user']==$requete->id_user or $_SESSION['role']=='admin'){
			$requete=$this->connexion->prepare("delete from  yodag_myparking.commentaire where id_com=?; ");
		$requete->execute(array($id));
		}

		
	}
	public function suppPlace($id){
		$requete=$this->connexion->prepare("select * from yodag_myparking.t_place where  id_place=?");
		$requete->execute(array($id));
		$requete =$requete ->fetch(PDO::FETCH_OBJ);
		
		if($_SESSION['id_user']==$requete->id_user_pl or $_SESSION['role']=='admin'){

			$requete=$this->connexion->prepare("delete from  yodag_myparking.t_place where id_place=?; ");
			$requete->execute(array($id));

			$requete2=$this->connexion->prepare("delete from  yodag_myparking.id_p_signale where id_place=?; ");
			$requete2->execute(array($id));


		}

		
	}
	public function louer($idPlace,$dateDebut,$dateFin){
		
		
			$requete=$this->connexion->prepare("insert into yodag_myparking.louer values(?,?,?)");
			$requete->execute(array($idPlace,$dateDebut,$dateFin));
	
	}
	public function dejaLouer($idPlace,$dateDebut,$dateFin){
		
/*			$dateDebut = "'".$dateDebut."'";
			$dateFin = "'".$dateFin."'";
			echo "$dateDebut";
			$requete=$this->connexion->prepare("select * from  yodag_myparking.louer where id_place =? and date_debut >= ? and date_fin <= ?)");
			$requete->execute(array($idPlace,$dateDebut,$dateFin));
			
 
			if ($requete=$requete->fetch(PDO::FETCH_OBJ) == NULL){
				var_dump($requete);
				return 1;
			}
				

			else*/
				return 1;
	
	}
	public function verification_louer(){
		$requete=$this->connexion->prepare("delete from yodag_myparking.louer where date_fin <= ?");
		$requete->execute(array(date('Y-m-d H:i:s')));

		
	}

	
	



	public function signalerPlace($id){
		
		$requete4=$this->connexion->prepare("select id_user from yodag_myparking.p_signaler where  id_place=? and id_user=?");
		$requete4->execute(array($id,$_SESSION['id_user']));
		$requete4 = $requete4->fetch(PDO::FETCH_OBJ);
		if(!empty($requete4)){
			$message = "Vous avez déjà signaler la place";
			echo "<script type='text/javascript'>alert('$message');</script>";
			return 0;
		}

		else{


			$requete5=$this->connexion->prepare("SELECT p_s_nombre from yodag_myparking.p_signaler where  id_place=?");
			$requete5->execute(array($id));
			$requete5 = $requete5->fetch(PDO::FETCH_OBJ);
			if(!empty($requete5)){


			$requete2=$this->connexion->prepare("SELECT p_s_nombre as nombre from yodag_myparking.p_signaler where  id_place=?");
			$requete2->execute(array($id));
			$requete2 = $requete2->fetch(PDO::FETCH_OBJ);
			$requete2 = $requete2->nombre;
			}else {
			$requete2=0;
			}
			$requete3=$this->connexion->prepare("insert into  yodag_myparking.p_signaler values(default,?,?,?); ");
			$requete3->execute(array($id,$_SESSION['id_user'],$requete2+1));


			
		}
	}
		public function getLogin($id){
		$requete=$this->connexion->prepare("select * from  yodag_myparking.t_compte where id_user_co = ?;");
		$requete->execute(array($_SESSION['id_user']));
		$requete = $requete->fetch(PDO::FETCH_OBJ);
	
		return $requete->login;
	}
	public function getLoginProp($idPlace){
		$requete=$this->connexion->prepare("select * from yodag_myparking.t_place, yodag_myparking.t_compte where 
		t_compte.id_user_co = t_place.id_user_pl and id_place=? ");
		$requete->execute(array($idPlace));
		$requete = $requete->fetch(PDO::FETCH_OBJ);
	
		return $requete->login;
	}

	public function envoyerMessage($idPlace,$dateDebut,$dateFin,$jours,$prix){	

		$objet ="Location de Place";
		$expediteur= "Service de location";
		$proprietaire = $this->getLoginProp($idPlace);
		$locataire=$this->getLogin($_SESSION['id_user']);

		$contenu= "votre place de parking a été louer par $locataire
		 du $dateDebut au $dateFin ( $jours jour(s)) pour $prix euro(s).";
		$requete1=$this->connexion->prepare("insert into yodag_myparking.messagerie values (default,?,?,?,?,?);");
		$requete1->execute(array($expediteur,$this->getLoginProp($idPlace),$objet,$contenu,date('Y-m-d H:i:s')));	

		$contenu= "Vous avez louer une  place de parking du proprietaire  $proprietaire
		 du $dateDebut au $dateFin ( $jours jour(s)) pour $prix euro(s).";
		 $requete1=$this->connexion->prepare("insert into yodag_myparking.messagerie values (default,?,?,?,?,?);");
		$requete1->execute(array($expediteur,$this->getLogin($_SESSION['id_user']),$objet,$contenu,date('Y-m-d H:i:s')));
		
		
	}


	public function moyenNote($id){
		$requete=$this->connexion->prepare("select AVG(note) as note from yodag_myparking.note where id_place=?; ");
		$requete->execute(array($id));
		
		return $requete;
	}


	public function noter($id,$note1){
		$requete=$this->connexion->prepare("select * from yodag_myparking.note where id_place=? and id_utilisateur=?;");
		$requete->execute(array($id,$_SESSION['id_user']));
		$requete = $requete->fetch(PDO::FETCH_OBJ);
		if(empty($requete)){
			$requete=$this->connexion->prepare("insert into yodag_myparking.note values (?,?,?);");
			$requete->execute(array($_SESSION['id_user'],$id,$note1));
		}else{
			$requete=$this->connexion->prepare("update yodag_myparking.note set note=? where id_place=? and id_utilisateur=?;");
			$requete->execute(array($note1,$id,$_SESSION['id_user']));
			
		}
		$requete=$this->connexion->prepare("update yodag_myparking.t_place set note=? where id_place=? ;");
		$requete->execute(array($this->moyenNote($id)->fetch(PDO::FETCH_OBJ)->note,$id));

	}


}

?>	