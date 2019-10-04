
<section class="content-header">
      <h1>
        Panel de Administracion
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="template.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="template.php?action=categorias">Categorias</a></li>
        <li class="active">Editar de Categoria</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-6  ">
			<!-- general form elements -->
			<div class="box box-success  d-flex">
				<div class="box-header with-border">
				<h3 class="box-title">Editar de Categoria</h3>
				</div>
				
				<form method="post">
					
					<?php

					$editarUsuario = new MvcController();
					$editarUsuario -> editarCategoriaController();
					$editarUsuario -> actualizarCategoriaController();

					?>

				</form>


				</div>
			</div>
		</div>
</section>
