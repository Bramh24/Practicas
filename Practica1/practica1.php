<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
	<link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
</head>
<body>
	<?php require_once('header.php'); ?>
	<fieldset>
		<legend>Menu</legend>

		<div>
			<div class="large-9 columns">
        		<ul class="right button-group">
          			<li><a href="./alumno.php" class="button">Agregar Alumno</a></li>
          			<li><a href="./alumnoVer.php" class="button">Mostrar Alumnos</a></li>
          			<li><a href="./maestro.php" class="button">Agregar Maestro</a></li>
          			<li><a href="./maestroVer.php" class="button">Mostrar Maestros</a></li>
        		</ul>
      		</div>
		</div>

		<!-- Este es nuestro pequeño menu donde iran todos los botones para irnos a nuestros formularios o mostrar los ya registrados. -->

	</fieldset>
	<?php require_once('footer.php'); ?>
</body>
</html>