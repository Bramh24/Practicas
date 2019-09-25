

<div style="background-color:white " >
	<table class="table ">
		
		<thead style="background-color:#53D3EE">
			
			<tr>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Telefono</th>
				<th>Correo</th>
				<th>Modificar</th>
				<th>Eliminar</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaPadre = new MvcController();
			$vistaPadre -> vistaPadreController();
			$vistaPadre -> borrarPadreController();

			?>

		</tbody>

	</table>
</div>
<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambioooo"){

		echo "Cambio Exitoso";
	
	}

}

?>




