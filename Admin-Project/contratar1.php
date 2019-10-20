<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie-edge">
<link rel="shortcut icon" href="icono.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>
<title>Inicio</title>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

<?php
  include ('navbar.php');

  $idreceptor = $_REQUEST['idreceptor'];

  include ('conexion.php');

  if(isset($_SESSION['user'])){

  $id = $_SESSION['user'];
        mysqli_query($conexion,"insert into contratos (ID_EMISOR,ID_RECEPTOR,DESCRIPCION,ASUNTO) values($id,$idreceptor,'$_REQUEST[descripcion]', '$_REQUEST[asunto]')")
          or die("Problemas en el select".mysqli_error($conexion));


        $mensaje = $_REQUEST['descripcion'];
        $asunto= "INDWORK SOLICITUD: ".$_REQUEST['asunto'];
        $correo= $_REQUEST['correoreceptor'];

        if(mail($correo, $asunto , $mensaje)){
          echo "<script> alertify.alert('INDWORK aviso','Solicitud de Contrato enviada Exitosamente!', function(){ alertify.message('OK'); window.location= 'perfil.php?id=".$idreceptor."'; }); </script>";
        }
        else{
          echo "<script> alertify.alert('INDWORK aviso','Error al enviar Solicitud de Contrato!', function(){ alertify.message('OK'); window.location= 'perfil.php?id=".$idreceptor."'; }); </script>";
        }
  }
  
  
	
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>