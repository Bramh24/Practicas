
<section class="content-header">
      <h1>
        Panel de Administracion

      </h1>
      <ol class="breadcrumb">
	  <li><a href="template.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
             <li class="active">Usuarios</li>
      </ol>

	</section>

	
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table id="example2" class="table table-bordered table-hover">
					
					<thead>
						
						<tr>
							<th>Id</th>
							<th>Nombres</th>
							<th>Usuario</th>
							<th>Correo</th>
							<th>Agregado</th>
							<th>Modificar</th>
							<th>Eliminar</th>

						</tr>

					</thead>

					<tbody>
						
						<?php

						$vistaUsuario = new MvcController();
						$vistaUsuario -> vistaUsuariosController();
						$vistaUsuario -> borrarUsuarioController();

						?>

					</tbody>

				</table>
			</div>
            <!-- /.box-body -->
		  </div>
		  <div class="bread" >
	  <a href="template.php?action=registro"><button class="btn  btn-success "><i class="fa fa-user"></i>  Agregar Usuario</button></a>
	  </div>
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>		  
			<?php

			if(isset($_GET["action"])){

				if($_GET["action"] == "cambio"){

					echo "Cambio Exitoso";
				
				}

			}

			?>




