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
    <header class=" bg-header lhead container-fluid ">
        <div class="container animate__animated animate__bounce">
            <a class="navbar-brand" id="logo" href="../../index.php">
                <img src="../../img/logo.png" alt="" width="100" height="60" class="d-inline-block">
                Renueva Fisioterapia
        </div>
        <div class="animate__animated animate__bounce">
            <a class="navbar-brand" id="logo" href="<?php echo  $Directorio ?>">
                <h4 class="lefthead "><?php echo  $nombres ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3B6A71" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="9" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                    <a href="../shop/carrito.php">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3B6A71" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="6" cy="19" r="2" />
                            <circle cx="17" cy="19" r="2" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                    </a>
                </h4>
            </a>
        </div>
    </header>
    <div>
        <h2 class="animate__animated animate__fadeInUp">Perfil</h2>
        <h2 class="animate__animated animate__fadeInUp">Informacion Personal</h2>
    </div>
    <main class="container centr">
        <div class="row animate__animated animate__zoomIn">
            <div class="registro inciar">
                <div class="row">
                    <div class="col-md-6">
                        <H3 class="info">Nombre:<?php echo " " . $nombre ?></H3>
                    </div>
                    <div class="col-md-6">
                        <H3 class="info">Apellidos:<?php echo " " . $Apellido ?></H3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <H3 class="info">Correo:<?php echo " " . $Email ?></H3>
                    </div>
                    <div class="col-md-6">
                        <H3 class="info">Telefono:<?php echo " " . $telefono ?></H3>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="animate__animated animate__fadeInUp">Cambiar Contraseña:</h2>
        <div class="row centr animate__animated animate__zoomIn">
            <div class="registro inciar col-md-12 offset-md-1">
                <form action="../../php/registro.php" method="POST">
                    <div class="row espacio">
                        <div class="col-md-6">
                            <label for="password">Contraseña<br>
                                <input class="inp" type="password" name="password" placeholder="**********" required><br>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label for="passwordver">Verificar Contraseña<br>
                                <input class="inp" type="password" name="passwordver" placeholder="**********" required><br>
                            </label>
                        </div>
                    </div>
                    <div class="offset-md-4 espacio padi">
                        <input type="submit" class="btn btn-primary botonh" value="Cambiar Contraseña">
                    </div>
                </form>
            </div>
            <div class="row centr animate__animated animate__zoomIn">
                <h2 class="animate__animated animate__fadeInUp">Direccion de Facturación:</h2>
                <?php

                $query = "SELECT * FROM direccion WHERE iduser=$id";
                $consulta = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($consulta);
                $id_direccion = $row['id_direccion'];
                if ($id_direccion != NULL) {
                    $query = "SELECT a.calle,a.exterior,a.interior,b.estado,a.colonia,a.codigo_postal FROM direccion a INNER JOIN estados b ON a.id_estado = b.id_estado WHERE (a.id_direccion=$id_direccion)";
                    $consulta = mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($consulta);
                    $calle = $row['calle'];
                    $exterior = $row['exterior'];
                    $interior = $row['interior'];
                    $estado = $row['estado'];
                    $colonia = $row['colonia'];
                    $codigo = $row['codigo_postal'];
                ?>
                    <div class="registro inciar col-md-12 offset-md-1">
                        <div class="row espacio">
                            <div class="col-md-4">
                                <H3 class="info">Calle:<?php echo " " . $calle ?></H3>
                            </div>
                            <div class="col-md-4">
                                <H3 class="info">Exterior:<?php echo " " . $exterior ?></H3>
                            </div>
                            <div class="col-md-4">
                                <H3 class="info">Interior:<?php echo " " . $interior ?></H3>
                            </div>
                        </div>
                        <div class="row espacio">
                            <div class="col-md-4">
                                <H3 class="info">Estado:<?php echo " " . $estado ?></H3>
                            </div>
                            <div class="col-md-4">
                                <H3 class="info">Colonia:<?php echo " " . $colonia ?></H3>
                            </div>
                            <div class="col-md-4">
                                <H3 class="info">Codigo Postal:<?php echo " " . $codigo ?></H3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-md-4 espacio pad">
                                <a href="../citas/cambiardir.php" class="btn btn-primary botonh">Cambiar Dirección</a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="registro inciar col-md-12 offset-md-1">
                        <form action="../../php/direccion.php" method="POST">
                            <label for="id">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                            </label>
                            <label for="calle">Calle:<br>
                                <input class="inp " type="text" name="calle" placeholder="Calle mirasoles" required><br>
                            </label>
                            <label for="exterior">Exterior:<br>
                                <input class="inp" type="text" name="exterior" placeholder="65" required><br>
                            </label>
                            <label for="exterior">Interior:<br>
                                <input class="inp" type="text" name="interior" placeholder="12"><br>
                            </label>
                            <label for="estado">Estado:<br>
                                <select class="inp" name="estado">
                                    <option selected>Seleccione el estado</option>
                                    <?php
                                    $query = "SELECT id_estado, estado FROM estados";
                                    $consulta = mysqli_query($connect, $query);
                                    while ($row = mysqli_fetch_array($consulta)) {
                                    ?>
                                        <option value="<?php echo $row['id_estado'] ?>"><?php echo $row['estado'] ?></option>
                                    <?php }
                                    mysqli_free_result($consulta); ?>
                                </select>
                            </label><br>
                            <label for="colonia">Colonia:<br>
                                <input class="inp" type="text" name="colonia" placeholder="Cerro Gordo" required><br>
                            </label>
                            <label for="codigo_postal">Codigo Postal:<br>
                                <input class="inp" type="text" name="codigo_postal" placeholder="06254" required><br>
                            </label>
                            <div class="offset-md-4 espacio pad">
                                <input type="submit" class="btn btn-primary botonh" value="Guardar Dirección">
                            </div>
                        </form>
                    </div>
                <?php } ?>

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