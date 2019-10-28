<!--<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="#" />-->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<link rel="stylesheet" href="css/perfil.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
<!--<title>Perfil</title>
</head>

<body>-->


<style>

/*.wrap{
	width: 100%;
	max-width: 90%;
	margin: 30px auto;
}*/


ul.tabs{
	width: 100%;
	background: #363636;
	list-style: none;
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
}

ul.tabs li a{
	color: #fff;
	text-decoration: none;
	font-size: 16px;
	text-align: center;

	display: block;
	padding: 20px 0px;
}

ul.tabs li{
  width: 90%;
}

ul.tabs li:hover {
  background-color: #169BD5;
  transition-duration: 0.3s;
}

.active{
	background: #0984CC;
}

ul.tabs li a .tab-text{
	margin-left: 8px;
}

.secciones{
	width: 100%;
	background: #fff;
}

.secciones article{
	padding: 30px;
}

.secciones article p{
	text-align: justify;
}


@media screen and (max-width: 700px){
	ul.tabs li{
		width: none;
		flex-basis: 0;
		flex-grow: 1;
	}
}

@media screen and (max-width: 450px){
	ul.tabs li a{
		padding: 15px 0px;
	}

	ul.tabs li a .tab-text{
		display: none;
	}

	.secciones article{
		padding: 20px;
  }
  
  .tema-tabla{
    padding: 25px 0px;
  }
}

</style>

<div class="contenedor-solicitudes">
<div class="container">
<h1 style="margin: 100px 0px">Haz clic para ver tus trabajos</h1>

<div class="wrap">
		<ul class="tabs">
			<li><a href="#demo" data-toggle="collapse" data-target="#demo"><span class="fa fa-home"></span><span class="tab-text">Solicitudes de Trabajo</span></a></li>
			<li><a href="#demo2"data-toggle="collapse" data-target="#demo2"><span class="fa fa-group"></span><span class="tab-text">Trabajos en Progreso</span></a></li>
			<li><a href="#demo3" data-toggle="collapse" data-target="#demo3"><span class="fa fa-briefcase"></span><span class="tab-text">Trabajos realizados</span></a></li>
			<li><a href="#demo4" data-toggle="collapse" data-target="#demo4"><span class="fa fa-bookmark"></span><span class="tab-text">Trabajos recibidos</span></a></li>
    </ul>
    
    <div class="secciones">
			<article id="demo">
      
      <h2 align="center" class="tema-tabla">Solicitudes</h2>
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
<br>
      
</article>
<article id="demo">
<div id="demo2" class="collapse">
<h2 align="center" class="tema-tabla">En Progreso</h2>
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
<br>
  </div>
</article>
<article id="demo">
<div id="demo3" class="collapse">
<h2 align="center" class="tema-tabla">Realizados</h2>
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
    
  </div>
</article>
<article id="demo">
<div id="demo4" class="collapse">
<h2 align="center" class="tema-tabla">Recibidos</h2>
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
<br>
</div>
</article>
</div>
</div>
</div>
</div>			


</div>

<div class="pie linea" style=" margin: 50px 0px;
    width: 100%;
    height: 150px;
    padding: 300px auto;
    background-color: rgb(28, 39, 39);
    color: white;">
	<p class="texto-pie" style="text-align: center; margin: auto;">Esta Zona fue creada para dar mas espacio y creatividad a la pagina @Jeremy</p>
</div>

<script>

$('ul.tabs li a:first').addClass('active');
	$('.secciones article').hide();
	$('.secciones article:first').show();

	$('ul.tabs li a').click(function(){
		$('ul.tabs li a').removeClass('active');
		$(this).addClass('active');
		$('.secciones article').hide();

		var activeTab = $(this).attr('href');
		$(activeTab).show();
		return false;
	});

</script>

