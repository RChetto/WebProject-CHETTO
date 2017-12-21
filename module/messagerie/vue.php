<?php

Class VueMessagerie{
	private $action;
	public function __construct(){

	}

	public function nav(){
		?>

		<div class=" col-md-5">
	        <table class="table table-striped" >
	            <thead>
 	              <tr>
	                <th></th>

	              

		                <form  method="POST" action="index.php?page=messagerie&action=Rechrche">
		                	<div class="input-group">
								<input type="text" class="form-control"  name="recherche"   placeholder="Search..." required>
									<span class="input-group-btn">
										<button name="insert" class="btn btn-default btn-lg" value="Recherche" type="submit"><i class="fa fa-search"></i></button>
									</span>
							</div>	                		
						</form>   

	              </tr>
	              <tr>
	                <th><a href = "index.php?page=messagerie&action=formulaire"> Nouveau </a></th>
	              </tr>
	              <tr>
	                <th><a href = "index.php?page=messagerie&action=messageRecu"> Message recu </a></th>
	              </tr>
	              <tr>
	                <th><a href = "index.php?page=messagerie&action=messageEnvoyer">  Message envoyer</a></th>
	              </tr>
	            </thead>
	        </table>

	    </div>
		
		
	

		<?php
	}
	public function  afficherUnMessage($message){
		$message = $message->fetch(PDO::FETCH_OBJ);
		echo'
			<div style="margin-left:auto; margin-right:auto;">
			    <table class="table table-striped" >
		           <thead>
		 				<tbody>
			             	<tr>
				             	<th>Expediteur</th>
				 				<th>'.$message->login_expediteur.'</th>
			 				</tr>
			             	<tr>
				             	<th>Destintaire</th>
				 				<th>'.$message->login_destinataire.'</th>
			 				</tr>
			             	<tr>
				             	<th>Objet</th>
				 				<th>'.$message->objet.'</th>
			 				</tr>
			             	<tr>
				             	<th>Date</th>
				 				<th>'.$message->date.'</th>
			 				</tr>
			             	<tr>
				             	<th>Contenu</th>
				 				<th>'.$message->contenu.'</th>
			 				</tr>
			 				</tbody>
 					</thead>
 				</table>
 			</div>';


	}
	public function formulaire(){

			
			?>
		<form method="POST" action ="index.php?page=messagerie&action=envoyerMessage" >
			<div class="col-md-offset-3 col-md-3">
	
				<div>
					<input class="case"   type="text"   	 placeholder ="Objet" name="objet" required/>
				</div>
				<div>
					<input class="case" type="text"  placeholder ="Contenu" name="contenu" required/>
				</div>
				<div>
					<input class="case" type="text"  placeholder ="Destinataire" name="destinataire" required/>
				</div>
				<div>
					<input id="submit"  class="btn btn-main btn-lg"  type="Submit" value="Ajouter"/>
				</div>
			</div>		

		</form>

	<?php	
	}
	public function afficherMessages($sujets){

			echo' 
				<div style="margin-left:auto; margin-right:auto;" >
			        <table class="table table-striped" >
			            <thead>
			              <tr>
			                <th>Login</th>
			                <th>Objet</th>
			                <th>Date</th>
			                <th></th>
			              </tr>
			            </thead><tbody>';
		while ($enregistrement = $sujets->fetch(PDO::FETCH_OBJ)) {
			?> 
			
			<tr>
				<th> <?php echo "$enregistrement->login"; ?>  </th>
 				<th> <a href="index.php?page=messagerie&action=afficherMessage&id=<?php echo "$enregistrement->id_message";?> "><?php echo " $enregistrement->objet"; ?> </a> </th> 				
 				<th> <?php echo "$enregistrement->date"; ?>  </th>
 				<form method="POST" action ="index.php?page=messagerie&action=supprimer&id=<?php echo "$enregistrement->id_message";?>">			
 					<th> <input class="btn btn-main btn-lg"  id="submit" type="Submit" value="Supprimer"/></th> 
 				</form> 
 				
 			</tr>
			
							
 				
 			<?php
				
		}
		echo "</tbody> </table> </div>";


	}
	public function afficherMessagesRecherche($sujets){

			echo' 
				<div style="margin-left:auto; margin-right:auto;" >
			        <table class="table table-striped" >
			            <thead>
			              <tr>
			                <th>Destinataire</th>
			                <th>Expediteur</th>
			                <th>Objet</th>
			                <th>Date</th>
			                <th></th>
			              </tr>
			            </thead><tbody>';
		while ($enregistrement = $sujets->fetch(PDO::FETCH_OBJ)) {
			?> 
			
			<tr>
				<th> <?php echo "$enregistrement->login_destinataire"; ?>  </th>
				<th> <?php echo "$enregistrement->login_expediteur"; ?>  </th>
 				<th> <a href="index.php?page=messagerie&action=afficherMessage&id=<?php echo "$enregistrement->id_message";?> "><?php echo " $enregistrement->objet"; ?> </a> </th> 				
 				<th> <?php echo "$enregistrement->date"; ?>  </th>
 				<form method="POST" action ="index.php?page=messagerie&action=supprimer&id=<?php echo "$enregistrement->id_message";?>">			
 					<th> <input class="btn btn-main btn-lg"  id="submit" type="Submit" value="Supprimer"/></th> 
 				</form> 
 				
 			</tr>
			
							
 				
 			<?php
				
		}
		echo "</tbody> </table> </div>";


	}

}

?>	