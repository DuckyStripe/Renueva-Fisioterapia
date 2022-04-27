<?php
session_start();
require '../../php/conexion.php';
$correo = strval($_SESSION['user']);
$comprobar = isset($_SESSION['user']);
if ($comprobar == "True") {
    $emailC = mysqli_query($connect, "SELECT * FROM usuarios WHERE correo = '$correo'");
    if (mysqli_num_rows($emailC) > 0) {
        while ($fila = mysqli_fetch_array($emailC)) {
            $nombres = $fila['nombre'] . " " . $fila['apellidos'];
            $Directorio = "../citas/perfil.php";
        }
    }
} else {
    $nombres = "INICIAR SESION";
    $Directorio = "../inicio/iniciar.php";
}
$fecha="";
$directorio ="";
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
    <link rel="stylesheet" href="../../css/recuperar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Renueva</title>
</head>
<body>
<header class=" bg-header lhead container-fluid">
        <div class="container">
            <a class="navbar-brand" id="logo" href="<?php echo  $Directorio ?>">
                <img src="../../img/logo.png" alt="" width="100" height="60" class="d-inline-block">
                Renueva Fisioterapia
        </div>
        <div>
            <a class="navbar-brand" id="logo" href="<?php echo  $Directorio ?>">
                <h4 class="lefthead "><?php echo  $nombres ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3B6A71" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="9" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                </h4>
            </a>
        </div>
    </header>
    <main class="contenedor">
        <div class="contenido">
            <h2>Agendar Cita</h2>
            <div class="iniciar">
                <form action="agendar.php" method="POST">
                    <div class="formulario align-middle">
                        <label  for="fecha">Fecha:<br>
                            <input class="inp" type="date" name="fecha" require><br>
                        </label>
                    </div>
                    <div class="col-md-2 offset-md-5">
                        <input type="submit" class="btn btn-primary botonh"value="Verificar Disponibilidad">
                    </div>
                </form>

            </div>
        </div>
    </main>
    <!--Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col footd">
                    <a href="https://trascendersoft1.000webhostapp.com/" class="text-centerd">
                        <p class="text-centerd"> Copyright ©Aviso Terminos y Condiciones</p>
                    </a>
                </div>
                <div class="col foot">
                    <a href="https://trascendersoft1.000webhostapp.com/">
                        <p class="text-centeri">Desarrollador TrascenderSoft</p>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!--Bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>