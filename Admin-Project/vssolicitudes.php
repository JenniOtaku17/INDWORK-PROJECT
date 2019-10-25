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

<?php 
include ('conexion.php');

$registrost=mysqli_query($conexion,"Select c.ID, c.ID_EMISOR, p.NOMBRE , p.APELLIDO, c.DESCRIPCION, c.ASUNTO
From contratos c inner join profesional p
On c.ID_EMISOR = p.ID
 where id_receptor = '$id' and (ESTADO= ' ' or ESTADO = 'visto')") or
  die("Problemas en el select:".mysqli_error($conexion));

while($tr =mysqli_fetch_array($registrost)){

$id_contra = $tr['ID'];
$aceptar = 'aceptar';
$rechazar = "rechazar";

mysqli_query($conexion,"update CONTRATOS set ESTADO = 'visto' where ESTADO =' ' and ID = $id_contra ")
  or die("Problemas en el select".mysqli_error($conexion));

echo"

<tr>

<td>{$tr['NOMBRE']} {$tr['APELLIDO']}</td>
<td>{$tr['ASUNTO']}</td>
<td>{$tr['DESCRIPCION']}</td>
<td> <a href ='solicitudes.php?id=".$id_contra."&estado=".$aceptar."&usuario=".$id."' class ='btn btn-success'>O</a> </td>
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
  <table class = 'table table-stripped'>

  <thead>

  <tr>

  <th>Contratante</th>
  <th>Asunto</th>
  <th>Descripcion</th>
  <th>Fecha</th>
  <th>Terminar Trabajo</th>
  </tr>

  </thead>

  <tbody>
  <?php 

$rg=mysqli_query($conexion,"Select c.ID, c.ID_EMISOR,c.FECHA_INICIO, p.NOMBRE , p.APELLIDO, c.DESCRIPCION, c.ASUNTO
From contratos c inner join profesional p
On c.ID_EMISOR = p.ID
 where id_receptor = '$id' and ESTADO= 'Aceptado'") or
  die("Problemas en el select:".mysqli_error($conexion));

while($tb =mysqli_fetch_array($rg)){

$id_contra = $tb['ID'];
$terminar = 'terminar';

mysqli_query($conexion,"update CONTRATOS set ESTADO = 'visto' where ESTADO =' ' and ID = $id_contra ")
  or die("Problemas en el select".mysqli_error($conexion));

echo"

<tr>

<td>{$tb['NOMBRE']} {$tb['APELLIDO']}</td>
<td>{$tb['ASUNTO']}</td>
<td>{$tb['DESCRIPCION']}</td>
<td>{$tb['FECHA_INICIO']}</td>
<td> <a href ='solicitudes.php?id=".$id_contra."&estado=".$terminar."&usuario=".$id."' class ='btn btn-success'>Terminar</a> </td>

</tr>";

}

?>

</tbody>
</table>

  </div>
</div>
<div class="container">
  
  <button type="button" class="nav-link boton editar" data-toggle="collapse" data-target="#demo3">Trabajos realizados</button>
  <div id="demo3" class="collapse">
  <table class = 'table table-stripped'>

<thead>

<tr>

<th>Contratante</th>
<th>Asunto</th>
<th>Descripcion</th>
<th>Fecha Inicio</th>
<th>Fecha Final</th>
</tr>

</thead>

<tbody>
<?php 
mysqli_set_charset($conexion,'utf8');
$rg=mysqli_query($conexion,"Select c.ID, c.ID_EMISOR,c.FECHA_INICIO,c.FECHA_FIN, p.NOMBRE , p.APELLIDO, c.DESCRIPCION, c.ASUNTO
From contratos c inner join profesional p
On c.ID_EMISOR = p.ID
where id_receptor = '$id' and ESTADO= 'Terminado'") or
die("Problemas en el select:".mysqli_error($conexion));

while($tb =mysqli_fetch_array($rg)){

echo"

<tr>

<td>{$tb['NOMBRE']} {$tb['APELLIDO']}</td>
<td>{$tb['ASUNTO']}</td>
<td>{$tb['DESCRIPCION']}</td>
<td>{$tb['FECHA_INICIO']}</td>
<td>{$tb['FECHA_FIN']}</td>

</tr>";

}

?>

</tbody>
</table>
    <br>
    <br>
  </div>
</div>

<div class="container">

 <button type="button" class="nav-link boton editar" data-toggle="collapse" data-target="#demo4">Trabajos recibidos</button>
 <div id="demo4" class="collapse">
	
  <table class = 'table table-stripped'>

 <thead>

<tr>

<th>Facilitador</th>
<th>Asunto</th>
<th>Descripcion</th>


</tr>

</thead>

<tbody>

<?php 
include ('conexion.php');

mysqli_set_charset($conexion,'utf8');
$registrost=mysqli_query($conexion,"Select c.ID,c.ID_RECEPTOR, c.ID_EMISOR, p.NOMBRE , p.APELLIDO, c.DESCRIPCION, c.ASUNTO
From contratos c inner join profesional p
On c.ID_RECEPTOR = p.ID
 where ID_EMISOR = '$id' and FECHA_FIN != ' ' and ESTADO = 'Terminado' ") or
  die("Problemas en el select:".mysqli_error($conexion));


while($tr =mysqli_fetch_array($registrost)){

  $id_re = $tr['ID_RECEPTOR'];

echo"

<tr>

<td>{$tr['NOMBRE']} {$tr['APELLIDO']}</td>
<td>{$tr['ASUNTO']}</td>
<td>{$tr['DESCRIPCION']}</td>
<td> <a href ='calificar.php?id_re=".$id_re."' class ='btn btn-success'>Valorar Trabajo</a> </td>

</tr>";

}

?>

</tbody>
</table>

</div>
</div>






</body>
</html>