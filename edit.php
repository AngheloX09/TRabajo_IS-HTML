<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de usuarios con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : https://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos de Publicacion</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container">
		<div class="content">
			<h2>Datos de la publicacion &raquo; Editar datos</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
            //Buscar en el campo pass el dato que coindica con la variable $nik para editar el registro
            $miConsulta = "SELECT * FROM publicacion WHERE texto = '$nik'"; 
			$sql = mysqli_query($con, $miConsulta);
			if(mysqli_num_rows($sql) == 0){
				header("Location: admin_contenido.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$con->autocommit(false);

				if($_POST['texto']==""){
					$texto	= "";
				}else{
					$texto	= $_POST['texto']; //sha1($_POST['pass']);
				}

				//mysqli_real_escape_string($con,(strip_tags($_POST["pass"],ENT_QUOTES)));//Escanpando caracteres 
				$texto		     = $_POST['texto'];//mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$imagen	 = $_POST['imagen'];//mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));//Escanpando caracteres 
				//$rfc	 = $_POST['rfc'];//mysqli_real_escape_string($con,(strip_tags($_POST["rfc"],ENT_QUOTES)));//Escanpando caracteres 
				//$pass	     = $_POST['pass'];//mysqli_real_escape_string($con,(strip_tags($_POST["pass"],ENT_QUOTES)));//Escanpando caracteres 
				//$tipo			 = $_POST['tipo'];//mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));//Escanpando caracteres  
				/*
                if($_POST['pass']==""){
					$miConsulta = "UPDATE usuarios SET nombre='$nombre' , correo= '$correo', rfc= '$rfc' , pass= '$pass' , telefono= '$telefono' , puesto= '$puesto' , tipo= '$tipo' WHERE pass='$nik'";
				}else{
					$miConsulta = "UPDATE usuarios SET pass='$pass', nombre='$nombre' , correo= '$correo', rfc= '$rfc' , pass= '$pass' , telefono= '$telefono' , puesto= '$puesto' , tipo= '$tipo' WHERE pass='$nik'"; /*Crear el UPDATE para el campo pass igual a variable nik*/
				//}
				
				try {
					if($_POST['texto']==""){
					}else{
						$con->query ("UPDATE publicacion SET texto='$texto', imagen='$imagen' WHERE texto='$nik'"); /*Crear el UPDATE para el campo pass igual a variable nik*/
					}

					//$con->mysqli_query($con, $miConsulta) or die(mysqli_error());
					$con->commit();
					$update="si";
				} catch (Exception $e) {
					$con->rollback();
					echo 'Algo fallo: ',  $e->getMessage(), "\n";
				}

				//$update = mysqli_query($con, $miConsulta) or die(mysqli_error());


				if($update=="si"){
					header("Location: edit.php?nik=".$nik."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Texto</label>
					<div class="col-sm-2">
						<input type="text" name="texto" value="<?php echo $row ['texto']; ?>" class="form-control" placeholder="Nuevo texto">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">imagen</label>
					<div class="col-sm-4">
						<input type="text" name="imagen" value="<?php echo $row ['imagen']; ?>" class="form-control" placeholder="Nueva imagen">
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="admin_contenido.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>