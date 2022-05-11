<?php
$buscar = $_POST["buscar"];
$ventas = "SELECT * FROM pedido;";
$consultatotal = mysqli_query($connect, $ventas);

while ($row0 = mysqli_fetch_array($consultatotal)) {
    $idvt= intval($row0['idventa']);
    $totalq = "SELECT SUM(total_articulo) FROM pedido_articulo WHERE idventa=$idvt;";
    $consultaf = mysqli_query($connect, $totalq);
    $fila=mysqli_fetch_array($consultaf);
    $resultadototal=$fila[0];
    mysqli_free_result($consultaf);
    $queryupdate = "UPDATE pedido set total=$resultadototal WHERE idventa=$idvt";
    $consulta = mysqli_query($connect, $queryupdate);
    
}

?>
<div class="contenedor">
    <div class="iniciar">
        <h2 class="animate__animated animate__fadeInUp">HISTORIAL DE PEDIDOS:</h2>
    </div>
    <div class="columnas">
        <form action="admin.php?action=pedidos" method="post">
            <div class="col1 animate__animated animate__zoomIn">
                <input class="inp animate__animated animate__zoomIn" type="search" name="buscar" placeholder="Nombre, Correo, apellido." required>
                <input class="btnn btn-primary botonhh" type="submit" value="Buscar">
            </div>
        </form>
    </div>
</div>
<main class="container animate__animated animate__zoomIn">
    <div class="contenedor">
        <div class="">
            <div class="tabla">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="1">ID Venta:</th>
                            <th colspan="1">Nombre:</th>
                            <th colspan="1">Apellidos:</th>
                            <th colspan="1">Correo:</th>
                            <th colspan="1">Telefono:</th>
                            <th colspan="1">Total:</th>
                            <th colspan="1">Fecha:</th>
                            <th colspan="1">Estado:</th>
                            <th colspan="1">Detalles:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT a.idventa,b.nombre, b.apellidos,b.correo,b.telefono,a.total,a.fecha,a.estado FROM pedido a INNER JOIN usuarios b WHERE a.iduser= b.iduser;";
                        $consulta = mysqli_query($connect, $query);
                        if ($buscar == NULL or $buscar == "") {
                            while ($row = mysqli_fetch_array($consulta)) {
                        ?>
                                <tr>
                                    <td colspan="1"><?php echo $row['idventa'] ?></td>
                                    <td colspan="1"><?php echo $row['nombre'] ?></td>
                                    <td colspan="1"><?php echo $row['apellidos'] ?></td>
                                    <td colspan="1"><?php echo $row['correo'] ?></td>
                                    <td colspan="1"><?php echo $row['telefono'] ?></td>
                                    <td colspan="1"><?php echo $row['total'] ?></td>
                                    <td colspan="1"><?php echo $row['fecha'] ?></td>
                                    <td colspan="1"><?php echo $row['estado'] ?></td>
                                    <td colspan="1">
                                        <?php
                                        $link = "../shop/admin.php?action=detalles&id=" . $row['idventa'];
                                        ?>
                                        <a href="<?php echo $link ?>" class="btn" onlick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-caret-left" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M18 15l-6 -6l-6 6h12" transform="rotate(270 12 12)" />
                                            </svg>
                                        </a>
                                        <tr>
                                    <?php

                                }
                                mysqli_free_result($consulta);
                            } else {
                                $query = "SELECT a.idventa,b.nombre, b.apellidos,b.correo,b.telefono,a.total,a.fecha,a.estado FROM pedido a INNER JOIN usuarios b WHERE a.iduser= b.iduser AND b.apellidos= '$buscar' OR b.nombre='$buscar' OR b.correo = '$buscar';";
                                $consulta = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_array($consulta)) {
                                    ?>
      <tr>
                                    <td colspan="1"><?php echo $row['idventa'] ?></td>
                                    <td colspan="1"><?php echo $row['nombre'] ?></td>
                                    <td colspan="1"><?php echo $row['apellidos'] ?></td>
                                    <td colspan="1"><?php echo $row['correo'] ?></td>
                                    <td colspan="1"><?php echo $row['telefono'] ?></td>
                                    <td colspan="1"><?php echo $row['total'] ?></td>
                                    <td colspan="1"><?php echo $row['fecha'] ?></td>
                                    <td colspan="1"><?php echo $row['estado'] ?></td>
                                    <td colspan="1">
                                        <?php
                                        $link = "../shop/admin.php?action=detalles&id=" . $row['idventa'];
                                        ?>
                                        <a href="<?php echo $link ?>" class="btn" onlick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-caret-left" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M18 15l-6 -6l-6 6h12" transform="rotate(270 12 12)" />
                                            </svg>
                                        </a>
                                        <tr>
                        <?php
                                }
                            }
                            mysqli_free_result($consulta);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>