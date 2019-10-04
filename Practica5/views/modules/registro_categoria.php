
<section class="content-header">
      <h1>
        Panel de Administracion
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="template.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="template.php?action=categorias">Categoriass</a></li>
        <li class="active">Registro de Categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-6  ">
			<!-- general form elements -->
			<div class="box box-success  d-flex">
				<div class="box-header with-border">
				<h3 class="box-title">Resgistro de Categorias</h3>
				</div>
					<form method="post">    
						<div class="box-body">
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" class="form-control" placeholder="Nombre de la Categoria" id="nombreRegistro" name="nombreRegistro" required>
							</div>

							<div class="form-group">
								<label for="des">Descripcion</label>
								<input type="text" class="form-control"  placeholder="Descripcion" id="des"name="desRegistro" required>
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
$registro -> registroCategoriaController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
