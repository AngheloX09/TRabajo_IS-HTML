<?php
    require 'conexion.php';

	
		if(isset($_POST['login-submit'])){
    if (!empty($_POST['user'])){
        session_start();
        $usuario = $_POST['user'];
        $password=$_POST['pass'];
		$tipo=$_POST['tipo'];
        $shassword = sha1($password);

		//$encriptada ="SELECT codigo FROM empleados WHERE codigo='$usuario'";

        $query =  "SELECT COUNT(*) as contar FROM usuarios WHERE 
        nombre = '$usuario' AND pass='$password'"; //cambiar por contraseña encriptada despues
        $consulta = mysqli_query($con,$query);
        $array = mysqli_fetch_array($consulta);
		
		$consu=mysqli_query($con,"SELECT rfc FROM usuarios WHERE nombre='$usuario'");
		$row=mysqli_fetch_assoc($consu);
        if ($array['contar']>0 ){
			/*if($tipo == "1" or $tipo == "2"){
				$_SESSION['rfc'] = $usuario;
            header ("location:admin_contenido.php");
			}
			elseif($tipo == "3"){
				$_SESSION['nombres'] = $usuario;
            header ("location: admin_contenido.php");
			}
			else{
				echo"Ingresa el tipo";
			}*/
			$_SESSION['rfc'] = $usuario;
            header ("location: admin_contenido.php?name=$row[rfc]");
        }else{
            echo "usuario incorrecto"; 
        }
    }
}

	if(isset($_POST['enviar'])) { 
		if($_POST['username'] == '' or $_POST['password'] == '' or $_POST['confirm-password'] == '' or $_POST['rfc'] == '' or $_POST['correo'] == ''  or $_POST['estado'] == '') { 
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
				if($_POST['password'] == $_POST['confirm-password']) { 
					$usuario = $_POST['username']; 
					$password = $_POST['password']; 
					$shapassword = sha1($password);
					$correo = $_POST['correo']; 
					$rfc = $_POST['rfc']; 
					$estado = $_POST['estado']; 
					$sql = "INSERT INTO usuarios (nombre,correo,rfc,tipo,pass)VALUES
					('$usuario','$correo','$rfc','$estado','$password');"; 
					$insert = mysqli_query($con,$sql); 
					echo ' Usted se ha registrado correctamente.'; 
				} else { 
					echo 'Las claves no son iguales, intente nuevamente.'; 
				} 
			/*} else {
				echo 'Este usuario ya ha sido registrado anteriormente.'; 
			} */
		} 
	}

?>

<html>

<head>
  <title>Iniciar sesión</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  
  <link rel="preload" href="http://localhost/Proyecto-IS/css/style.css" as="style">
  <link rel="stylesheet" href="http://localhost/Proyecto-IS/css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

	<style>
    /* Estilo CSS para el cuerpo de la página */
    body {
      background-color: #d6c8e7; /* Cambia el color de fondo aquí */
    }
  </style>
</head>

<body class="body-login">
  <!-- Navbar -->
  <nav class="navbar" style="background-color: #e5daf3;">
  <div class="container-fluid">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo3.png" alt="Bootstrap"  height="60px">
    </a>
  </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="noticias.php">Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="acercade.php">Acerca de</a>
        </li><li class="nav-item">
          <a class="nav-link" href="contacto.php">Contactanos</a>
        </li><li class="nav-item">
          <a class="nav-link" href="login.php">Iniciar sesion</a>


        
    </div>
  </div>
</nav>


    <br>
	<br>
	<br>
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
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<!--- <a href="#" id="register-form-link">Register</a> --->
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="login.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="user" id="user" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="pass" id="pass" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<!-- <input type="text" name="tipo" id="tipo" tabindex="3" class="form-control" placeholder="Tipo(1,2,3)"> -->
									</div>
				
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="botinput" value="Iniciar sesion">
											</div>
										</div>
									</div>
									
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



<script src="loginjs.js"></script>

  
</html>

