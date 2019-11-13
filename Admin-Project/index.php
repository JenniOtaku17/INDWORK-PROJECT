
<?php
        include ('navbar.php');
    ?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Inicio | INDWORK</title>
    
</head>

<body>

    <!--------------------Container------------------------>

    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="imagen-principal" src="img/primera.jpg" width="100%">
                <!--height="585"-->
            </div>
            <div class="carousel-item">
                <img class="imagen-principal" src="img/segunda.jpg" width="100%">
                <!--height="585"-->
            </div>
            <div class="carousel-item">
                <img class="imagen-principal" src="img/tercera.jpg" width="100%">
                <!--height="585"-->
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>


    <style>
        @media screen and (max-width: 600px) {
        .categoria {
            width: 100%;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;
        }
        .parrafo {
            width: 90%;
            margin: 70px auto;
            text-align: center;
        }
        .contratante {
            width: 90%;
            margin: 50px auto;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-content: center;
        }
        .vl {
            border-right: none;
            border-bottom: 1px solid gray;
            width: 90%;
            margin: 0 auto;
        }
    }
        </style>

    <div class="categoria ">
        <div class="contratante  ">
            <h2>Buscas a quien contratar?</h2>
            <p class="parrafo ">Tenemos una seleccion de profesionales esperando para ser contratados por ti, quieres contratar ya?</p>
            <a href="buscar.php" class="nav-link boton paddings">Buscar Profesionales</a>
        </div>
        <div class="vl"> </div>
        <div class="contratante ">
            <h2>Eres un Profesional?</h2>
            <p class="parrafo "> Ven y unete a INDWORK para que seas contratado por tu profesion, quieres unirte ya?</p>
            <a href="registrar.php" class="nav-link boton paddings">Registrarme</a>
            <!--quitar ancho-20 espacio-abajo-->
        </div>
    </div>

    <hr>

    <div class="contenido margen">
        <div class="subtitulo text-center margen"><b>Colaboradores</b></div>

        <div class="colaboradores margen">

            <div class="persona">
                <img class="imagen" src="img/Dairy.png" alt="Dairy Encarnacion">
                <div class="nombres">
                    <p class="nombre text-center">Dairy Figueroa</p>
                    <p class="text-center">Diseñadora Web</p>
                </div>
            </div>

            <div class="persona">
                <img class="imagen" src="img/Jeremy1.png" alt="Jeremy Mezon">
                <div class="nombres">
                    <p class="nombre text-center">Jeremy Mezon</p>
                    <p class="text-center">Diseñador Web</p>
                </div>
            </div>

            <div class="persona">
                <img class="imagen" src="img/Hendrick.png" alt="Hendrick Garcia">
                <div class="nombres">
                    <p class="nombre text-center">Hendrick Garcia</p>
                    <p class="text-center">Programador Web</p>
                </div>
            </div>

            <div class="persona">
                <img class="imagen" src="img/rafa.png" alt="Rafael Ogando">
                <div class="nombres">
                    <p class="nombre text-center">Rafael Ogando</p>
                    <p class="text-center">Programador Web</p>
                </div>
            </div>

            <div class="persona">
                <img class="imagen" src="img/Dairy.png" alt="Jennifer De Los Santos L">
                <div class="nombres">
                    <p class="nombre text-center">Jennifer De Los Santos L</p>
                    <p class="text-center">Administradora de Proyectos</p>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
