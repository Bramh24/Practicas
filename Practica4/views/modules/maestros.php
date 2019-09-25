

<div style="background-color:white " >
	<table class="table ">
		
		<thead style="background-color:#53D3EE">
			
			<tr>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Modificar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaMaestro = new MvcController();
			$vistaMaestro -> vistaMaestroController();
			$vistaMaestro -> borrarMaestroController();

			?>

		</tbody>

	</table>
</div>
<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambiooo"){

		echo "Cambio Exitoso";
	
	}

}

?>




