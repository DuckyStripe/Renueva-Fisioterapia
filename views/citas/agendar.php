<?php
session_start();
require '../../php/conexion.php';
$fecha=$_POST['fecha'];
echo $fecha;
$correo = strval($_SESSION['user']);
$comprobar = isset($_SESSION['user']);
if ($comprobar == "True") {
    $emailC = mysqli_query($connect, "SELECT * FROM usuarios WHERE correo = '$correo'");
    if (mysqli_num_rows($emailC) > 0) {
        while ($fila = mysqli_fetch_array($emailC)) {
            $nombres = $fila['nombre'] . " " . $fila['apellidos'];
            $id = $fila['iduser'];
            $Directorio = "../citas/perfil.php";
        }
    }
} else {
    $nombres = "INICIAR SESION";
    $Directorio = "../inicio/iniciar.php";
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
    <link rel="stylesheet" href="../../css/agendar.css">
    <title>Renueva</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
        <div class="iniciar">
            <h2>Agendar Cita</h2>
            <div class="Agendar">

                <form action="../../php/agendar.php" method="POST">
                    <label for="fecha">
                            <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                    </label>
                    <label for="name">Hora:<br>
                        <select class="inp" name="horario">
                            <option selected>Seleccione la hora</option>
                            <?php 
                                $query="SELECT idhora, hora FROM hora WHERE idhora NOT IN (SELECT a.idhora from hora a inner JOIN citas b ON a.idhora = b.idhora WHERE b.fecha = '$fecha');";
                                $consulta = mysqli_query($connect,$query);
                                while($row=mysqli_fetch_array($consulta)){
                            ?>
                            <option value="<?php echo $row['idhora']?>"><?php echo $row['hora']?></option>
                            <?php } mysqli_free_result($consulta); ?>
                        </select>
                    </label><br>
                    <label for="name">Servicio:<br>
                        <select class="inp" name="servicio">
                            <option selected>Seleccione el servicio:</option>
                            <?php 
                                $query="SELECT id_servicio, servicio FROM servicios";
                                $consulta = mysqli_query($connect,$query);
                                while($row=mysqli_fetch_array($consulta)){
                            ?>
                            <option value="<?php echo $row['id_servicio']?>"><?php echo $row['servicio']?></option>
                            <?php } mysqli_free_result($consulta); ?>
                        </select>
                    </label><br>
                    </label>
                    <label for="text">Comentarios:<br>
                        <textarea class="comment" type="text" name="comentario"></textarea><br>
                    </label><br>
                    <div class="col-md-2 offset-md-4">
                        <input type="submit" class="btn btn-primary botonh" value="Agendar Cita">
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
                    <a href="https://trascendersoft1.000webhostapp.com/">
                        <p class="text-center"> Copyright ©Aviso Terminos y Condiciones</p>
                    </a>
                </div>
                <div class="col foot">
                    <a href="https://trascendersoft1.000webhostapp.com/">
                        <p>Desarrollador TrascenderSoft</p>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!--Bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>