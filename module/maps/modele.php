<?php

	require_once(dirname(__FILE__) . "/../params_connexion.php");


Class ModeleMaps{
	protected $connexion;
	private $maps;
	
	public function __construct($mapsControleur){
			$this->connexion = new PDO(ParamsDB::$dns,ParamsDB::$user);
			$this->maps = $mapsControleur;		
	}
	
	public function setMaps(){
		$this->maps->setAPIKey('AIzaSyBqKUYBDhndxT8XmXrgAOSxOVgSgeg2_K4');
		$requete=$this->connexion->query("select * from myparking.t_place;");
		while ($enregistrement = $requete->fetch(PDO::FETCH_OBJ)){
		 $this->maps->addMarkerByAddress( "$enregistrement->adresse ,
		  $enregistrement->code_postal $enregistrement->ville",
		   "<titre de l'infobulle>",
		    "<em>contenu</em> de l'infobulle", 
		    "<Title du pointeur>"); 
		}
	}
	

}


?>	