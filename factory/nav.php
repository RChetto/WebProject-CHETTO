
			<header class="st-navbar">
	<nav class="navbar navbar-default navbar-fixed-top clearfix" role="navigation">
		<div class="container"><!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				
				<a class="navbar-brand" href="index.php"><img src="photos/logo3.png" alt="" class="img-responsive"></a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse main-nav" id="sept-main-nav">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?page=profils">Profil</a></li>
					<li><a href="index.php?page=recherche">Nos annonces</a></li>
					<li><a href="index.php?page=forum">Forum</a></li>					
					
					<li><a href="index.php?page=messagerie">Messagerie</a></li>

			<?php
						if(!isset($_SESSION['id_user'])){
			?>
							<li><a href="index.php?page=inscription">Inscription</a></li>
							<li><a href="index.php?page=connexion">Connexion</a></li>
			<?php
							

						}else{

						if(isset($_SESSION['role'])){
							if($_SESSION['role']=='admin'){
			?>
							<li><a href="index.php?page=admin">Admin</a></li>
			<?php
							}
						}


			?>
							<li><a href="index.php?page=connexion&action=deConnection">Déconnexion</a></li>							
			<?php
							
						}
	
			?>
					<li><a href="index.php?page=contact">Contact</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
</header>