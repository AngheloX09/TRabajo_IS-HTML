<?php
    include("conexion.php");
    session_start();
    if (!isset($_SESSION['rfc'])){
        header ("location: index.html");
    }
    $img='';

    if(isset($_POST['enviar'])) { 

      if(isset($_FILES["imagen"])){
        $file = $_FILES["imagen"];
        $nombre = $file["name"];
        $tipo = $file["type"];
        $ruta_provisional = $file["tmp_name"];
        $size = $file["size"];
        $dimensiones = getimagesize($ruta_provisional);
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "img/";
        if($tipo != 'image/jpg' &&  $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
          echo"Error, el archivo no es una imagen";
        }else if($size > 3*1024*1024){
          echo"Error, el tamaño maximo permitido es de 3mb";
        }else{
          $src = $carpeta.$nombre;
          move_uploaded_file($ruta_provisional,$src);
          $img ="img/".$nombre;
          echo"     Imagen cargada correctamente   ";
  
        }

      }else{
        echo"Publicacion cargada sin imagen adjunta";
      }

      if($_POST['texto'] == '') { 
        echo 'Por favor llene todos los campos correctamente'; 
      } else { 
  

            $texto = $_POST['texto']; 
            $seccion			 = $_POST['seccion'];
            //$imagen = $_POST['imagen']; 
            $sql = "INSERT INTO publicacion (texto,imagen,seccion)VALUES
            ('$texto','$img','$seccion');"; 
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
    <!--<link  href="css/style.css" as="style">-->
    <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <style>
    /* Estilo CSS para el cuerpo de la página */
    body {
      background-color: #d6c8e7; /* Cambia el color de fondo aquí */
    }
  </style>
</head>

<body>
<!-- Navbar -->
<nav class="navbar" style="background-color: #e5daf3;">
  <div class="container-fluid">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="img/logo.png" alt="Bootstrap"  height="60px">
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
          <a class="nav-link" href="pub_contenido.php">Publicar contenido</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_contenido.php">Administrar contenido</a>
        </li>


        
    </div>
  </div>
</nav>
<br>
<br>


								<form id="login-form" method="post" role="form" enctype="multipart/form-data">
                  <table class="tablita2">
                    <tr>
                     <td>
									<div class="form-group">
										<input type="text" name="texto" id="texto" tabindex="1" class="form-control" placeholder="Texto" value="">
									</div>
                  </td> 
                  <td>
									<div class="form-group">
										<input type="file" name="imagen" id="imagen" tabindex="1" class="form-control" placeholder="Imagen" value="">
									</div>
                  </td>
                  <td>
                  <div class="form-group">
                  <div class="col-sm-3">
                    <select name="seccion" >
                      <option value="1">Publicar en Noticias</option>
                      <option value="2">Añadir a Acerca de</option>
                    </select> 
                  </div>
                   
                </div>
                  </td>
                    </tr>
                    <tr>
                      <td>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input class="botinput" type="submit" name="enviar" value="Publicar">
											</div>
										</div>
									</div>
                      </td>
                    </tr>
                  </table>
								</form>
							
	</div>



<script src="loginjs.js"></script>
  
</body>

</html>