<?php

	require_once(dirname(__FILE__) . "/../params_connexion.php");


Class Modele extends ParamsDB{
	protected $connexion;
	
	public function __construct(){
			$this->connexion = new PDO(self::$dns,self::$user,self::$pwd);
		
	}
	
	public function deLog(){
		
		$_SESSION['id_user']=null;
		echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
	}
	
	
	

}


?>	