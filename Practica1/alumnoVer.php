

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver Alumnos</title>
	<link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
</head>
<body>
	<?php require_once('header.php'); ?>
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Listado de Alumnos</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <table>
                <thead>
                  <tr>
                    <th width="100">Matricula</th>
                    <th width="100">Nombre</th>
                    <th width="100">Carrera</th>
                    <th width="100">Correo</th>
                    <td width="100">Telefono</td>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  	$archivo = file('archivoAlu.txt');
					          foreach($archivo as $linea => $contenido){
  						        echo '  <tr>';
  						        $array = explode('|', $contenido);
  						        foreach($array as $columna) {
    						        echo '    <td>'.trim($columna).'</td>';
  						        }
  						      echo '  </tr>';
					          }
                  ?>

                </tbody>
              </table>

            </div>
          </section>
        </div>
      </div>

    </div>
	<?php require_once('footer.php'); ?>
</body>
</html>