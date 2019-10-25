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
if(isset($_GET['id'])){

$id = $_GET['id'];
$usuario = $_REQUEST['usuario'];
$estado = $_GET['estado'];

include ('conexion.php');

    if($estado == 'aceptar'){
    $registrost=mysqli_query($conexion,"Update contratos set ESTADO = 'Aceptado' where ID= '$_GET[id]' ") or
      die("Problemas en el select:".mysqli_error($conexion));

      echo "<script> alertify.alert('INDWORK aviso','Solicitud aceptada con exito!',
    function(){ alertify.message('OK'); window.location= 'iniciarseccion.php?id=".$id."'; }); </script>";

        }
        $fecha = date('Y-m-d H:i:s');

    if($estado == 'terminar'){
      $registrost=mysqli_query($conexion,"Update contratos set ESTADO = 'Terminado',FECHA_FIN = '$fecha'  where ID= '$_GET[id]' ") or
        die("Problemas en el select:".mysqli_error($conexion));
      
        echo "<script> alertify.alert('INDWORK aviso','Trabajo terminado!',
       function(){ alertify.message('OK'); window.location= 'iniciarseccion.php?id=".$id."'; }); </script>";
      
          }else if($estado == 'rechazar'){

      
              $registrost=mysqli_query($conexion,"Update contratos set ESTADO = 'Denegado' where ID= '$_GET[id]' ") or
                die("Problemas en el select:".mysqli_error($conexion));
      
                echo "<script> alertify.alert('INDWORK aviso','Solicitud rechazada con exito!',
       function(){ alertify.message('OK'); window.location= 'iniciarseccion.php?id=".$usuario."'; }); </script>";
      
          }

}

?>
</body>
</html>