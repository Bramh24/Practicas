<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
	<title>Maestro Nuevo</title>
</head>
<body>
	<?php require_once('header.php'); ?>
	<div class="container">
		<form action="guardarMa.php" method="POST">
			<div>
				<label for="noEmp">No. Empleado:</label>
				<input type="text" id="noEmp" name="noEmp" placeholder="Escribe tu No. Empleado">
			</div>

			<div>
				<label for="nombre">Nombre:</label>
				<input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre">
			</div>

			<div>
				<label for="carrera">Carrera:</label>
				<input type="text" id="carrera" name="carrera" placeholder="Escribe tu carrera">
			</div>

			<div>
				<label for="tel">Telefono:</label>
				<input type="number" id="tel" name="tel" placeholder="Escribe tu telefono">
			</div>

			<div>
				<input type="submit" name="enviar" id="enviar" value="Enviar">
			</div>
		</form>

		<!-- Aqui solamente es el formulario donde vamos a recibir los datos del alumno para poder mandarlos al archivo guardar.php y ahi escribir sus datos en un txt. -->
		
	</div>
	<?php require_once('footer.php'); ?>
</body>
</html>