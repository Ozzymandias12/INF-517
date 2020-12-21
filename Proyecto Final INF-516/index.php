<?php
try {
     require_once('funciones/bd_conexion.php');
     $sql = 'SELECT * FROM estudiantes'; 
     $resultado = $conn->query($sql);
} catch (Exception $e) {
      $error = $e->getMessage();
} 
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Plataforma Virtual INF-516</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>
<body>

<header class="site-header inicio1">

<div align="center">

<a href="index.php" class="titulo-inicio"><h1>Plataforma Virtual</h1></a>
      <div class="contenedor">
      <div class="contenido">
              <div class="crear contenedor">
                  <h2>Inicio de sesión</h2>
                  <form action="crear.php" method="POST">
                          <div class="campo">
                              <label for="nombre">Nombre:</label>
                              <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                          </div>
                          <div class="campo">
                              <label for="matricula">Matricula:</label>      
                              <input type="text" name="matricula" id="matricula" placeholder="Matricula">
                          </div>
                          <div class"boton-verde">
                            <input type="submit" value="Ingresar">
                          </div> 
                  </form>
              </div><!--.crear_contacto-->
      </div>
 


</style>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<style>
.boton {
   
    padding: 10px 20px;
    background-color: #20B671;
}
</style>



<input type="button" onclick="window.location= 'perfil.html'" value="Registrarse"
  class="boton">

<style type="text/css">

</style>
    </div>
</header>
</body>
</html>
<?php 
    $conn->close();
?>
