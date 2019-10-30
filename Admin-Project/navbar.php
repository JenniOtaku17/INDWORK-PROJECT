<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="#" />
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/buscar.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
<link href="css/fontawesome.min.css" rel="stylesheet">
<link href="fontawesome/css/brands.css" rel="stylesheet">
<link href="fontawesome/css/solid.css" rel="stylesheet">

<title>Perfil</title>
</head>

<body>

<?php
session_start();
if(isset($_SESSION['user'])){
  $id = $_SESSION['user'];

  include ('conexion.php');
  include ('notificaciones.php');


  if($count>0){
  $usuario=mysqli_query($conexion,"select NOMBRE, APELLIDO, FOTO FROM profesional WHERE ID = $id ")or
  die("Problemas en el select:".mysqli_error($conexion));

  while ($us=mysqli_fetch_array($usuario))
        {

        $foto = $us['FOTO'];

        echo "<nav class='navbar fixed-top bg-dark' width='100%'>
        <a href='index.php'><img src='img/logo.png' height='50px' width=220px'></a>
        <ul class='navbar nav justify-content-end text-white'>


            <li class='nav-item'>
                <a class='nav-link' href='buscar.php'>Buscar</a>
            </li>
            <li class='nav-item '>

                <a class='nav-link perfil-nav' href='iniciarseccion.php'><img class='foto-nav' src='data:image/jpg;base64,".base64_encode($foto)."'>{$us['NOMBRE']} {$us['APELLIDO']}</a>

            </li>

            <i class='fas fa-2x fa-bell icon-white badge' style='color:#64FF32; margin: 0px 4px'>$count</i>

            <li class='nav-item'>
                <a href='cerrarsession.php'><i class='fas fa-sign-out-alt'></i></a>
                <!--<img src='img/cerrar.png' height='35px' width=35px' style='margin: 0px 10px'>-->
            </li>
        </ul>
        </nav>" ;

        }
      }else{
        $usuario=mysqli_query($conexion,"select NOMBRE, APELLIDO, FOTO FROM profesional WHERE ID = $id ")or
        die("Problemas en el select:".mysqli_error($conexion));

        while ($us=mysqli_fetch_array($usuario))
              {

              $foto = $us['FOTO'];

              echo "<nav class='navbar fixed-top bg-dark' width='100%'>
              <a href='index.php'><img src='img/logo.png' height='50px' width=220px'></a>
              <ul class='navbar nav justify-content-end text-white'>



                  <li class='nav-item '>

                      <a class='nav-link perfil-nav' href='iniciarseccion.php'><img class='foto-nav' src='data:image/jpg;base64,".base64_encode($foto)."'>{$us['NOMBRE']} {$us['APELLIDO']}</a>

                  </li>

                  <li class='nav-item'>
                      <a class='nav-link' href='buscar.php'><i class='fas fa-search fa-2x'></i></a>
                  </li>

                  <li class='nav-item'>
                      <a href='cerrarsession.php'><i class='fas fa-sign-out-alt fa-2x' ></i></a>
                  </li>
              </ul>
              </nav>" ;
            }
      }
}else{
    echo '<nav class="navbar fixed-top bg-dark" width="100%">
    <a href="index.php"><img src="img/logo.png" height="50px" width="220px"></a>
    <ul class="navbar nav justify-content-end text-white">
        <li class="nav-item">
            <a class="nav-link" href="iniciarsesion.php">Iniciar Sesion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="registrar.php">Registrarse</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="buscar.php">Visitante</a>
        </li>

    </ul>
</nav>';
}

?>

</body>
</html>
