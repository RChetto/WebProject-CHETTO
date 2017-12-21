<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<?php

Class VueMaps{
	private $maps;
	public function __construct($mapsControleur){
		$this->maps = $mapsControleur;	
	}

	public function afficherMaps(){

		$this->maps->setWidth("1150px");
		$this->maps->setHeight("500px");
		$this->maps->setCenterCoords ('2', '48');
		$this->maps->setZoomLevel (5);
		$this->maps->setMapType('hybrid');
		$this->maps-> enableOverviewControl();

		?>

	
	<head>
		<title>Ma première carte Google Maps</title>
		<?php $this->maps->printHeaderJS(); ?>
		<?php $this->maps->printMapJS(); ?>
	</head>
	<body onload="onLoad();">
		<?php $this->maps->printMap(); ?>
	</body>
	
</html>
		<?php
	}
	

	
}




?>	