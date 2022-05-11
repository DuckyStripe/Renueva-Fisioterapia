<?php
//query para encotnrar el pedido
$pedido = "SELECT * FROM tmp_pedido a INNER JOIN articulod b ON a.Ar_id=b.Ar_id WHERE id_user=$id";
$consulta2 = mysqli_query($connect, $pedido);
?>

<div class="container">
    <H2>Carrito</H2>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="1">Cantidad:</th>
                    <th scope="col">Imagen:</th>
                    <th scope="col">Nombre:</th>
                    <th scope="col">Descripcion:</th>
                    <th scope="col">Precio:</th>
                    <th scope="col">Total articulo:</th>
                </tr>
            </thead>

            <tbody>

                <?php
                while ($row = mysqli_fetch_array($consulta2)) {
                    if ($row['cantidad'] != NULL) {
                        $cantidad = $row['cantidad'];
                    } else {
                        $cantidad = 1;
                    }
                    $img = $row['img'];
                ?>
                    <tr>
                        <th colspan="1"><?php echo $cantidad ?></th>
                        <td><?php echo '<img height="100" width="100" src="data:image/jpeg;base64,' . base64_encode($img) . '"/>'; ?></td>
                        <td><?php echo $row['Ar_nombre'] ?></td>
                        <td><?php echo $row['Ar_descripcion'] ?></td>
                        <td><?php echo $row['Ar_precioVenta'] ?></td>
                        <td><?php echo "$".floatval($row['total_articulo']) ?></td>
                    </tr>
                <?php
                }
                $total = "SELECT SUM(total_articulo) FROM tmp_pedido a INNER JOIN articulod b ON a.Ar_id=b.Ar_id WHERE id_user=$id";
                $totalConsulta = mysqli_query($connect, $total);
                $row1= mysqli_fetch_array($totalConsulta);
                ?>
            </tbody>

        </table>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><h4>Total: $<?php echo $row1[0]?></h4></th>
                </tr>
            </thead>
        </table>
        <a href="shop.php?action=pagar" class="btn btn-primary botonh mx-auto buton">
            Pagar
        </a>
    </div>