<?php
	include_once 'header.php';
?>

<h3 class="text-center">Le recomendamos las siguientes ofertas y promociones</h3>

<?php 
	foreach ($vars['atractivos'] as $key => $value) {
		echo '<a class="btn form-control" href="?controller=Recommendation&action=verDetalleAtractivo&id='. $value[0] .'">'. $value[1] .'</a>';
		echo "<br><br>";
	}
?>

<?php
  	include_once 'footer.php';
?>