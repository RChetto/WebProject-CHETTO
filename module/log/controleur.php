<?php
	require_once('modele.php');
	require_once('vue.php');

class Controleur{
	protected $modele;
	protected $vue;
	


	function __construct($modele , $vue){
		$this->modele = $modele;
		$this->vue = $vue;
	}
	

	public function deLogControleur(){
		$this->modele->deLog();	
		echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
	
	}	
	public function formulaireControleur(){
		$this->vue->formulaire();	
	}

	
	

}




?>