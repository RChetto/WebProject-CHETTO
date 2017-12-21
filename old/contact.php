<!DOCTYPE html>
<html lang="en">
		 <?php include('factory\head.php');?>
	<body data-spy="scroll" data-target=".main-nav">
	


		        <?php include('factory\nav.php');
			?>

		<section class="home" id="home" data-stellar-background-ratio="0.4">
        </section>
		<section class="contact" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title st-center">
							<h3>Contactez nous</h3>
							<p>Partagez vos impression</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<?php
						include('module\sender\index.php');
						?>
						<div id="result-message" role="alert"></div>
					</div>
					<div class="col-md-6">
						<p>Fait pas le fou, amorem errore meo horreat triario quantus rectas tollitur. Infimum audiebamus saluto disciplina praetermittenda, aspernatur vocent firmitatem contenta eademque ibidem quales efficiat. Oblivione democriti, philosophorum philosopho, ordiamur sapiens iudex cyrenaicos similia, divitiarum panaetium. Tradere praetulerit, declarant scripserit doleamus iisque iudicabit aegritudo individua tractatas qua modice. Difficilius loqueretur improbe aetatis consectetur solis velint, grata quiddam partus occulta delectari maior, theseo eveniunt, turpius nesciunt amicitias constantia seque, utraque, statu genus scriptorem fugit fuissent duxit, compluribus primos scaevolam.</p>
						<address>
							<strong>Twitter, Inc.</strong><br>
							795 Folsom Ave, Suite 600<br>
							San Francisco, CA 94107<br>
							<abbr title="Phone">P:</abbr> (123) 456-7890
						</address>
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
