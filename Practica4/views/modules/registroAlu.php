


<div class="row ">
   
   <div class="col-lg-6  " >
   
	   <div class="card-box  ">
		   <h3 class="header-title m-t-0">Registro de Alumnos</h3>
	   
		   <form method="POST"  > 

		   
		   		
			  	 <div class="form-group">
				   <label>Nombre</label>
				   <div>
					   <input data-parsley-type="alphanum" type="text"
							   class="form-control" name="nombreRegistro" required
							   placeholder=" Ingresa Nombre"/>
				   </div>
				</div>
				
				   
				<div class="form-group">
				   <label>Apellido Paterno</label>
				   <div>
					   <input data-parsley-type="alphanum" type="text"
							   class="form-control" name="paternoRegistro" required
							   placeholder="Ingresa Apellido"/>
				   </div>
				</div>

				<div class="form-group">
				   <label>Apellido Materno</label>
				   <div>
					   <input  type="text"
							   class="form-control" name="maternoRegistro" required
							   placeholder="Ingresa Apellido"/>
				   </div>
				</div>
		   
				   <div class="form-group">
				   <label>Edad</label>
				   <div>
					   <input data-parsley-type="number" type="text"
							   class="form-control" name="edadRegistro"  required 
							   placeholder="Ingresa Edad"/>
				   </div>
			  	 </div>

			  	  <div class="form-group">
				   <label>Selecciona Padre</label>
				   <div>  
				   <select name="no_padreRegistro" class="form-control">
						<?php $vistaPadre = Datos::ObtenerPadres("padres"); foreach ($vistaPadre as $a): ?>
								 <option value="<?php echo $a['no_padre'] ?>"><?php echo $a['nombre_padre'].' '.$a['ape_paterno_padre'].' '.$a['ape_materno_padre'] ?> </option> <?php endforeach; ?>
					
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
$registro -> registroAlumnoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okk"){

		echo "Registro Exitoso";
	
	}

}

?>
