<?php

  if (isset($_GET['nombre'])) {
      $nombre = $_GET['nombre'];
    }
   if (isset($_GET['matricula'])) {
      $matricula = $_GET['matricula'];
    }
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    }
   
   try {
        require_once('funciones/bd_conexion.php');
        $sql = "UPDATE `estudiantes` SET `nombre`= '{$nombre}', `matricula` = '{$matricula}' WHERE `id` = {$id}";
        
        $resultado = $conn->query($sql);
   } catch (Exception $e) {
       $error = $e->getMessage();
   } 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agenda PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css" media="screen" title="no title">
  </head>
  <body>

    <div class="contenedor">
      <h1>Participantes</h1>

        <div class="contenido">
  
                <?php 
                if ($conn->query($sql) === TRUE) {
                    echo "Datos Actualizados";
                } else {
                    echo "Error actualizando: " . $conn->error;
                }
                 ?>
                <a class="volver" href="participantes.php">Volver a Participantes</a>
        </div>
    </div>

<?php 
    $conn->close();
?>


  </body>
</html>
