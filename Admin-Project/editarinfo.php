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
$id= $_SESSION['id'];

include ('conexion.php');

if(isset($id)){
mysqli_query($conexion,"update PROFESIONAL
              SET NOMBRE='$_REQUEST[nombre]',
              APELLIDO='$_REQUEST[apellido]',
              CEDULA='$_REQUEST[cedula]',
              TELEFONO='$_REQUEST[telefono]'
               where ID =$id ") or
die("Problemas en el select:".mysqli_error($conexion));

echo "<script> alertify.alert('INDWORK aviso','Datos Actualizados Exitosamente!',
 function(){ alertify.message('OK'); window.location= 'editar.php?id=".$id."'; }); </script>";

}else{
    echo "<script> alertify.alert('INDWORK aviso','Error al actualizar datos!',
 function(){ alertify.message('OK'); window.location= 'editar.php?id=".$id."'; }); </script>";
}


?>
</body>
</html>