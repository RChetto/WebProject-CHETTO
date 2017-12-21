<?php

Class VueForum{
	private $action;
	public function __construct(){

	}
	public function afficherMessage($msg){



		echo "$msg->id_user_me msg :     $msg->message  ($msg->date_post)  <br> ";

	
	}
	
	public function afficherSujet($sujet){

			
			?> 
			<div class='container'>
				<div class='row'>
					<div class='col-md-12'>
					<tr>
						<td> <a href="facebook.com">$sujet->nom_sujet </a></td> <td> ($sujet->date_sujet)  </td> <br>
					</tr>
					</div>
				</div>
			</div>
			<?php
	}
	public function afficherSujets($sujets){

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

 				<form method="POST" action ="index.php?page=forum&action=signalerForum&id=<?php echo" $enregistrement->id_sujet";?>">
	 				<th><input id="submit" class="btn btn-main btn-lg" type="Submit" value="Signaler"/></th>
	 			</form>

 				<?php 
 				
 				?>
 			</tr>
			
							
 				
 			<?php
				
		}


	}

	public function afficherMessages($messages,$description,$id){

		$description = $description->fetch(PDO::FETCH_OBJ);
			?>
		<div >
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Intitule</th>
						<th>Description</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th> <?php echo "$description->nom_sujet"; ?>  </th> 
						<th> <?php echo "$description->description_sujet"; ?>  </th>
						<th> <?php echo "$description->date_sujet"; ?>  </th> 
					</tr>
				</tbody>
			</table> 
		</div> 

		<div >
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Réponse</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($enregistrement = $messages->fetch(PDO::FETCH_OBJ)) {
						 
					?> 

					<tr>
						<th> <?php echo "$enregistrement->login"; ?>  </th> 
						<th> <?php echo "$enregistrement->message"; ?>  </th>
						<th> <?php echo "$enregistrement->date_post"; ?>  </th> 
						<?php 
		 				if($_SESSION['id_user'] == ($enregistrement->id_user_me)or $_SESSION['role']=='admin'){
		 				?>
						<form method="POST" action ="index.php?page=forum&action=SuppMsg&id=<?php echo "$enregistrement->id_message";?>&idSujet=<?php echo "$id";?>">			
							<th> <input id="submit" class="btn btn-main btn-lg" type="Submit" value="Supprimer"/></th> 
						</form>
						
				<?php 
 				}else{
 				?>
 				<th> </th> 
 				<?php 
 				}
 				?>
					</tr>
				</tbody>
				<?php
				}

	}



	public function addSujet(){
	?>

		<form method="POST" action ="index.php?page=forum&action=addSujet">	

				<tbody>
					<tr>
						<th> <input class="case" type="text" name="sujet" placeholder="Sujet" required/> </th> 
						<th> <textarea  type="text" name="description" placeholder="Description"  rows="3" cols="50" required/></textarea> </th>
						<th> <input class="btn btn-main btn-lg" id="submit" type="Submit" value="Ajouter"/></th> 
					</tr>
				</tbody>
			</table>
		</div>
		</form>

	<?php
	}

	public function addMessage($idSujet){
	?>
		<form method="POST" action ="index.php?page=forum&action=repondre">
				<tbody>
					<tr>
						<th> </th> 
						<th> <textarea class="case" placeholder="Répondre..." type="text" name="reponse" rows="3" cols="50" required /></textarea> </th> 
						<th> <input type="HIDDEN" value= "<?php echo $idSujet; ?>" name="idSujet" > </th>
						<th> <input id="submit"   class="btn btn-main btn-lg" type="Submit" value="Répondre"/></th> 
					</tr>
				</tbody>
			</table>
		</div>



		</form>

	<?php	
	}
	
}




?>	