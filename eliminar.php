<?php
    include("conexion.php");

    $texto=$_GET['texto'];
    $eliminar= "DELETE FROM publicacion WHERE id='$texto'";

    $reliminar = mysqli_query($con,$eliminar);

    if ($reliminar){
        header("Location: admin_contenido.php");
    } else{
        echo"<script> alert('No se pudo eliminar'); windows.history.go(-1); </script>";
    }

    ?>