<?php
$buscar = $_POST["buscar"];
?>
<div class="contenedor">
    <div class="iniciar">
        <h2 class="animate__animated animate__fadeInUp">PERSONAL:</h2>
    </div>
    <div class="columnas">
        <div class="col1 animate__animated animate__zoomIn">
            <form action="admin.php?action=personal" method="post">
                <input class="inp animate__animated animate__zoomIn" type="search" name="buscar" placeholder="Nombre, Correo, apellido." required>
                <input class="btnn btn-primary botonhh" type="submit" value="Buscar">
                <a href="admin.php?action=registropersonal" class="btnn btn-primary botonhh">Nuevo</a>
            </form>
        </div>

    </div>
</div>
<main class="container animate__animated animate__zoomIn">
    <div class="contenedor">
        <div class="">
            <div class="tabla">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="th-10">ID:</th>
                            <th colspan="2">Rol:</th>
                            <th colspan="2">Nombre:</th>
                            <th colspan="2">Apellidos:</th>
                            <th colspan="1">Correo:</th>
                            <th colspan="1">Telefono:</th>
                            <th colspan="1">Editar:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT a.iduser,b.id_rol,a.id_rol,a.nombre,a.apellidos,a.correo,a.telefono, b.rol FROM rol b INNER JOIN usuarios a ON a.id_rol=b.id_rol WHERE( a.id_rol=1 OR a.id_rol=3)";
                        $consulta = mysqli_query($connect, $query);
                        if ($buscar == NULL) {
                            while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                                <tr>
                                    <td colspan="1"><?php $iduser = $row['iduser'];
                                                    echo $row['iduser']; ?></td>
                                    <td colspan="2"><?php echo $row['rol']; ?></td>
                                    <td colspan="2"><?php echo $row['nombre'] ?></td>
                                    <td colspan="2"><?php echo $row['apellidos'] ?></td>
                                    <td colspan="1"><?php echo $row['correo'] ?></td>
                                    <td colspan="1"><?php echo $row['telefono'] ?></td>
                                    <td colspan="1">
                                        <?php
                                        $link = "../shop/admin.php?action=editpersonal&id=" . $row['iduser'];
                                        $link2 = "../shop/admin.php?action=modal&eliminar=modal&eliminar=personal&id=" . $row['iduser'];
                                        ?>
                                        <a href="<?php echo $link ?>" class="btn" onlick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495371" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                        </a>
                                        <a href="<?php echo $link2 ?>" class="btn" >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </td>
                                <tr>
                                <?php
                            }
                            mysqli_free_result($consulta);
                            mysqli_free_result($consulta2);
                        } else {
                            $query3 = "SELECT a.iduser,b.id_rol,a.id_rol,a.nombre,a.apellidos,a.correo,a.telefono, b.rol FROM rol b INNER JOIN usuarios a ON a.id_rol=b.id_rol WHERE (apellidos= '$buscar' OR nombre='$buscar' OR correo = '$buscar') AND ( a.id_rol=1 OR a.id_rol=3);";
                            $consulta3 = mysqli_query($connect, $query3);
                            while ($row = mysqli_fetch_array($consulta3)) {
                                ?>
                                <tr>
                                    <td colspan="1"><?php $iduser = $row['iduser'];
                                                    echo $row['iduser']; ?></td>
                                    <td colspan="2"><?php echo $row['rol']; ?></td>
                                    <td colspan="2"><?php echo $row['nombre'] ?></td>
                                    <td colspan="2"><?php echo $row['apellidos'] ?></td>
                                    <td colspan="1"><?php echo $row['correo'] ?></td>
                                    <td colspan="1"><?php echo $row['telefono'] ?></td>
                                    <td colspan="1">
                                        <?php
                                        $link = "../shop/admin.php?action=editpersonal&id=" . $row['iduser'];
                                        ?>
                                        <a href="<?php echo $link ?>" class="btn" onlick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#495371" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                <line x1="16" y1="5" x2="19" y2="8" />
                                            </svg>
                                        </a>
                                        <a href="<?php echo $link2 ?>" class="btn" >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </td>
                                <tr>
                            <?php
                            }
                            mysqli_free_result($consulta3);
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>