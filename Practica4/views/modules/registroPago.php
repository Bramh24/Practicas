


<div class="row ">
   
   <div class="col-lg-6  " >
   
	   <div class="card-box  ">
		   <h3 class="header-title m-t-0">Registro de Pagos</h3>
	   
		   <form method="POST" >
		   <div class="form-group">
				   <label>Selecciona Padre</label>
				   <div>  
				   <select name="padre" class="form-control">
						<?php 
						 	$verPadres = Datos::ObtenerPadres("padres");
						 
						 	foreach ($verPadres as $a): ?>
								 <option value="<?php echo $a['no_padre']?>"><?php echo $a['nombre_padre'].' '.$a['ape_paterno_padre'].' '.$a['ape_materno_padre']?></option>
						<?php endforeach; ?>
					
					 </select>												
						
				   </div>
				</div>


		   <div class="form-group">
				   <label>Selecciona Alumno</label>
				   <div>  
				   <select name="alumno" class="form-control">
						<?php 
						 	$vistaAlumno = Datos::ObtenerAlumnos("alumnos");
						 
						 	foreach ($vistaAlumno as $a): ?>
								 <option value="<?php echo $a['no_alu']?>"><?php echo $a['nombre'].' '.$a['ape_paterno'].' '.$a['ape_materno']?></option>
						<?php endforeach; ?>
					
					 </select>												
						
				   </div>
				</div>

				
				   

				<div class="form-group">
				   <label>Descripcion</label>
				   <div>
					   <input  type="text"
							   class="form-control" name="descripcionRegistro" required
							   placeholder="Ingresa Descripcion"/>
				   </div>
				</div>
		   
				   <div class="form-group">
				   <label>Monto</label>
				   <div>
					   <input data-parsley-type="number" type="number"
							   class="form-control" name="montoRegistro" required 
							   placeholder="Ingresa Monto"/>
				   </div>
			  	 </div>
			   
			   <div class="form-group">
				   <div>
					   <button type="submit" value="Enviar" class="btn btn-block  btn-custom waves-effect waves-light">
						   Realizar
					   </button>
				   
				   </div>
			   </div>
		   </form>
	   </div>
   </div>

</div>





<?php

$registro = new MvcController();
$registro -> registroPagoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okkkkk"){

		echo "Registro Exitoso";
	
	}

}

?>
