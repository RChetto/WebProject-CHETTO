<?php
 session_start();
if(isset($_GET["page"]))
	$page = htmlspecialchars($_GET["page"]);
else
        $page=include('index1.php');
							

?>
<!DOCTYPE html>
<html lang="en">
		 <?php include('factory/head.php');?>
	<body data-spy="scroll" data-target=".main-nav">
	


		        <?php include('factory/nav.php');
		        if(isset($_GET["page"])){

				?>

							<section class="home" id="home" data-stellar-background-ratio="0.4">
       						 </section>

       						<section>
							<div class="container">
							<div class="row">

					<div class="section-title st-center">
						<h3><?php echo "$page ";?></h3>
					</div>
						<?php
						switch($page) {


			
							
					

							case'connexion':
							
								include('module/log/connexion/index.php');
								
							break;

							case 'inscription':
								include('module/log/inscription/index.php');
							break;
							case 'forum':
								include('module/forum/index.php');
							break;
							case 'contact':
								include('module/sender/index.php');
							break;
							case 'recherche':
								include('module/recherche/index.php');
							break;
							case 'admin':
								include('admin/index.php');
							break;
							case 'messagerie':
							include('module/messagerie/index.php');
							break;
							case 'profils':
							include('module/profils/index.php');
							break;
							
						}
						?>
						
					</div>
				</div>
			</div>

 		</section>
        <?php 
    }
        	include('factory/footer.php');
       		include('factory/script.php');
        ?>
        
	</body>
</html>

