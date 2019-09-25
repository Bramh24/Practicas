

<div style="background-color:white " >
	<table class="table ">
		
		<thead style="background-color:#53D3EE">
			
			<tr>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Edad</th>
				<th>Padre</th>
				<th>Modificar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaAlumno = new MvcController();
			$vistaAlumno -> vistaAlumnoController();
			$vistaAlumno -> borrarAlumnoController();

			?>

		</tbody>

	</table>
<div>
<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambioo"){

		echo "Cambio Exitoso";
	
	}

}

?>




