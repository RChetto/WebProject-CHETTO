<!DOCTYPE html>
<html lang="en">
	<?php include('factory\head.php');?>
	<body data-spy="scroll" data-target=".main-nav">
	
	

        <?php include('factory\nav.php');
			?>

		<section class="home" id="home" data-stellar-background-ratio="0.4">
			 
        </section>
		
		 <section>
			<div class="container">
				<div class="row">
					<div class="section-title st-center">
						<h2>Recherche</h2>

						<?php 
							/*require_once('module\recherche\index.php');*/
							require_once('module\maps\index.php');
						?>
						
					</div>
				</div>
			</div>

 		</section>

		 <?php 
        	include('factory\footer.php');
       		include('factory\script.php');
        ?>

	</body>
</html>