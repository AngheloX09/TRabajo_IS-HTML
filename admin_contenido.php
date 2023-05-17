
<?php
    include("conexion.php");
    session_start();
    if (!isset($_SESSION['rfc'])){
        header ("location: index.html");
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su,Es,Ri.A.C</title>
	<link rel="stylesheet" type="text/css" href="/css/useradmin.css">
    <link rel="stylesheet" href="/css/style.css">
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

  <header>
		<h2>Administrador de publicaciones</h2>
	</header>
	<main>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
			<tr>
                    <th>Texto</th>
					<th>Imagen</th>
                    <th>Acciones</th>
				</tr>
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
			  <td>

								<a href="edit.php?nik='.$row['texto'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="eliminar.php?texto='.$row['texto'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar la publicacion?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>

	</main>
	<footer>
		<p>Modo admin</p>
	</footer>
</body>
</html>