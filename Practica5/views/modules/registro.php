
<section class="content-header">
      <h1>
        Panel de Administracion
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="template.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="template.php?action=usuarios">Usuarios</a></li>
        <li class="active">Registro</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-6  ">
			<!-- general form elements -->
			<div class="box box-success  d-flex">
				<div class="box-header with-border">
				<h3 class="box-title">Resgistro de Usuarios</h3>
				</div>
					<form method="post">    
						<div class="box-body">
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" class="form-control" placeholder="Nombre" id="nombreRegistro" name="nombreRegistro" required>
							</div>

							<div class="form-group">
								<label for="apellidos">Apelllidos</label>
								<input type="text" class="form-control" placeholder="Apellidos" id="apellidos" name="apellidosRegistro" required>
							</div>

							<div class="form-group">
								<label for="usuario">Usuario</label>
								<input type="text" class="form-control"  placeholder="Usuario" id="usuario"name="usuarioRegistro" required>
							</div>

							<div class="form-group">
								<label for="password">Contraseña</label>
								<input type="password"class="form-control" placeholder="Contraseña" name="passwordRegistro" required>
							</div>

							<div class="form-group">
								<label for="correo">correo</label>
								<input type="email" class="form-control" placeholder="Correo" name="emailRegistro" required>
							</div>

								<button type="submit" value="Enviar"class="btn btn-flat btn-success">Agregar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
</section>	
<?php

$registro = new MvcController();
$registro -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
