<?php

  if (isset($_GET['id'])) {
      $id = $_GET['id'];
    }
   
   try {
        require_once('funciones/bd_conexion.php');
        $sql = "SELECT * FROM estudiantes WHERE `id` = '$id'"; 
        $resultado = $conn->query($sql);
   } catch (Exception $e) {
       $error = $e->getMessage();
   } 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css" media="screen" title="no title">
  </head>
  <body>

    <div class="contenedor">
      <h1>Participanntes</h1>

        <div class="contenido">
              <h2>Editar Datos</h2>
                    
              <form action="actualizar.php" method="get">
                <?php while($registros = $resultado->fetch_assoc() ) { ?>
                      <div class="campo">
                        <label for="nombre">Nombre
                              <input type="text" name="nombre" id="nombre" value="<?php echo $registros['nombre']; ?>">
                        </label>
                      </div>
                      <div class="campo">
                        <label for="matricula">Matricula
                              <input type="text" name="matricula" id="matricula" value="<?php echo $registros['matricula']; ?>">
                        </label>      
                      </div>
                      <input type="hidden" name="id" value="<?php echo $registros['id']; ?>">
                      <input type="submit" value="Actualizar"> 
                <?php } ?>
              </form>
              
        </div>
    </div>

<?php 
    $conn->close();
?>


  </body>
</html>
