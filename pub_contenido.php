<?php
    include("conexion.php");
    session_start();
    if (!isset($_SESSION['rfc'])){
        header ("location: index.html");
    }

    if(isset($_POST['enviar'])) { 
      if($_POST['texto'] == '' or $_POST['imagen'] == '') { 
        echo 'Por favor llene todos los campos correctamente'; 
      } else { 
        //$sql = 'SELECT * FROM usuarios'; 
        //$verificar_usuario = 1;
        /*$rec = mysql_query($sql); 
        $verificar_usuario = 0; 
        while($result = mysql_fetch_object($rec)) { 
          if($result->nombres == $_POST['username']) { 
            $verificar_usuario = 1; 
          } 
        } */
        //if($verificar_usuario == 1) { 

            $texto = $_POST['texto']; 
            $imagen = $_POST['imagen']; 
            $sql = "INSERT INTO publicacion (texto,imagen)VALUES
            ('$texto','$imagen');"; 
            $insert = mysqli_query($con,$sql); 
            echo 'Publicacion subida correctamente'; 

        /*} else {
          echo 'Este usuario ya ha sido registrado anteriormente.'; 
        } */
      } 
    }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su,Es,Ri.A.C</title>
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
<!-- Navbar -->
  <header class="header">
        <div class="logo">
            <img src="img/logo.png" alt="logo">
        </div>
        <nav class="nav-links">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="pub_contenido.php">Publicar contenido</a></li>
                <li><a href="admin_contenido.php">Administrar contenido</a></li>
  
            </ul>
        </nav>
    </header>

   <!-- Formulario de login -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="logincss.css" rel="stylesheet">

<link href="css/logincss.css" rel="stylesheet">
<script src="js/loginjs.js"></script>

<!------ Include the above in your HEAD tag ---------->

<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
								<form id="login-form" method="post" role="form">
									<div class="form-group">
										<input type="text" name="texto" id="texto" tabindex="1" class="form-control" placeholder="Texto" value="">
									</div>
									<div class="form-group">
										<input type="text" name="imagen" id="imagen" tabindex="1" class="form-control" placeholder="Imagen" value="">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="enviar" value="Publicar">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



<script src="loginjs.js"></script>
  
</body>

</html>