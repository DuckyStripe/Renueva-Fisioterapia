<?php
$id = $_GET['id'];
$regreso = "clientes";
if (isset($_GET['disabled'])) {
    $cambiar = 1;
} else {
    $cambiar = 0;
}
if (isset($_GET['cambiardir'])) {
    $cambiardir = 1;
} else {
    $cambiardir = 0;
}
// error_reporting(0);

$query1 = "SELECT * FROM usuarios WHERE iduser=$id;";
$consulta1 = mysqli_query($connect, $query1);
$row1 = mysqli_fetch_array($consulta1);
$nombre = $row1['nombre'];
$correo = $row1['correo'];
$apellidos = $row1['apellidos'];
$telefono = $row1['telefono'];
$nombre = $row1['nombre'];
$rol = $row1['id_rol'];



$query2 = "SELECT * FROM direccion WHERE iduser=$id";
$consulta2 = mysqli_query($connect, $query2);
echo mysqli_num_rows($consulta2);
if (mysqli_num_rows($consulta2) == 0) {
    $cambiardir = 1;
    $link3 = "../../php/direccion.php";
} else {
    $link3 = "../../php/cambiardir.php";
    $row2 = mysqli_fetch_array($consulta2);
    $query2 = "SELECT * FROM direccion WHERE iduser=$id";
    $consulta2 = mysqli_query($connect, $query2);
    $row2 = mysqli_fetch_array($consulta2);


    $id_direccion = $row2['id_direccion'];
    $query3 = "SELECT a.calle,a.exterior,a.interior,b.estado,a.colonia,a.codigo_postal FROM direccion a INNER JOIN estados b ON a.id_estado = b.id_estado WHERE (a.id_direccion=$id_direccion)";
    $consulta3 = mysqli_query($connect, $query3);
    $row3 = mysqli_fetch_array($consulta3);
    $calle = $row3['calle'];
    $exterior = $row3['exterior'];
    $interior = $row3['interior'];
    $estado = $row3['estado'];
    $colonia = $row3['colonia'];
    $codigo = $row3['codigo_postal'];
}


?>

<h2 class="animate__animated animate__fadeInUp">Personal</h2>
<h2 class="animate__animated animate__fadeInUp">Editar Personal</h2>
<main class="contenedor centrar">

    <div class="animate__animated animate__zoomIn">
        <div class="columnas">
            <form action="../../php/editpersonalinfo.php" method="POST">
                <label for="id">
                    <input type="hidden" name="iduser" value="<?php echo $id ?>">
                    <input type="hidden" name="regreso" value="<?php echo $regreso ?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre ?>"><br>
                    <input type="hidden" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>"><br>
                </label>
                <?php
                $link = "../shop/admin.php?action=editpersonal&disabled=1&id=" . $id;
                if ($cambiar == 0) {
                ?>
                    <div class="col1_111">
                        <label for="name">Nombre:<br>
                            <input disabled class="ress" type="name" name="nombre" id="nombre" value="<?php echo $nombre ?>"><br>
                        </label>
                        <label for="email">Correo electrónico:<br>
                            <input disabled class="ress" type="email" name="correo" id="correo" value="<?php echo $correo ?>"><br>
                        </label>
                        <label for="rol">Rol:
                            <?php
                            $query = "SELECT * FROM rol WHERE id_rol=$rol";
                            $consulta = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_array($consulta)) {
                            ?>
                                <select disabled class="ress" name="rol" required>
                                    <option selected value="<?php echo $row['id_rol'] ?>"><?php echo $row['rol'] ?></option>
                                <?php }
                            mysqli_free_result($consulta); ?>
                                </select>
                        </label>
                    </div>
                    <div class="col1_111">
                        <label for="name">Apellidos:<br>
                            <input disabled class="ress" type="name" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>"><br>
                        </label>
                        <label for="numero">Numero de telefono:<br>
                            <input disabled class="ress" type="tel" name="telefono" id="telefono" value="<?php echo $telefono ?>" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}"><br>
                        </label>
                    </div>
                    <div class="columnas">
                        <div class="col5">
                            <a href="<?php echo $link ?>" class="btn btn-primary botonh" onlick="">
                                Modificar
                            </a>
                        </div>
                    <?php
                } else {
                    ?>
                        <div class="col1_111">
                            <label for="name">Nombre:<br>
                                <input disabled class="ress" type="nombre" name="nombre" value="<?php echo $nombre ?>"><br>
                            </label>
                            <label for="email">Correo electrónico:<br>
                                <input class="ress" type="email" name="email" placeholder="example@example.com"><br>
                            </label>
                            <label for="rol">Rol:
                                <select class="ress" name="rol">
                                    <option value="" selected>Seleccione un rol</option>
                                    <?php
                                    $query = "SELECT * FROM rol;";
                                    $consulta = mysqli_query($connect, $query);
                                    while ($row = mysqli_fetch_array($consulta)) {
                                    ?>
                                        <option value="<?php echo $row['id_rol'] ?>"><?php echo $row['rol'] ?></option>
                                    <?php }
                                    mysqli_free_result($consulta); ?>
                                </select>
                            </label>
                        </div>
                        <div class="col1_111">
                            <label for="name">Apellidos:<br>
                                <input disabled class="ress" type="name" name="apellidos" value="<?php echo $apellidos ?>"><br>
                            </label>
                            <label for="numero">Numero de telefono:<br>
                                <input class="ress" type="tel" name="ntelefono" placeholder="55-1234-1234" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}"><br>
                            </label>
                        </div>
                        <div class="columnas">
                            <div class="col5">
                                <input type="submit" class=" btn btn-primary botonh" value="Confirmar">
                            </div>
                        </div>
                    <?php
                }
                    ?>
            </form>
        </div>
        <h2 class="animate__animated animate__fadeInUp">Direccion de Facturación:</h2><br>
        <div class="columnas">
            <div class="col4">
                <?php
                $query = "SELECT * FROM direccion WHERE iduser=$id";
                $consulta = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($consulta);
                $id_direccion = $row['id_direccion'];
                ?>
                <form action="<?php echo $link3 ?>" method="POST">
                    <label for="id">
                        <input type="hidden" name="iduser" value="<?php echo $id ?>">
                        <input type="hidden" name="id_direccion" value="<?php echo $id_direccion ?>">
                        <input type="hidden" name="regreso" value="<?php echo $regreso ?>">
                    </label>
                    <?php
                    $link2 = "../shop/admin.php?action=editcliente&cambiardir=1&id=" . $id;
                    if ($cambiardir == 0) {
                    ?>

                        <div class="columnas">
                            <div class="col1_111">
                                <label for="calle">Calle:<br>
                                    <input disabled class="ress" type="text" name="calle" value="<?php echo $calle  ?>">
                                </label> <br>
                                <label for="exterior">Exterior:<br>
                                    <input disabled class="ress" type="text" name="exterior" value="<?php echo $exterior  ?>">
                                </label><br>
                                <label for="exterior">Interior:<br>
                                    <input disabled class="ress" type="text" name="interior" value="<?php echo $interior  ?>">
                                </label><br>
                            </div>
                            <div class="col1_111">
                                <label for="estado">Estado:<br>
                                    <select disabled class="ress" name="estado">
                                        <option selected value="1"><?php echo $estado ?></option>
                                    </select>
                                </label><br>
                                <label for="colonia">Colonia:<br>
                                    <input disabled class="ress" type="text" name="colonia" value="<?php echo $colonia  ?>">
                                </label><br>
                                <label for="codigo_postal">Codigo Postal:<br>
                                    <input disabled class="ress" type="text" name="codigo_postal" value="<?php echo $codigo  ?>">
                                </label><br>
                            </div>
                        </div>
                        <div class="columnas">
                            <div class="col5">
                                <a href="<?php echo $link2 ?>" class="btn btn-primary botonh" onlick="">
                                    Modificar
                                </a>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="columnas">
                            <div class="col1_111">
                                <label for="calle">Calle:<br>
                                    <input class="ress" type="text" name="calle" placeholder="Calle mirasoles" required>
                                </label> <br>
                                <label for="exterior">Exterior:<br>
                                    <input class="ress" type="text" name="exterior" placeholder="65" required>
                                </label><br>
                                <label for="exterior">Interior:<br>
                                    <input class="ress" type="text" name="interior" placeholder="12">
                                </label><br>
                            </div>
                            <div class="col1_111">
                                <label for="estado">Estado:<br>
                                    <select class="ress" name="estado">
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
                                    <input class="ress" type="text" name="colonia" placeholder="Cerro Gordo" required>
                                </label><br>
                                <label for="codigo_postal">Codigo Postal:<br>
                                    <input class="ress" type="text" name="codigo_postal" placeholder="06254" required>
                                </label><br>
                            </div>
                        </div>
                        <div class="columnas">
                            <div class="col5">
                                <input type="submit" class=" btn btn-primary botonh" value="Confirmar">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
            </div>

        </div>
    </div>
</main>