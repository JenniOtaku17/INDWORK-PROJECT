
<?php
error_reporting(0);
    include ('navbar.php');

?>

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

	<style>

.conte {
    width: 95%;
    margin: 0px auto;

}

@media screen and (max-width: 500px){

label {
    color: #999;
    font-size: 18px;
    font-weight: normal;
    position: absolute;
    pointer-events: none;
    left: 0px;
    top: 10px;
    transition: all 0.2s ease;
}

form {
    width: 100%;
    margin: 4em auto;
    padding: 3em 2em 2em 2em;
    background: #fafafa;
    border: 1px solid #ebebeb;
    box-shadow: rgba(0, 0, 0, 0.14902) 0px 1px 1px 0px, rgba(0, 0, 0, 0.09804) 0px 1px 2px 0px;
}

form label{
  font-size: 1em;
}

.button {
    position: relative;
    display: inline-block;
    padding: 12px 24px;
    margin: .3em 0 1em 0;
    width: 100%;
    vertical-align: middle;
    color: #fff;
    font-size: 1em;
    line-height: 20px;
    -webkit-font-smoothing: antialiased;
    text-align: center;
    letter-spacing: 1px;
    background: transparent;
    border: 0;
    border-bottom: 2px solid #3160B6;
    cursor: pointer;
    transition: all 0.15s ease;
}

.button:focus {
    outline: 0;
}


/* Button modifiers */

.buttonBlue {
    background: #4a89dc;
    text-shadow: 1px 1px 0 rgba(39, 110, 204, .5);
}

.buttonBlue:hover {
    background: #357bd8;
}

}
</style>

	
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
