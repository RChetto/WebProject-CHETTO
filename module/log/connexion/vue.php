 <link href="../../../css/signin.css" rel="stylesheet">
 <link href="../../../css/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="css/style.css">




<?php

require_once(dirname(__FILE__) . "/../vue.php");
Class VueConnexion extends Vue{
	
	public function __construct(){
		parent::__construct("Connexion");

	}
	
	public function formulaire(){
?>
   	<div class="col-md-offset-4 col-md-4">
   	<form id ="form" class="form-signin" method="post" action ="index.php?page=connexion&action=connection">

       <center><h2 class="form-signin-heading">Connectez vous</h2> </center>
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="text" name="nom" class="form-control" placeholder="Login@myParking.good" required autofocus/>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
        
        </div>
        <button class="btn btn-lg btn-primary btn-block" id="submit" type="Submit">Valider</button>
      </form>

</div>
 





			

	</form>

<?php	
	}

	
	
}




?>	