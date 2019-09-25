



<div class="row ">
   
   <div class="col-lg-6  " >
   
	   <div class="card-box  ">
		   <h3 class="header-title m-t-0">Registro de Grupos</h3>
	   
		   <form method="POST" >
		   		
			  	 <div class="form-group">
				   <label>Nombre</label>
				   <div>
					   <input  type="text"
							   class="form-control" name="nombreRegistro" required
							   placeholder=" Ingresa Nombre"/>
				   </div>
				</div>
				
				   
				<div class="form-group">
				   <label>Descripcion</label>
				   <div>
					   <input  type="text"
							   class="form-control" name="desRegistro" required
							   placeholder="Ingresa Descripcion"/>
				   </div>
				</div>

			   <div class="form-group">
				   <label>Selecciona Profesor</label>
				   <div>  
				   <select name="maestro" class="form-control">
						<?php 
						 	$maestros = Datos::ObtenerMaestros("maestros");
						 
						 	foreach ($maestros as $a): ?>
								 <option value="<?php echo $a['no_maestro']?>"><?php echo $a['nombre'].' '.$a['ape_paterno'].' '.$a['ape_materno']?></option>
						<?php endforeach; ?>
					
					 </select>												
						
				   </div>
				</div>
			   
			   <div class="form-group">
				   <div>
					   <button type="submit" value="Enviar" class="btn btn-block  btn-custom waves-effect waves-light">
						   Agregar
					   </button>
				   
				   </div>
			   </div>
		   </form>
	   </div>
   </div>

</div>





<?php

$registro = new MvcController();
$registro -> registroGrupoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okkkk"){

		echo "Registro Exitoso";
	
	}

}

?>
