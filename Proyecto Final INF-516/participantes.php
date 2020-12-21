
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
  <title>Participantes</title>
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

  <!-- Add your site or application content here -->
  <header class="site-header inicio">
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="inicio.html">
          <img class="logo1" src="img/logo.png" alt="Logotipo">
        </a>
        <nav id="navegacion" class="navegacion">
          <a href="index.php" class="boton boton-verde">Cerrar Sesión</a>
          <!-- <a href="perfil.html" class="boton boton-amarillo">Registrarse</a> -->
        </nav>
      </div>

      <h1>Plataforma de aprendizaje virtual</h1>
    </div> <!--contenedor-->
    <div class="contenedor">
      <nav id="navegacion" class="navegacion navegacion2">
          <a href="inicio.html">Inicio</a>
          <a href="cursos.html">Cursos</a>
          <a href="perfil.html">Perfil</a>
      </nav>
    </div>
  </header>

  <div class="contenedor contenido">
    <main class="contenido-modulo">
      <!--Escribe tu código aquí-->
      <h2>Participantes: <?php echo $resultado->num_rows; ?></h2>

      <div class="Personal contenedor">

      <div class="contenido existentes contenedor"> 
              <table>
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Matricula</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($registros = $resultado->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $registros['nombre']; ?></td>
                            <td><?php echo $registros['matricula']; ?></td>
                            <td>
                              <a href="editar.php?id=<?php echo $registros['id']; ?> ">Editar</a>
                            </td>
                            <td class="borrar">
                              <a href="borrar.php?id=<?php echo $registros['id']; ?> ">Borrar</a>
                            </td>
                          </tr>
                      <?php } ?>
                    </tbody>
              </table>
        </div>
		        
		      
		  	</div>
      
    </main>
    <aside class="sidebar">
      <ul>
        <li><a href="calificaciones.html">Calificaciones</a></li>
        <li><a href="participantes.php">Participantes</a></li>
        <li><a href="tareas.html">Tareas</a></li>
        <li><a href="calendarios.html">Calendarios</a></li>
        <li><a href="foros.html">Foros</a></li>
        <li><a href="mensajes.html">Mensajería</a></li>
      </ul>
    </aside>
  </div>


  <footer class="site-footer seccion">
    <div class="contenedor contenedor-footer">
      <p class="copyright">Todos los derechos reservados &copy;</p>
    </div>

  </footer>


  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
<?php 
    $conn->close();
?>
