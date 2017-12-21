<?php

Class VueSender{
	private $action;
	public function __construct(){

	}
	public function formulaire(){
		?>
		<div class="col-md-offset-3 col-md-5">
			<form  method="POST" action ="index.php?page=contact&action=envoyer">
				<input type="text" class="form-control" id="fname" name="fname" placeholder="Nom" required>
				<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
				<input type="text" class="form-control" id="subj" name="subj" placeholder="Sujet" required>
				<textarea id="mssg" name="mssg" placeholder="Message" class="form-control" rows="10" required></textarea>
				<button class="btn btn-main btn-lg" type="submit" id="send" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sending..."><i class="fa fa-paper-plane "></i> Envoyer</button>
			</form>
		</div>
		<?php

	
	}
	

}




?>	