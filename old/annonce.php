<!DOCTYPE html>
<html lang="en">

	<?php include('factory\head.php');?>

	<body data-spy="scroll" data-target=".main-nav">

		 <?php include('factory\nav.php');?>

		<section class="home" id="home" data-stellar-background-ratio="0.4">
        </section>	
       	<section >
			<?php 
				require_once('module\place\index.php');
			?>
        </section>	

        <?php 
        	include('factory\footer.php');
       		include('factory\script.php');
        ?>

	</body>
</html>
