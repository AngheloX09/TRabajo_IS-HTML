
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

  <header>
		<h2>Administrador de publicaciones</h2>
	</header>
	<main>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
			<tr>
                    <th>Texto</th>
					<th>Imagen</th>
					<th>Seccion</th>

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
							<td><img src="'.$row['imagen'].'" width="300px"></td>
							<td>';
							if($row['seccion'] == '1'){
								echo '<span class="label label-success">Noticias</span>';
							}
                            else if ($row['seccion'] == '2' ){
								echo '<span class="label label-info">Acerca de</span>';
							}
                            else if ($row['seccion'] == '3' ){
								echo '<span class="label label-warning">contacto</span>';
							}
						echo '
							</td>

			  			<td>

								<a href="edit.php?nik='.$row['texto'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true">Editar</span></a>
								<a href="eliminar.php?texto='.$row['texto'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar la publicacion?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>

			<h2>Administrar el carrusel</h2>


			<table class="table table-striped table-hover">
			<tr>
                    <th>Texto</th>
					<th>Imagen</th>
					<th>Posicion</th>

                    <th>Acciones</th>
				</tr>
				<?php 

                    $miConsulta = "SELECT * FROM carrusel;"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
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
							<td>'.$row['posicion'].'</td>

			  			<td>

								<a href="editc.php?nik='.$row['texto'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true">Editar</span></a>
								<a href="eliminar.php?texto='.$row['texto'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar la publicacion?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</span></a>
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