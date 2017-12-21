
 <link href="../../../css/signin.css" rel="stylesheet">
 <link href="../../../css/css/bootstrap.min.css" rel="stylesheet">


<?php
require_once(dirname(__FILE__) . "/../vue.php");
Class VueInscription extends Vue{
	
	public function __construct(){
		parent::__construct("Connexion");

	}
	
	public function formulaire(){
		?>

		<form action="index.php?page=inscription&action=inscription" class="form-signin-heading" method="post">
			<div class="col-md-offset-3 col-md-3">
				<div>
					
					<input class="case"  placeholder="Nom" type="text" name="nom" required/>
				</div>
				<div>
					
					<input class="case" placeholder="Prénom" type="text" name="prenom" required/>
				</div>
				<div>
				
					<input class="case" placeholder="votre@dresse.fr" type="email"  name="mail" required/>
				</div>
				<div>
					
					<input class="case" placeholder="Adresse" type="text" width="30" name="adresse" required/>
				</div>
				<div>
					
					<input class="case" placeholder="Téléphone" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" type="text" name="tel" required/>
				</div>
			</div> 
			<div class="col-md-4 col-md-offset-1"> 
				<div>
					
					<input type="text" placeholder="Login" name="login"required/>
					</div>

				<div>
					
					<input type="password" placeholder="Mot de passe" name="pass" required/>
					
					<input type="password" placeholder="Confirmation" name="pass_confirm" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"required/>
				</div>
				<div>
					<br><input class="btn btn-main btn-lg"  type="submit" name="inscription" value="Inscription">
					
				</div>
			</div>
		</form>

		<?php	
	}

	
	
}




?>	