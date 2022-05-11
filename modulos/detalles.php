<?php
$idventa = $_GET['id'];


if (isset($_POST['estado']) and isset($_POST['idventa'])) {
    $idventa = $_POST['idventa'];
    $estado = $_POST['estado'];
    $esta = "UPDATE pedido SET estado ='$estado' WHERE idventa=$idventa ";
    $Cestado = mysqli_query($connect, $esta);
    if($Cestado){
        echo '<script> alert("Actualizacion completada.); window.location.href="../views/shop/admin.php?action=detalles"; </script>';
    }else{
        echo '<script> alert("Fallo al actualizar); window.location.href="../views/shop/admin.php?action=detalles"; </script>';
    }
}
$query5 = "SELECT * FROM pedido a INNER JOIN usuarios b INNER JOIN pedido_articulo c WHERE a.iduser= b.iduser AND a.idventa = c.idventa AND a.idventa=$idventa;";
$consulta5 = mysqli_query($connect, $query5);
$row5 = mysqli_fetch_array($consulta);

$query1 = "SELECT * FROM usuarios WHERE iduser=$id;";
$consulta1 = mysqli_query($connect, $query1);
$row1 = mysqli_fetch_array($consulta1);
$nombre = $row1['nombre'];
$correo = $row1['correo'];
$apellidos = $row1['apellidos'];
$telefono = $row1['telefono'];
$nombre = $row1['nombre'];
//direccion
$query2 = "SELECT * FROM direccion WHERE iduser=$id";
$consulta2 = mysqli_query($connect, $query2);
if (mysqli_num_rows($consulta2) == 0) {
} else {
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
$sumatotal = "SELECT SUM(total_articulo) FROM pedido_articulo WHERE idventa=$idventa";
$sumatotalc = mysqli_query($connect, $sumatotal);
$fila = mysqli_fetch_array($sumatotalc);
$totalp = $fila[0];
$total = number_format($totalp, 2);
?>
<div class="contenedor">
    <div class="iniciar">
        <h2 class="animate__animated animate__fadeInUp">PEDIDOS:</h2>
        <h2 class="animate__animated animate__fadeInUp">Detalles Pedidos</h2>
    </div>
    <div class="columnas">
        <div class="col1 animate__animated animate__zoomIn">
            <form action="<?php echo "admin.php?action=detalles&id=?" . $idventa ?>" method="post">
                <input disabled class="inp " type="search" name="Total" value="<?php echo "TOTAL:$" . $total  ?>">
                <input class="inp " type="hidden" name="idventa" value="<?php echo $idventa  ?>">
                <?php
                $query = "SELECT estado FROM pedido";
                $consulta = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($consulta);
                $estado = $row['estado'];
                mysqli_free_result($consulta);
                ?>
                <select class="inp" name="estado" required>
                    <option selected value="<?php echo $estado ?>"><?php echo $estado ?></option>
                    <option value="En Espera">En Espera</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="Enviado">Enviado</option>
                    <option value="Recibido">Recibido</option>
                </select>
                <input class="btnn btn-primary botonhh" type="submit" value="Actualizar">
            </form>
        </div>
    </div>
</div>

<main class="contenedor centrar">

    <div class="animate__animated animate__zoomIn">
        <div class="columnas">
            <div class="tabla">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="1">Cantidad:</th>
                            <th colspan="1">Img:</th>
                            <th colspan="1">Nombre:</th>
                            <th colspan="1">Descripcion:</th>
                            <th colspan="1">Categoria:</th>
                            <th colspan="1">Precio:</th>
                            <th colspan="1">Total:</th>
                            <th colspan="1">Fecha:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT a.iduser,a.idventa,a.fecha,a.total,a.estado,c.cantidad,c.total_articulo,d.img,d.Ar_descripcion,d.Ar_precioVenta,d.Ar_nombre,e.nombre_cat,c.pd_id FROM pedido a INNER JOIN usuarios b ON a.iduser= b.iduser INNER JOIN pedido_articulo c ON a.idventa = c.idventa INNER JOIN articulod d ON c.Ar_id=d.Ar_id INNER JOIN categoria e ON d.id_categoria = e.id_categoria WHERE a.idventa=$idventa;";
                        $consulta = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($consulta)) {
                            $idpd = $row['pd_id'];
                            $totalpd = $row['cantidad'] * $row['Ar_precioVenta'];
                            $querys = "UPDATE pedido_articulo SET total_articulo =$totalpd WHERE pd_id=$idpd";
                            $consultas = mysqli_query($connect, $querys);
                        ?>
                            <tr>
                                <td colspan="1"><?php echo $row['cantidad'] ?></td>
                                <td colspan="1"><?php echo '<img height="100" width="100" src="data:image/jpeg;base64,' . base64_encode($row['img']) . '"/>'; ?></td>
                                <td colspan="1"><?php echo $row['Ar_nombre'] ?></td>
                                <td colspan="1"><?php echo $row['Ar_descripcion'] ?></td>
                                <td colspan="1"><?php echo $row['nombre_cat'] ?></td>
                                <td colspan="1"><?php echo $row['Ar_precioVenta'] ?></td>
                                <td colspan="1"><?php echo "$" . number_format($totalpd, 2) ?></td>
                                <td colspan="1"><?php echo $row['fecha'] ?></td>
                            </tr>
                        <?php

                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <form action="#" method="POST">
                <h2 class="animate__animated animate__fadeInUp">Usuario:</h2>
                <label for="id">
                    <input type="hidden" name="iduser" value="<?php echo $id ?>">
                    <input type="hidden" name="regreso" value="<?php echo $regreso ?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre ?>"><br>
                    <input type="hidden" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>"><br>
                </label>
                <div class="col1_111">
                    <label for="name">Nombre:<br>
                        <input disabled class="ress" type="name" name="nombre" id="nombre" value="<?php echo $nombre ?>"><br>
                    </label>
                    <label for="email">Correo electrónico:<br>
                        <input disabled class="ress" type="email" name="correo" id="correo" value="<?php echo $correo ?>"><br>
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
                </form>
            </div>
        </div>
    </div>
    <?php mysqli_free_result($consulta);
    mysqli_free_result($consultas); ?>
</main>