<?php
if(isset($_GET['id'])){

$estado = $_GET['estado'];


if($estado == 'aceptar'){
$conexionn=mysqli_connect("localhost","root","","indwork") or
die("Problemas con la conexión");

$registrost=mysqli_query($conexionn,"Update contratos set ESTADO = 'Aceptado' where ID= '$_GET[id]' ") or
  die("Problemas en el select:".mysqli_error($conexionn));

    }else if($estado == 'rechazar'){
    
        $conexionn=mysqli_connect("localhost","root","","indwork") or
        die("Problemas con la conexión");

        $registrost=mysqli_query($conexionn,"Update contratos set ESTADO = 'Denegado' where ID= '$_GET[id]' ") or
          die("Problemas en el select:".mysqli_error($conexionn));

    }

}

  
    

