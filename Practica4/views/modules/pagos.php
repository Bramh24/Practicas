

<div style="background-color:white " >
	<table class="table ">
		
		<thead style="background-color:#53D3EE">
			
			<tr>
				<th>No. Padre</th>
				<th>No. Usuario</th>
				<th>No. Alumno</th>
				<th>Descripción</th>
				<th>Monto</th>
				<th>Modificar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaPadre = new MvcController();
			$vistaPadre -> vistaPagoController();
			$vistaPadre -> borrarPagoController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambiooooo"){

		echo "Cambio Exitoso";
	
	}

}

?>




