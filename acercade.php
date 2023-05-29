
<?php
    include("conexion.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su,Es,Ri.A.C</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">

    <style>
    /* Estilo CSS para el cuerpo de la página */
    body {
      background-color: #d6c8e7; /* Cambia el color de fondo aquí */
    }
  </style>
</head>

<body >
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


   



<!-- datos -->
<h2>Conocenos</h2>
<div class="table-responsive">
  
			<table class="tablita2">
				<?php 

                    $miConsulta = "SELECT * FROM publicacion WHERE seccion = 2;"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
					$sql = mysqli_query($con, $miConsulta);
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['texto'].'</td>
              <td><img src="'.$row['imagen'].'" width="300px"></td>
			  
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
            </div>
    
  
  <footer>
        <div>
            <h2>Redes sociales</h2>

            <a href="#"><img src="img/FacebookL.png" height="50px"> </a>
            <a href="#"><img src="img/youtubeL.png" height="50px"> </a>
            <a href="#"><img src="img/InstagramL.png" height="50px"> </a>
            <a href="#"></a>
        </div>
    </footer>
</body>

</html>