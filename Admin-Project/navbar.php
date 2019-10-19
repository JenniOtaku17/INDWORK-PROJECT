<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="#" />
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
<title>Perfil</title>
</head>

<body>

<?php
session_start();
if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];

  include ('conexion.php');

  $usuario=mysqli_query($conexion,"select NOMBRE, APELLIDO, FOTO FROM PROFESIONAL WHERE ID = $id ")or
  die("Problemas en el select:".mysqli_error($conexion));
  
  while ($us=mysqli_fetch_array($usuario))
        {
        
        $foto = $us['FOTO'];

        echo "<nav class='navbar navbar-default bg-dark' width='100%'>
        <img src='img/logo.png' height='50px' width=220px'>
        <ul class='navbar nav justify-content-end text-white'>
            <li class='nav-item'>
                <a class='nav-link' href='buscar.php'>Buscar</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='inicio.html'>Inicio</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' href='Iniciarseccion.php'>{$us['NOMBRE']} {$us['APELLIDO']}</a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' href='Iniciarseccion.php'></a>
            </li>

            <li class='nav-item'>
                <a class='nav-link' href='cerrarsession.php'>Cerrar Sesion</a>
            </li>
        </ul>
        </nav>" ;

        }

}else{
    echo '<nav class="navbar navbar-default bg-dark" width="100%">
    <img src="img/logo.png" height="50px" width="220px">
    <ul class="navbar nav justify-content-end text-white">
        <li class="nav-item">
            <a class="nav-link" href="iniciarseccion.html">Iniciar Sesion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="registrar.php">Registrarse</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="buscar.php">Visitante</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="inicio.html">Inicio</a>
        </li>
    </ul>
</nav>';
}

?>

</body>
</html>