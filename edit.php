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

		#imagen_previsualizacion {
          max-width: 300px;
          max-height: 300px;
          display: none;
          border: 1px solid #ccc;
          padding: 5px;
          margin-top: 10px;
        }
		.input-grande {
  font-size: 15px;
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 5px;
  color: black; /* Establece el color del texto en negro */
  resize: vertical; /* Permite redimensionar verticalmente el textarea */
  width: 450px;
  height: 150px;
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
			$img='';
            $miConsulta = "SELECT * FROM publicacion WHERE id = '$nik'"; 
			$sql = mysqli_query($con, $miConsulta);
			if(mysqli_num_rows($sql) == 0){
				header("Location: admin_contenido.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$con->autocommit(false);

				if(isset($_FILES["imagen"])){
					$file = $_FILES["imagen"];
					$nombre = $file["name"];
					$tipo = $file["type"];
					$ruta_provisional = $file["tmp_name"];
					$size = $file["size"];
					//$dimensiones = getimagesize($ruta_provisional);
					//$width = $dimensiones[0];
					//$height = $dimensiones[1];
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

				}
				
				if($_POST['texto']==""){
					$texto	= "";
				}else{
					$texto	= $_POST['texto']; //sha1($_POST['pass']);
				}
			

				//mysqli_real_escape_string($con,(strip_tags($_POST["pass"],ENT_QUOTES)));//Escanpando caracteres 
				$texto		     = $_POST['texto'];//mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				//$imagen	 = $_POST['imagen'];//mysqli_real_escape_string($con,(strip_tags($_POST["correo"],ENT_QUOTES)));//Escanpando caracteres 
				
				try {
					if($img==''){
						$con->query ("UPDATE publicacion SET texto='$texto' WHERE id='$nik'");
					}else{
						$con->query ("UPDATE publicacion SET texto='$texto', imagen='$img' WHERE id='$nik'"); /*Crear el UPDATE para el campo pass igual a variable nik*/
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
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
				<div class="form-group">
					<label class="col-sm-3 control-label">Texto</label>
					<div class="col-sm-2">
						<textarea name="texto" id="texto" class="input-grande"  placeholder="Nuevo texto"><?php echo $row ['texto']; ?></textarea>
						<!--<input type="text" name="texto" value="<?php// echo $row ['texto']; ?>" width="500px" placeholder="Nuevo texto">-->
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">imagen Actual</label>
					<div class="col-sm-4">
					<img src="<?php echo $row ['imagen']; ?>" width="300px"></td>

					<div class="area-soltar" ondragover="manejarDragOver(event)" ondragleave="manejarDragLeave(event)" ondrop="manejarDrop(event)"></div>
					<input type="file" name="imagen" id="file-input" tabindex="1" ondragstart="manejarDragStart(event)" ondragend="manejarDragEnd(event)" onchange="mostrarPrevisualizacion(event)">
                    <img id="imagen_previsualizacion" src="#" alt="Previsualización de la imagen" style="max-width: 300px; max-height: 300px; display: none;">

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
	
	<script>
        function mostrarPrevisualizacion(event) {
          const archivo = event.target.files[0];
          const lector = new FileReader();
          
          lector.onload = function(e) {
            const imagenPrevisualizacion = document.getElementById('imagen_previsualizacion');
            imagenPrevisualizacion.src = e.target.result;
            imagenPrevisualizacion.style.display = 'block';
          };
          
          lector.readAsDataURL(archivo);
        }
      </script>
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