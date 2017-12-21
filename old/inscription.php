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
							<h2>Inscription</h2>
						</div>
						<div class="row mb90">	
						<?php	
			            require_once('module\log\Inscription\index.php');
			            ?>
						</div>

						<div class="row">
							

		<section class="funfacts" data-stellar-background-ratio="0.4">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="funfact">
							<div class="st-funfact-icon"><i class="fa fa-briefcase"></i></div>
							<div class="st-funfact-counter" ><span class="st-ff-count" data-from="0" data-to="25964" data-runit="1">0</span>+</div>
							<strong class="funfact-title">Nombre d'annonce</strong>
						</div><!-- .funfact -->
					</div>
					<div class="col-md-3">
						<div class="funfact">
							<div class="st-funfact-icon"><i class="fa fa-clock-o"></i></div>
							<div class="st-funfact-counter" ><span class="st-ff-count" data-from="0" data-to="35469" data-runit="1">0</span>+</div>
							<strong class="funfact-title">Nombre de like</strong>
						</div><!-- .funfact -->
					</div>
					<div class="col-md-3">
						<div class="funfact">
							<div class="st-funfact-icon"><i class="fa fa-send"></i></div>
							<div class="st-funfact-counter" ><span class="st-ff-count" data-from="0" data-to="86214" data-runit="1">0</span>+</div>
							<strong class="funfact-title">nombre utilisateur</strong>
						</div><!-- .funfact -->
					</div>
					<div class="col-md-3">
						<div class="funfact">
							<div class="st-funfact-icon"><i class="fa fa-magic"></i></div>
							<div class="st-funfact-counter" ><span class="st-ff-count" data-from="0" data-to="3647" data-runit="1">0</span>+</div>
							<strong class="funfact-title">tata</strong>
						</div><!-- .funfact -->
					</div>
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
