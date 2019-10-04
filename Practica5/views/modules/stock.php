
	<section class="content-header">
      <h1>
        Panel de Administracion
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="template.php?action=inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="template.php?action=productos">Productos</a></li>
        <li class="active">Stock</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-6  ">
				<!-- general form elements -->
				<div class="box box-success  d-flex">
					<div class="box-header with-border">
					<h3 class="box-title">Agregar Stock</h3>
					</div>
						<form method="post">    
							<div class="box-body">
							<?php

								$registro = new MvcController();
								$registro -> obtenerStockController();

								?>
							<div class="form-group">
							<label for="AccionRegistro">Accion </label>
								<div class="radio">
									<label>
									<input type="radio" name="Radio" id="optionsRadios1" value="+" checked="">
									Aumentar
									</label>

									<label>
									<input type="radio" name="Radio" id="optionsRadios2" value="-">
									Disminuir
									</label>
								</div>
							</div>
								<div class="form-group">
									<label for="stockRegistro">Cantidad </label>
									<input type="number"  class="form-control" placeholder="Stock"  min=1 name="cantidad" id="stockRegistro" required>
								</div>

								<div class="form-group">
									<label for="referencia">Referencias</label>
									<input type="text" class="form-control" placeholder="Referencia" id="referencia" name="referencia" required>
								</div>

								
									<button type="submit" value="Enviar"class="btn btn-flat btn-success">Agregar</button>
								</div>
								
												
							</div>

							
						</form>

					</div>
				</div>
				<div class="box box-primary">
					<div class="box-header">
					<h3 class="box-title">Historial de Movimientos</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					<table id="example1" class="table table-bordered table-hover">
							
							<thead>
								
								<tr>
									<th>Fecha</th>
									<th>Descripcion</th>
									<th>Referencia</th>
									<th>Total</th>

								</tr>

							</thead>

							<tbody>
								
								<?php

								$registro -> vistaHistorialController();

								?>

							</tbody>

						</table>

					</div>
					<!-- /.box-body -->
				</div>

			</div>
		</div>
        
	
	</section>	






