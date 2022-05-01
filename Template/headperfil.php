<?php
require '../../php/conexion.php';
session_start();

$comprobar = isset($_SESSION['user']);
error_reporting(0);
if ($comprobar == "True") {
    $correo = strval($_SESSION['user']);
    $emailC = mysqli_query($connect, "SELECT * FROM usuarios WHERE correo = '$correo'");
    if (mysqli_num_rows($emailC) > 0) {
        while ($fila = mysqli_fetch_array($emailC)) {
            $nombres = $fila['nombre'] . " " . $fila['apellidos'];
            $nombre = $fila['nombre'];
            $Apellido = $fila['apellidos'];
            $Email = $fila['correo'];
            $telefono = $fila['telefono'];
            $id = $fila['iduser'];
            $Directorio = "../citas/perfil.php";
        }
    }
} else {
    $nombres = "INICIAR SESION";
    $Directorio = "../inicio/iniciar.php";
    echo '<script> alert("Debes de iniciar sesion primero."); window.location.href="../inicio/iniciar.php"; </script>';
}
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
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/perfil.css">

    <title>Renueva</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <header class="bg-header">
        <div class="container animate__animated animate__bounce" id="menu">
            <ul>
                <li>            
                    <a class="info animate__animated  animate__rubberBand navbar-brand logo"  href="../../index.php">
                    <img src="../../img/logo.png" alt="" width="100" height="60" class="d-inline-block">
                        Renueva Fisioterapia
                    </a>
                </li>
                <li class="info item-r animate__animated  animate__rubberBand">
                    <a class="navbar-brand logo"  href="../../php/loguout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3B6A71" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M7 12h14l-3 -3m0 6l3 -3" />
                        </svg>
                    </a>  
                </li>
                <li class="info item-r animate__animated  animate__rubberBand">
                    <a class="navbar-brand logo" href="../shop/carrito.php">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3B6A71" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="6" cy="19" r="2" />
                                <circle cx="17" cy="19" r="2" />
                                <path d="M17 17h-11v-14h-2" />
                                <path d="M6 5l14 1l-1 7h-13" />
                            </svg>
                    </a>

                </li >

                <li class="info item-nr">
                    <a class="navbar-brand " href="<?php echo  $Directorio ?>">        
                        <?php echo  $nombres ?>
                    </a>
                </li>
            </ul>
        </div>
    </header>