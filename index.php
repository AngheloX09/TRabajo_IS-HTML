<?php
    include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su,Es,Ri.A.C</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!-- CSS -->
    <link rel="preload" href="css/style.css" as="style">
    <link rel="stylesheet" href="css/style.css">
    <style>
    /* Estilo CSS para el cuerpo de la página */
    body {
      background-color: #e5daf3; /* Cambia el color de fondo aquí */
    }
  </style>

</head>

<body>
    <!--<a href="https://prod.liveshare.vsengsaas.visualstudio.com/join?7AC59D5DFDF549D7D6B7097CEE6EF4D0B654">Colaborar xD</a>-->
<nav class="navbar" style="background-color: #d6c8e7;">
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
    
    <main>
        <!-- Carrousel -->

        <?php 

        $miConsulta = "SELECT * FROM carrusel  WHERE posicion=1"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
        $sql = mysqli_query($con, $miConsulta);
        $row = mysqli_fetch_assoc($sql);





       /* if(mysqli_num_rows($sql) == 0){
        echo 'No hay datos para el carrusel.';
        }else{
        $no = 1;
        echo'
        
        
        
        ';


        while($row = mysqli_fetch_assoc($sql)){
            echo '



            


            <tr>
                <td>'.$row['texto'].'</td>
        <td><img src="'.$row['imagen'].'" width="300px"></td>

            </tr>
            ';
            $no++;
        }
        }*/

        echo'
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
        
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="'.$row['imagen'].'" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>'.$row['titulo'].'</h5>
                        <p>'.$row['texto'].'</p>
                    </div>
                </div>
                ';
                $miConsulta = "SELECT * FROM carrusel  WHERE posicion=2"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
                $sql = mysqli_query($con, $miConsulta);
                $row = mysqli_fetch_assoc($sql);
                echo'
                <div class="carousel-item">
                    <img src="'.$row['imagen'].'" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>'.$row['titulo'].'</h5>
                        <p>'.$row['texto'].'</p>
                    </div>
                </div>
                ';
                $miConsulta = "SELECT * FROM carrusel  WHERE posicion=3"; //crear una consulta que muestre a todos los empleados de la tabla empleados ordenadas por el campo código
                $sql = mysqli_query($con, $miConsulta);
                $row = mysqli_fetch_assoc($sql);
                echo'
                <div class="carousel-item">
                    <img src="'.$row['imagen'].'" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>'.$row['titulo'].'</h5>
                        <p>'.$row['texto'].'</p>
                    </div>
                </div>
            </div>
            ';

            echo'
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        ';

        ?>

        <!-- Header 1 -->
        <h1>Somos una asociación civil sin fines de lucro compuesta por jóvenes que quieren un cambio positivo.
        </h1>
        <!-- info containter -->
        <section class="info-container">
            <div class="description">
                <!-- Marco etico -->
                <h2 class="title">Marco ético</h2>
                <p>
                    Llegar a ser la Asociación Civil de jóvenes más importante e influyente a nivel nacional e
                    internacional, gracias a que promovemos el cambio de conciencia en las futuras
                    generaciones mediante el desarrollo de resiliencia en cada una de las comunidades que
                    atendemos.
                </p>
            </div>
            <!-- mision & vision -->
            <div class="mision_vision">
                <div class="mision">
                    <h3 class="subtitle">Misión</h3>
                    <p>Contribuir en el desarrollo integral familiar enfocándonos principalmente en los niños en
                        estado marginal de nuestro país, desde un punto de vista alimenticio, educativo y
                        emocional.</p>
                </div>
                <div class="vision">
                    <h3 class="subtitle">Visión</h3>
                    <p>Llegar a ser la Asociación Civil de jóvenes más importante e influyente a nivel nacional e
                        internacional, gracias a que promovemos el cambio de conciencia en las futuras
                        generaciones mediante el desarrollo de resiliencia en cada una de las comunidades que
                        atendemos.</p>
                </div>
            </div>
        </section>
    <p id="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam exercitationem rem incidunt
    velit. Inventore necessitatibus consectetur animi veniam placeat id, maiores quod distinctio hic culpa vitae
    nisi nihil nulla harum.
    </p>
    </main>

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