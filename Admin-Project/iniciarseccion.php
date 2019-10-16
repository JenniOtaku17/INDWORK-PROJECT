<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie-edge">
<link rel="shortcut icon" href="#" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/registrar.css">
<link rel="stylesheet" href="css/perfil.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
<title>Perfil</title>
</head>

<body>
	
  <!-----------------Navigation------------------->

<nav class="navbar navbar-default bg-dark">
  <img src="img/logo.png" height="50px" width="220px" />
  <ul class="navbar nav justify-content-end text-white">
    <li class="nav-item">
      <a class="nav-link" href="buscar.html">Visitante</a>
    </li>
     <li class="nav-item" >
      <a class="nav-link" href="inicio.html">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cerrarsession.php"><img src="cerrar.png" height="40px" width="40px" alt="Cerrar Session"/></a>
    </li>
  </ul>
</nav>

<br>
<br>

<!--------------------Container------------------------>

<section class="container" align="center">




<?php
session_start();
error_reporting(0);
$conexion=mysqli_connect("localhost","root","","indwork") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select ID, CEDULA,NOMBRE,CV,FOTO,PASSWORD,OFICIO,APELLIDO,TELEFONO,DIRECCION,REGION,PAIS,ME from PROFESIONAL where CORREO ='$_REQUEST[correo]' or ID='$_GET[id]'") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
	$_SESSION['id']= $reg['ID'];

	$id= $reg['ID'];
	if($_REQUEST['password']== $reg['PASSWORD'] or  isset($_REQUEST['id'])){

	echo "<script>swal('Bienvenid@ a tu Perfil ".$reg['NOMBRE']."');</script>";
	echo '<div class="container">
	<div class="cuadro ">
		<div class="cuadro-izquierda ">
			<img class="foto" src="data:image/jpg;base64,'.base64_encode($reg['FOTO']).'" alt="">
		</div>
		<div class="cuadro-derecha ">
			<div>
				<p class="nombre-perfil">'.$reg['NOMBRE'].' '.$reg['APELLIDO'].'</p>
			</div>
			<div>
				<p class="oficio">'.$reg['OFICIO'].'</p>
			</div>
			<div>
				<p class="descripcion">'.$reg['ME'].'</p>
			</div>
		</div>
	</div>

	<div class="cuadro borde-oscuro ">
		<div class="datos-izquierda ">
			<p class="datos-d">Cedula: </p>
			<p class="datos-d">Telefono: </p>
			<p class="datos-d">Pais: </p>
			<p class="datos-d">Region: </p>
			<p class="datos-d">Direccion: </p>
		</div>
		<div class="datos-derecha ">
			<p class="datos-p">'.$reg['CEDULA'].'</p>
			<p class="datos-p">'.$reg['TELEFONO'].'</p>
			<p class="datos-p">'.$reg['PAIS'].'</p>
			<p class="datos-p">'.$reg['REGION'].'</p>
			<p class="datos-p">'.$reg['DIRECCION'].'</p>
		</div>
		<div class="espacio-editar">
			<a href = "archivo.php?id='.$id.'" target = "_blank" class="nav-link boton editar">Mi Curriculum</a>
			<a href = "editar.php?id='.$id.'" target = "_blank" class="nav-link boton editar">Editar Perfil</a>
		</div>
	</div>
</div>

		
		
	    </div>';

	}else{

		echo "<script> alertify.alert('INDWORK aviso','No fue posible iniciar sesion, verifica los datos!', function(){ alertify.message('OK'); window.location= 'iniciarseccion.html'; }); </script>";

	}

}

?>

<div class="container">
<h3>Haz clic para ver tus trabajos</h3>

 <button type="button" class="nav-link boton editar" data-toggle="collapse" data-target="#demo">Solicitudes de Trabajo</button>
<div id="demo" class="collapse">
	
  <table class = 'table table-stripped'>

<thead>

<tr>

<th>Contratante</th>
<th>Asunto</th>
<th>Descripcion</th>
<th>Aceptar</th>
<th>Rechazar</th>
</tr>

</thead>

<tbody>

<?php $conexionn=mysqli_connect("localhost","root","","indwork") or
    die("Problemas con la conexión");

$registrost=mysqli_query($conexionn,"Select c.ID, c.ID_EMISOR, p.NOMBRE , p.APELLIDO, c.DESCRIPCION, c.ASUNTO
From contratos c inner join profesional p
On c.ID_EMISOR = p.ID
 where id_receptor = '$id' and ESTADO= ' '") or
  die("Problemas en el select:".mysqli_error($conexionn));

while($tr =mysqli_fetch_array($registrost)){

$id_contra = $tr['ID'];
$aceptar = 'aceptar';
$rechazar = "rechazar";

echo"

<tr>

<td>{$tr['NOMBRE']}</td>
<td>{$tr['ASUNTO']}</td>
<td>{$tr['DESCRIPCION']}</td>
<td> <a href ='solicitudes.php?id=".$id_contra."&estado=".$aceptar."' class ='btn btn-success'><i class='fas fa-check-circle'></i></a> </td>
<td> <a href ='solicitudes.php?id=".$id_contra."&estado=".$rechazar."' class ='btn btn-danger'>X</a> </td>

</tr>";

}

?>

</tbody>
</table>

</div>
</div>

<div class="container">

  <button type="button" class="nav-link boton editar" data-toggle="collapse" data-target="#demo2">Trabajos en Progreso</button>
  <div id="demo2" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
</div>
<div class="container">
  
  <button type="button" class="nav-link boton editar" data-toggle="collapse" data-target="#demo3">Trabajos realizados</button>
  <div id="demo3" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
