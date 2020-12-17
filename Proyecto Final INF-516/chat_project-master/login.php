<?php include "layouts/header.php"; ?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  .container {
    margin-top: 5%;
    width: 50%;
    background-color: #26262b9e;
    padding-top:5%;
    padding-bottom:5%;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
}
  </style>

  
<?php
/* Aqui Verifica si existe el correo y contraseña en la base de datos y si es correcta*/
  include "config.php";
  if($_POST)
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		/*El comando SELECT se utiliza para recuperar datos de una o más tablas. ... La cláusula FROM se utiliza para especificar uno o más argumentos de tipo ref_tabla para la o las tabla(s) de las cuales los datos se van a recuperar.*/
    $sql = "SELECT * FROM `register` where email = '".$email."' and password = '".$password."' ";
    /*mysqli_query combina la ejecución de sentencias y el almacenamiento en buffer de conjuntos de resultados. Las aplicaciones de PHP pueden navegar libremente a través de resultados almacenados en buffer*/
		$query =  mysqli_query($conn, $sql);
		if(mysqli_num_rows($query)>0)
		{
      $row = mysqli_fetch_assoc($query);
      /* session_start — Iniciar una nueva sesión o reanudar la existente */
			session_start();
			$_SESSION['name'] = $row['name'];
			header('Location: home.php');
    	}
		else
		{
			echo "<script> alert('Correo o contraseña incorrectas.'); </script>";
		}
	}
?>

<div class="container">
  <center><h2>Formulario de Registro</h2></center></br>
  <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Correo:</label>
	  
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="ingresa tu correo" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Pass:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="ingresa una contraseña" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
