<?php

Class VueProfil{
	private $action;
	public function __construct(){

		
	}
	public function afficherMonProfil($information){
			$information = $information->fetch(PDO::FETCH_OBJ);
			$this->recherche();
			$this->modifier($information->id_user,"modifierNom","Nom",$information->nom);
 			$this->modifier($information->id_user,"modifierPrenom","Prénom",$information->prenom);
 			$this->modifier($information->id_user,"modifierAdresse","Adresse Postal",$information->adr_post);
 			$this->modifier($information->id_user,"modifierMail","Adresse mail",$information->adr_mail);
 			$this->modifier($information->id_user,"modifierTel","Tél",$information->telephone);
 			$this->modifier($information->id_user,NULL,"Login",$information->login);

 			
	}
	public function afficherLesProfils($profils){
		$this->recherche();

		?>
		<div>
			        <table class="table table-striped" >
			            <thead>
			              <tr>
			                <th>Nom</th>		                
			                <th>Prénom</th>
			                <th>Login</th>
			              </tr>
			            </thead><tbody>
			<?php
		while ($enregistrement = $profils->fetch(PDO::FETCH_OBJ)) {
			echo'
			
			<tr>
 				<th>'.$enregistrement->nom.' </th> 	
 				<th>'.$enregistrement->prenom.' </th> 
 				<th>'.$enregistrement->login.' </th>
 	
 				<form method="POST" action ="index.php?page=profils&action=afficherProfils&id='.$enregistrement->id_user.'">			
 					<th><input id="submit" class="btn btn-main btn-lg" type="Submit" value="Afficher"/></th> 
 				</form> 
 				<form method="POST" action ="index.php?page=profils&action=signalerProfil&id='.$enregistrement->id_user.'"" >
	 					<th><input id="submit" class="btn btn-main btn-lg" type="Submit" value="Signaler"/></th>
	 			</form>
 				
 			</tr>

		';
		}
	}
	public function recherche(){
		echo '			        
		       <form method="POST" action="index.php?page=profils&action=recherche">
	    			<div class="input-group">
	    				
						<input type="text" class="form-control"  name="recherche"   placeholder="Search..." required>
						<span class="input-group-btn">
							<button name="insert" class="btn btn-default btn-lg" value="Recherche" type="submit"><i class="fa fa-search"></i></button>
						</span>
						
					</div>	                		
				</form>';
	}

	public function modifier($idUtilisateur,$attribu,$nom,$val){
		echo'
				
				<div style="margin-left:auto; margin-right:auto;">
					<table class="table table-striped" >
				           <thead>
				           <tr>
						             	<th>'.$nom.'</th>
					 				</tr>
				           </thead>
				 				<tbody>
				 
									<tr>
						 				<th>'.$val.'</th>

					 				</tr>
					 				<tr>
					 				';
		if($idUtilisateur == $_SESSION['id_user'] && !is_null($attribu)){
		echo'
						 				<form method="POST" action ="index.php?page=profils&action=formulaire&attribu='.$attribu. '"" >
						 					<th><input id="submit" class="btn btn-main btn-lg" type="Submit" value="Modifier"/></th>
						 				</form>
						 			';
		}
		echo'

					 				</tr>
					 			</tbody>
		 					
 					</table>
 					</div>
	 					
	 					 					
 				
		';

	}

	public function form_modifier($idUtilisateur,$action){
		echo'
				<form method="POST" action ="index.php?page=profils&action='.$action. '&id='.$idUtilisateur.'"" >
						<tr><input id="submit"  type="text" name="val" /></tr>
						<tr><input id="submit"  type="password" name="password" /></tr>
	 					<tr><input id="submit"  class="btn btn-main btn-lg" type="Submit" value="Modifier"/></tr>
	 					
	 					
 					
 				</form>
		';

	}
	


}
?>	