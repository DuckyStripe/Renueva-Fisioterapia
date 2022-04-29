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
    <link rel="stylesheet" href="../../css/agendar.css">
    <title>Renueva</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <header class=" bg-header lhead container-fluid">
        <div class="container">
            <a class="navbar-brand" id="logo" href="../../index.php">
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
    <div class="container">
        <div class="col-md-5 offset-md-4">
            <div class="iniciar">
                <h2 class="animate__animated animate__fadeInUp">Historial de citas</h2>
            </div>
        </div>
    </div>
    <main class="container animate__animated animate__zoomIn">
        <div class="contenedor">
            <div class="">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Fecha:</th>
                                <th scope="col">Hora:</th>
                                <th scope="col">Nombre:</th>
                                <th scope="col" >Apellido:</th>
                                <th scope="col"colspan="2">Servicio:</th>
                                <th scope="col"colspan="2">Comentario:</th>
                                <th scope="col"colspan="1">Cancelar:</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                $query="SELECT a.id_citas,a.iduser,b.nombre,b.apellidos, a.fecha, a.idhora, c.hora , d.id_servicio ,d.servicio, a.comentario FROM citas a INNER JOIN usuarios b ON  a.iduser= b.iduser INNER JOIN hora c ON a.idhora= c.idhora INNER JOIN servicios d ON a.id_servicio = d.id_servicio WHERE (a.iduser= $id) ;";
                                
                                $consulta = mysqli_query($connect,$query);
                                while($row=mysqli_fetch_array($consulta)){
                            ?>
                            <tr>
                                <td colspan="1"><?php echo $row['fecha']?></td>
                                <td colspan="1"><?php echo $row['hora']?></td>
                                <td colspan="1"><?php echo $row['nombre']?></td>
                                <td colspan="1"><?php echo $row['apellidos']?></td>
                                <td colspan="2"><?php echo $row['servicio']?></td>
                                <td colspan="2"><?php echo $row['comentario']?></td>
                                <td colspan="2">
                                    <?php
                                        $fechaActual = date('Y-m-d');
                                        $link='../../php/eliminar.php?eliminar='. $row['id_citas'];
                                        $fecha1=explode("-",$fechaActual);
                                        $fecha2=explode("-",$row['fecha']);
                                        if($fecha2[0] >=$fecha1[0] AND $fecha2[1] >=$fecha1[1]AND $fecha2[0] >= $fecha1[0] ){
                                     ?>
                                        <a href="<?php echo $link?>" class="btn" onlick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <line x1="18" y1="6" x2="6" y2="18" />
                                            <line x1="6" y1="6" x2="18" y2="18" />
                                            </svg>
                                        </a>
                                    <?php
                                    } else{
                                     ?>
                                    <a href="#" class="btn" onlick="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-caret-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M18 15l-6 -6l-6 6h12" transform="rotate(270 12 12)" />
                                        </svg>
                                    </a>
                                    <?php
                                    }
                                     ?>
                                </td>
                                
                            </tr>

                        <?php } mysqli_free_result($consulta); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!--Footer -->
    <footer id="foots">
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