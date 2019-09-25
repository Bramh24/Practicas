



<div class="row ">
   
   <div class="col-lg-6  " >
   
	   <div class="card-box  ">
		   <h3 class="header-title m-t-0">Registro de Maestros</h3>
	   
		   <form method="POST" >
		   		
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
				   <div>
					   <button type="submit" value="Enviar"   class="btn btn-block  btn-custom waves-effect waves-light">
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
$registro -> registroMaestroController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okkk"){

		echo "Registro Exitoso";
	
	}

}

?>
