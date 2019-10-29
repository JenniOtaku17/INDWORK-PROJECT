<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie-edge">
<link rel="shortcut icon" href="#" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/iniciarsesion.css">
<link href="css/fontawesome.min.css" rel="stylesheet">
<link href="fontawesome/css/brands.css" rel="stylesheet">
<link href="fontawesome/css/solid.css" rel="stylesheet">
<title>Iniciar Sesion</title>
</head>

<body>

<?php
error_reporting(0);
    include ('navbar.php');

?>

<br>

<!--------------------Container------------------------>
<?php
session_start();

if(isset($_SESSION['user'])){

    echo "<script>  window.location= 'iniciarseccion.php'; </script>";
}else{

    echo '<section class="container">
	<div class="d-flex justify-content-center">
  <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
	<div class="form-group w-75">
  <br>
  <h1 align="center">INICIAR SESION</h1>
  <br>
  <br>
	<form action="iniciarseccion.php" method="post">
  <div class="group">
    <input type="text" name="correo"><span class="highlight" required></span><span class="bar"></span>
    <label><i class="fas fa-user"></i> Correo</label>
  </div>
  <div class="group">
    <input type="password" name="password" onclick= "none"><span class="highlight" required></span><span class="bar"></span>
    <label><i class="fas fa-unlock"></i> Contraseña</label>
  </div>

	<button type="submit" class="button buttonBlue" name="login">INICIAR SESION
  <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
  </button>
  <div class="sign-up">
     No tienes una cuenta? <a href="registrar.php">Registrate</a>
  </div>
  </form>
  </div>
  </div>
</section>';

}

?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="js/script.js" language="Javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
