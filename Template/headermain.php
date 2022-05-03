<?php
    session_start();
    require 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png">
    <!--Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Fuentes link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&family=Oswald:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!--Estilos link -->
    <link rel="stylesheet" href="css/styles.css">
    <title>Renueva</title>
</head>

<body>

    <header class="container-fluid bg-header">
        <nav class="navbar navbar-expand-lg navbar-light lnav animate__animated  animate__rubberBand">
            <div class="container-fluid ">
                <div class="col-md-6">
                    <a class="navbar-brand" id="logo" href="../../index.php">
                        <img src="img/logo.png" alt="" width="100" height="60" class="d-inline-block align-text-center">
                        Renueva Fisioterapia
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="hdboton">
                        <button class="navbar-toggler justify-content-end " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <?php
                    $comprobar = isset($_SESSION['rol']) AND isset($_SESSION['user']);
                    if ($comprobar == "True") {
                        switch ($_SESSION['rol']) {
                            case 1:
                                $Destino1 = "views/citas/agendarfecha.php";
                                $Destino2 = "views/citas/historial.php";
                                $Destino3 = "views/shop/shop.php";
                                $Destino4="views\shop\admin.php";
                                $boton = "ADMIN";
                                break;
                            case 2:
                                $Destino1 = "views/citas/agendarfecha.php";
                                $Destino2 = "views/citas/historial.php";
                                $Destino3 = "views/shop/shop.php";
                                $Destino4="views/citas/perfil.php";
                                $boton = "PERFIL";
                                break;
                            case 3:
                                $Destino1 = "views/citas/agendarfecha.php";
                                $Destino2 = "views/citas/historial.php";
                                $Destino3 = "views/shop/shop.php";
                                $Destino4="views/shop/admin.php";
                                $boton = "PANEL";
                                break;
                            default:
                        }
                        $sesion = "SALIR";
                        $iniciar = "php/loguout.php";
                    } else {
                        $Destino1 = "views/inicio/iniciar.php";
                        $Destino2 = "views/inicio/iniciar.php";
                        $Destino3 = "views/inicio/iniciar.php";
                        $sesion = "ENTRAR";
                        $iniciar = "views/inicio/iniciar.php";
                        $Destino4="#Contacto";
                        $boton = "CONTACTO";
                    }
                    ?>
                    <div class="collapse navbar-collapse menu justify-content-end head" id="navbarNavDropdown">
                        <ul class="navbar-nav lista">
                            <li class="nav-item">
                                <a class="active align-middle" aria-current="page" href="#">INICIO</a>
                            </li>
                            <li class="nav-item">
                                <a class="active align-middle " aria-current="page" href="#Servicios">SERVICIOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="active align-middle" aria-current="page" href="#productos">PRODUCTOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="active align-middle" aria-current="page" href="<?php echo $Destino4 ?>"><?php echo $boton ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="active align-middle" aria-current="page" href="<?php echo $iniciar ?>"><?php echo $sesion ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>