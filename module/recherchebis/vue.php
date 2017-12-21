<?php

Class VueRecherche{
	private $action;
	public function __construct(){

	}
	public function accueil(){
				?> 
		<div style="margin-left:auto; margin-right:auto;">
			<table class="table table-striped" >
	            <thead>
	              <tr>
					<form method="POST" action ="index.php?page=recherche&action=form_avancee">
						<th><input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Affiner ma recherche" /></th>

					</form>
					<form method="POST" action ="index.php?page=recherche&action=formulaire">
						<th><input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Ajouter une Annonce" /></th>
					</form>
	              	
	              </tr>
	            </thead>
			</table>


		<?php

	}
	public function addPlace(){
	?>
		<form method="POST" action ="index.php?page=recherche&action=add" enctype="multipart/form-data">
			<div class="col-md-offset-3 col-md-3">
	
				<div>
					<input class="case"   type="text" placeholder ="Prix/Jour" name="prix" required/>
				</div>
				<div>
					<input class="case" type="text"  placeholder ="Adresse" name="adresse" required/>
				</div>
				<div>
					<input class="case" type="text"  placeholder ="Code Postal" name="codePostal" required/>
				</div>
				<div>
					<input class="case" type="text"  placeholder ="Ville" name="ville" required/>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-1"> 
				
				<div>
					<input class="case" type="text" size="60"  placeholder ="Description" name="description" required/>
				</div>
				<div>
					<div><label>Type</label>
					<select name="type">
					<option value=""> - Choisir - </option>
					<option value="0">Interieur</option>
					<option value="1">Exterieur</option>
					</select>
					
				</div>

				<div><label>PMR</label>


					<select name="pmr">
					<option value="">- Choisir - </option>
					<option value="0">Oui</option>
					<option value="1">Non</option>
					</select>

				<br><label>Ajouter une photo</label>
				 <input type="file" name="photo"  />	
				</div>
				<div>
					<input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Ajouter"/>
				</div>
			</div>
		

		</form>

	<?php	
	}
	public function formulaireRecherche(){
	?>
		<form method="POST" action ="index.php?page=recherche&action=avancee" enctype="multipart/form-data">
			<div class="col-md-offset-3 col-md-3">
	
				<div>
					<input class="case"   type="text" placeholder ="Prix/Jour" name="prix" required/>
				</div>
				<div>
					<input class="case" type="text"  placeholder ="Adresse" name="adresse" required/>
				</div>
				<div>
					<div><label>Type</label>
					<select name="type">
					<option value=""> - Choisir - </option>
					<option value="0">Interieur</option>
					<option value="1">Exterieur</option>
					</select>
					
				</div>

				<div><label>PMR</label>


					<select name="pmr">
					<option value="">- Choisir - </option>
					<option value="0">Oui</option>
					<option value="1">Non</option>
					</select>
				</div>
				</div>
				
			</div>
			<div class="col-md-4 col-md-offset-1"> 
				<div>
					<input class="case" type="text"  placeholder ="Code Postal" name="codePostal" required/>
				</div>
				<div>
					<input class="case" type="text"  placeholder ="Ville" name="ville" required/>
				</div>
				
				
				<div>
					<input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Recherche"/>
				</div>
			</div>
		

		</form>

	<?php	
	}
	public function afficherUnePlace($place){
		
			$place =$place ->fetch(PDO::FETCH_OBJ);
			if($place->pmr == 0){
				$place->pmr="Oui";
			}
			else
				$place->pmr="Non";

			if($place->type == 0){
				$place->type="Interieur";
			}
			else
				$place->type="Exterieur";

			/*$chemin=dirname(__FILE__)."/../".$place->photo.;*/
			$chemin ="$place->photo ";
			echo'
			<div style="margin-left:auto; margin-right:auto;">
			    <table class="table table-striped" >
		           <thead>
		 				<tbody>
		 					<tr>
				             	<img width="400" height="300" src='.$chemin.'/>
			             	</tr>
			             	<tr>
				             	<th>Propriétaire</th>
				             	<th>'.$place->login.'</th>
			             	</tr>
			             	<tr>
				             	<th>Adresse</th>
				 				<th>'.$place->adresse.'</th>
			 				</tr>
			             	<tr>
				             	<th>Code Postal</th>
				 				<th>'.$place->code_postal.'</th>
			 				</tr>
			             	<tr>
				             	<th>Ville</th>
				 				<th>'.$place->ville.'</th>
			 				</tr>
			             	<tr>
				             	<th>Prix (jour)</th>
				 				<th>'.$place->prix_jour.'</th>
			 				</tr>
			             	<tr>
				             	<th>PMR</th>
				 				<th>'.$place->pmr.'</th>
			 				</tr>
			             	<tr> 
				             	<th>Type</th>
				 				<th>'.$place->type.'</th> 
			 				</tr>
			 				<tr> 
				             	<th>Description</th>
				 				<th>'.$place->description.'</th> 
			 				</tr>';
			 				echo'<form method="POST" action ="index.php?page=recherche&action=signalerPlace&id='.$place->id_place.'"" >
	 					<th><input id="submit" class="btn btn-main btn-lg" type="Submit" value="Signaler"/></th>
	 				</form><br></br>';

			 	if($_SESSION['id_user'] ==  $place->id_user_pl or $_SESSION['role']=='admin')
 					$this->supprimerPlace($place->id_place);

 				echo'

		 				</tbody>
 					</thead>
 				</table>
 			</div>';
	}
	public function addCommentaire($idPlace){
		echo'
				<form method="POST" action ="index.php?page=recherche&action=addCommentaire&idPlace='.$idPlace.'"" >
					<tr>
						<th><input class="case" type="text"  placeholder ="Commentaire" name="commentaire" required/></th>
	 					<th><input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Commenter"/></th>
 					</tr>
 				</form>
		';

	}
	public function afficherCommentaire($results,$idPlace){
		echo' 
				<div style="margin-left:auto; margin-right:auto;">
			        <table class="table table-striped" >
			            <thead>
			              <tr>
			              	<th>Login</th>
			                <th>Commentaire</th>
			                <th>Date</th>
			              </tr>
			            </thead>';
		while ($places = $results->fetch(PDO::FETCH_OBJ)) {

			?>
	           <thead>
 				<tbody>
             	<tr>
             	<th><?php echo" $places->login "?></th>
 				<th><?php echo "$places->contenu "?></th>
 				<th> <?php echo" $places->date "?> </th>
 				<?php
 				if($_SESSION['id_user'] ==  $places->id_user or $_SESSION['role']=='admin')
 					$this->supprimerCommentaire($places->id_com,$idPlace);
	 			else
	 				echo'<th></th>';

 				?>
 				</tr>
 				</tbody>
 				</thead>
 			<?php
		}
		echo "</table>";
	}
	public function afficherPlaces($results){
		echo' 
				<div style="margin-left:auto; margin-right:auto;">
			        <table class="table table-striped" >
			            <thead>
			              <tr>
			              	<th>Propriétaire</th>
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
 
 			';
		}
		echo "</table>";
	}
	public function getPlace($idPlace){
		echo'
			<form method="POST" action ="index.php?page=recherche&action=afficherUnePlace&id='.$idPlace.'"" >
				<th><input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Afficher"/></th>
			</form> 
 		';
	}
	
	public function formulaire_louer($idPlace){
		echo'
			<form method="POST" action ="index.php?page=recherche&action=louer&id='.$idPlace.'"" >
			<input class="case" type="text"  placeholder ="Début" name="debut" required/>
			<input class="case" type="text"  placeholder ="Fin" name="fin" required/>
				<th><input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Louer"/></th>
			</form> 
 		';
	}
	public function supprimerPlace($idPlace){
		echo'
			<form method="POST" action ="index.php?page=recherche&action=suppPlace&id='.$idPlace.'"" >
	 					<th><input id="submit"  class="btn btn-main btn-lg" type="Submit" value="Supprimer"/></th>
	 		</form>
 		';
	}

	public function supprimerCommentaire($idCommentaire,$idPlace){
		echo'
			<form method="POST" action ="index.php?page=recherche&action=suppCommentaire&id='.$idCommentaire.'&idPlace='.$idPlace.'"" >
				<th><input id="submit"  type="Submit" value="Supprimer"/></th>
			</form>
 		';
	}
	public function msgApresLocation($jours,$prix,$dateDebut,$dateFin){
		echo'
			<div style="margin-left:auto; margin-right:auto;">
			    <table class="table table-striped" >
		           <thead>
		 				<tbody>
		 					<tr>
				             	<th>Date début</th>
				             	<th>'.$dateDebut.'</th>
			             	</tr>
			             	<tr>
				             	<th>Date fin</th>
				 				<th>'.$dateFin.'</th>
			 				</tr>
			             	<tr>
				             	<th>Jours</th>
				             	<th>'.$jours.'</th>
			             	</tr>
			             	<tr>
				             	<th>Prix</th>
				 				<th>'.$prix.'</th>
			 				</tr>
			             
		 				</tbody>
 					</thead>
 				</table>
 			</div>
 		';
	}
}
?>	