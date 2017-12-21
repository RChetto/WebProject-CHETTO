<?php

Class VueAdmin{
	private $action;
	public function __construct(){

	}
	public function afficherMessage($msg){



		echo "$msg->id_user_me msg :     $msg->message  ($msg->date_post)  <br> ";

	
	}
	
	public function afficherUtilisateur($utilisateur){

			
			?> 
			<div class='container'>
				<div class='row'>
					<div class='col-md-12'>
					<tr>
						<td> <a href="facebook.com">$utilisateur->nom </a></td> <td> ($utilisateur->prenom)  </td> <td> ($utilisateur->telephone)  </td> 
						<td> ($utilisateur->adr_mail)  </td><br>
					</tr>
					</div>
				</div>
			</div>
			<?php
	}



	public function afficherUtilisateurs($utilisateurs,$nombreCompte,$nombrePlace,$nbSignalPlace,$nbSignalForum,$nbSignalProfil){
		
		$nbSignalProfil = $nbSignalProfil->fetch(PDO::FETCH_OBJ);
		$nbSignalProfil = $nbSignalProfil->num;

		
		$nbSignalForum = $nbSignalForum->fetch(PDO::FETCH_OBJ);
		$nbSignalForum = $nbSignalForum->num;


		$nombreCompte = $nombreCompte->fetch(PDO::FETCH_OBJ);
		$nombreCompte = $nombreCompte->num;
		
	
		$nombrePlace = $nombrePlace->fetch(PDO::FETCH_OBJ);
		$nombrePlace = $nombrePlace->num;

		$nbSignalPlace = $nbSignalPlace->fetch(PDO::FETCH_OBJ);
		$nbSignalPlace = $nbSignalPlace->num;
		
		?> 

			<h3>Liste d'utilisateur</h3>
			 <h6>Nom Prenom</h6>

			<div style="margin-left:auto; margin-right:auto;" >
				<form method="POST" action ="index.php?page=admin&action=SuppUtilisateur">			
	        		<select  name="id" size="1">
	        			 <option value="0">Sélectionner utilisateur</option>
		       		 		<?php while ($enregistrement = $utilisateurs->fetch(PDO::FETCH_OBJ)) { ?>
		       		 		
	 		              		<?php echo '<option value="' . $enregistrement->id_user . '">' . $enregistrement->nom .'  '.$enregistrement->prenom . '</option>';   ?>
        			 		<?php } ?>
       				</select>	
	 				<input id="submit" class="btn btn-main btn-lg" type="Submit" value="Supprimer"/>
	 			</form> 
	 		</div>


		<div style="margin-left:auto; margin-right:auto;" >
			    <table class="table table-striped" >
					<thead>
					 <tr>
			                <th>Comptes</th>
			                <th>Places</th>
			                <th>Places Signalées</th>
			                <th>Sujets Signalées</th>
			                 <th>Profils Signalées</th>

			 		</tr>
			  		</thead><tbody>
			   		<tr>
 						<th> <?php echo" $nombreCompte";?> </th>
 						<th> <?php echo" $nombrePlace";?>  </th>
 						<th> <?php echo" $nbSignalPlace ";?>  </th>
 						<th> <?php echo" $nbSignalForum ";?>  </th>
 						<th> <?php echo" $nbSignalProfil ";?>  </th>
 					</tr>
 				</table>
 			</div>
 			
 			
			
    			

<?php
	}
	public function buttonAdmin(){


		?> 

		<div style="margin-left:auto; margin-right:auto;">
			<table class="table table-striped" >
	            <thead>
	              <tr>
					<form method="POST" action ="index.php?page=admin&action=forumSignaler">			
	 					<input id="submit" class="btn btn-main btn-lg" type="Submit" value="Liste des sujet du forum signalés"/>
	 				</form> 
					<form method="POST"  action ="index.php?page=admin&action=placeSignaler">			
	 					<input id="submit" class="btn btn-main btn-lg" type="Submit" value="Liste des places signalées"/>
	 				</form>
	 				<form method="POST"  action ="index.php?page=admin&action=profilSignaler">			
	 					<input id="submit" class="btn btn-main btn-lg" type="Submit" value="Liste des Profils signalés"/>
	 				</form>
	              	
	              </tr>
	            </thead>
			</table>


		<?php


	
	}

	public function afficherforumSignaler($sujets){
			

			?> 		
				<div>
			        <table class="table table-striped" >
			            <thead>
			              <tr>
			                <th></th>
			                <div class=" col-md-5" >
			               <form method="POST" action="index.php?page=forum&action=Rechrche">
	                			<div class="input-group">
									<input type="text" class="form-control"  name="recherche"   placeholder="Search..." required>
									<span class="input-group-btn">
										<button name="insert" class="btn btn-default btn-lg" value="Recherche" type="submit"><i class="fa fa-search"></i></button>
									</span>
								</div>	                		
							</form>
							</div>
			              
			              </tr>
			              <tr>
			                <th>Intitule</th>
			                
			                <th>Date</th>
			                <th></th>
			              </tr>
			            </thead><tbody>
			<?php
		while ($enregistrement = $sujets->fetch(PDO::FETCH_OBJ)) {
			?> 
			
			<tr>
 				<th> <a href="index.php?page=forum&action=msg&id=<?php echo "$enregistrement->id_sujet";?> "><?php echo " $enregistrement->nom_sujet"; ?> </a> </th> 				
 				<th> <?php echo "$enregistrement->date_sujet"; ?>  </th>
 				<?php 
 				if($_SESSION['id_user'] == ($enregistrement->id_user_su) or $_SESSION['role']=='admin'){
 				?>
 				<form method="POST" action ="index.php?page=forum&action=SuppSujet&id=<?php echo "$enregistrement->id_sujet";?>">			
 					<th><input id="submit" class="btn btn-main btn-lg" type="Submit" value="Supprimer"/></th> 
 				</form> 
 				<?php
 				}
 				?>

 				<form method="POST" action ="index.php?page=admin&action=EnleverSignaleForum&id=<?php echo" $enregistrement->id_sujet";?>">
	 				<th><input id="submit" class="btn btn-main btn-lg" type="Submit" value="Enlever Signale"/></th>
	 			</form>

 				<?php 
 				
 				?>
 			</tr>
			
							
 				
 			<?php
				
		}


	}

		public function afficherLesProfilsSignaler($profils){
		

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
 				<form method="POST" action ="index.php?page=admin&action=EnleverSignaleProfil&id='.$enregistrement->id_user_signaler.'"" >
				<th><input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Enlever Signale"/></th>
			</form> 
 				
 			</tr>

		';
		}
	}
	
		
	public function afficherPlaceSignaler($results){
		echo' 
				<div style="margin-left:auto; margin-right:auto;">
			        <table class="table table-striped" >
			            <thead>
			              <tr>
			            
			                <th>Adresse</th>
			                <th>Code Postal</th>
			                <th>Ville</th>
			                <th>Prix (jour)</th>
			                <th>PMR</th>
			                <th>Type</th>
			              </tr>
			            </thead>';
		while ($places = $results->fetch(PDO::FETCH_OBJ)) {
		
			if($places->pmr == 0){
				$places->pmr="Oui";
			}
			else
				$places->pmr="Non";

			if($places->type == 0){
				$places->type="Interieur";
			}
			else
				$places->type="Exterieur";

			echo'
	           <thead>
 				<tbody>
             	<tr>
             	
 				<th>'.$places->adresse.'</th>
 				<th>'.$places->code_postal.'</th>
 				<th>'.$places->ville.'</th>
 				<th>'.$places->prix_jour.'</th>
 				<th>'.$places->pmr.'</th> 
 				<th>'.$places->type.'</th> 
 				';
 				$this->getPlace($places->id_place);
 				echo'

 				</tr>
 				</tbody>
 				</thead>
 			';
		}
		echo "</table>";
		echo "</table>";
	}
	public function getPlace($idPlace){
		echo'
			<form method="POST" action ="index.php?page=recherche&action=afficherUnePlace&id='.$idPlace.'"" >
				<th><input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Afficher"/></th>
			</form>
			<form method="POST" action ="index.php?page=admin&action=EnleverSignalePlace&id='.$idPlace.'"" >
				<th><input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Enlever Signale"/></th>
			</form> 
 		';
	}
}


?>	