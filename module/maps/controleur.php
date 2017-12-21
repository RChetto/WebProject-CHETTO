<?php
	require_once('modele.php');
	require_once('vue.php');
	require('GoogleMapAPI.class.php');

//(2) On crée une nouvelle carte; Ici, notre carte sera $map.


class ControleurMaps{
	protected $modele;
	protected $vue;	


	function __construct(){
		$maps = new GoogleMapAPI('map');
		$this->modele = new modeleMaps($maps);
		$this->vue = new vueMaps($maps);
	}
	
	public function lancement(){
			$this->modele->setMaps();
			$this->vue->afficherMaps();
	}



}

?>