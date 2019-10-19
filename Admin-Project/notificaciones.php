<?php 

include ('conexion.php');

$notificaciones =  mysqli_query($conexion,"Select ID from contratos
 where id_receptor = '$id' and ESTADO= ' '") or
  die("Problemas en el select:".mysqli_error($conexion));

$count = 0;
  while($cantidad =mysqli_fetch_array($notificaciones)){
    $count = $count +1;
  } 

?>