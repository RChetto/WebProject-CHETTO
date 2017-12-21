<?php

	require_once(dirname(__FILE__) . "/../params_connexion.php");


Class Modele extends ParamsDB{
	protected $connexion;
	
	public function __construct(){
			$this->connexion = new PDO(self::$dns,self::$user,self::$pwd);
		
	}
	
	
	
	

}


?>	