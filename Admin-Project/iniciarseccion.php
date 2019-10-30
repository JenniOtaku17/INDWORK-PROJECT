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

<?php
echo 'hola';
error_reporting(0);
session_start();
if( ($_REQUEST['correo'] != ' ' and $_REQUEST['password'] !=  '') or isset($_SESSION['user']) ){
include ('conexion.php');

$registros=mysqli_query($conexion,"select ID, CEDULA,NOMBRE,CV,FOTO,PASSWORD,OFICIO,APELLIDO,TELEFONO,DIRECCION,REGION,PAIS,ME from profesional where CORREO ='$_REQUEST[correo]' or ID= '$_SESSION[user]'") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
	if($_REQUEST['password']== $reg['PASSWORD'] or  isset($_SESSION['user'])){

	$_SESSION['user']= $reg['ID'];
	$id= $reg['ID'];
	include ('navbar.php');
?>

<br>
<br>


<section class="container" align="center">




<?php

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
		include ('valoraciones.php');
		echo '<div id="midcontentadcontainer" style="overflow:auto;text-align:center">
		<!-- MidContent -->
		
		  <!--<pre>mid_content, all: [300,250][336,280][728,90][970,250][970,90][320,50][468,60]</pre>-->
		  <div id="snhb-mid_content-0"></div>
			
		</div>
		
		
		<h2>Listado de Trabajos</h2><br>
		<iframe  class="spytest" src="vssolicitudes.php" style="margin-bottom:10px;border:1px solid #ebebeb;border-radius:4px; width:100%; height:450px;" scrolling="yes" frameborder="0"></iframe>
		
		</div>';

	}else{

		echo "<script> alertify.alert('INDWORK aviso','No fue posible iniciar sesion, verifica los datos!', function(){ alertify.message('OK'); window.location= 'iniciarsesion.php'; }); </script>";

	}

}

}else{
	echo "<script> alertify.alert('INDWORK aviso','No fue posible iniciar sesion, verifica los datos!', function(){ alertify.message('OK'); window.location= 'iniciarsesion.php'; }); </script>";
}

?>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
