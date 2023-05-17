<?php
    include("conexion.php");
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su,Es,Ri.A.C</title>
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>

<header class="header">
        <div class="logo">
            <img src="img/logo.png" alt="logo">
        </div>
        <nav class="nav-links">
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="noticias.php">noticias</a></li>
                <li><a href="acercade.html">Acerca de</a></li>
                <li id="contact-us"><a href="contacto.html">Contáctanos</a></li>
                <li><a href="login.php">Iniciar sesion</a></li>
            </ul>
        </nav>
    </header>

    <div class="table-responsive">
			<table class="table table-striped table-hover">
				<?php 

                    $miConsulta = "SELECT * FROM publicacion;"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
					$sql = mysqli_query($con, $miConsulta);
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$row['texto'].'</td>
              <td>'.$row['imagen'].'</td>
			  
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>

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