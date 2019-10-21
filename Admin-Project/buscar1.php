<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie-edge">
<link rel="stylesheet" href="css/buscar.css">
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="icono.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Inicio</title>
</head>

<body>
<?php
    include ('navbar.php');
?>

<br>
<section class="container" align="center">
  <h1>Perfiles Recomendados</h1><br>
  <hr>
<?php


include ('conexion.php');

$registros=mysqli_query($conexion,"select NOMBRE,APELLIDO,OFICIO,FOTO, ID from PROFESIONAL where OFICIO ='$_REQUEST[op]' or NOMBRE ='$_REQUEST[op]' or REGION ='$_REQUEST[op]'") or
  die("Problemas en el select:".mysqli_error($conexion));



while ($reg=mysqli_fetch_array($registros))
{
  if(is_null($reg['ID'])){
    echo "
    <script> 
    alertify
      .alert('INDWORK aviso','No se han encontrado coincidencias', function(){
        alertify.message('OK');
        window.location= 'buscar.php';
      });
     </script>";
    
}

else{
     echo '<div class="container">
    <table class="table tabla">
    <thead class="thead-light encabezado">
        <tr>
          
        </tr>
      </thead>
	<tbody>
    <tr>
    <div  class="container">
    
    <div class="cuadro">
		<div class="cuadro-izquierda ">
      <a href="perfil.php?id='.$reg['ID'].'">
      <img  class="foto" src="data:image/jpg;base64,'.base64_encode($reg['FOTO']).'" alt="">
      </a>
		</div>
		<div class="cuadro-derecha ">
			<div>
				<p class="nombre-perfil" >'.$reg['NOMBRE'].' '.$reg['APELLIDO'].'</p>
			</div>
			<div>
				<p class="oficio">'.$reg['OFICIO'].'</p>
			</div>
    </div>
    <div class="visitar centrado">
      <a class="boton nada" href="perfil.php?id='.$reg['ID'].'"> Visitar Perfil </a>
      </div>
    </div>
	</div>
	</tr></tbody></table></div>';
  
}}
?>


	</section>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
