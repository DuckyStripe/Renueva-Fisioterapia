<?php
//query para encotnrar el pedido
$pedido = "SELECT * FROM tmp_pedido a INNER JOIN articulod b ON a.Ar_id=b.Ar_id WHERE id_user=$id";
$consulta2 = mysqli_query($connect, $pedido);
if(isset($_GET['eliminar'])){
    $id=$_GET['eliminar'];
    $eliminar = "DELETE FROM tmp_pedido WHERE id_tmp=$id";
    $eliminarCon = mysqli_query($connect, $eliminar);
    if($eliminarCon){
        echo '<script> alert("Eliminado correctamente"); window.location.href="../shop/shop.php?action=carrito"; </script>';
    }else{
        echo '<script> alert("Error al eliminar"); window.location.href="../shop/shop.php?action=carrito"; </script>';
    }
}
if(isset($_POST['id']) AND isset($_POST['cantidad']) AND isset($_POST['stock'])  AND isset($_POST['precio'])){
    $precio=$_POST['precio'];
    $stock=$_POST['stock'];
    $id_tmp=$_POST['id'];
    $cantidad=$_POST['cantidad'];
    $total=$cantidad*$precio;
    if($cantidad <= $stock){
        $actualizar = "UPDATE tmp_pedido SET cantidad=$cantidad,total_articulo=$total WHERE id_tmp=$id_tmp";
        $actualizarC = mysqli_query($connect, $actualizar);
        echo '<script>  window.location.href="../shop/shop.php?action=carrito"; </script>';
        }else{
            echo '<script> alert("Cantidad no disponible en stock"); window.location.href="../shop/shop.php?action=carrito"; </script>';
        }
}
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
                    <th scope="col">Total:</th>
                    <th scope="col">Eliminar:</th>
                </tr>
            </thead>

            <tbody>

                <?php
                while ($row = mysqli_fetch_array($consulta2)) {
                    if($row['cantidad']!=NULL){
                        $cantidad=$row['cantidad'];
                    }else{
                        $cantidad=1;
                        
                    }
                    $img = $row['img'];
                ?>
                    <tr>
                        <form action="../shop/shop.php?action=carrito" method="POST">
                            <input type="hidden" id="stock" name="stock" value="<?php echo $row['Ar_stock']?>" >
                            <input type="hidden" id="action" name="action" value="carrito" >
                            <input type="hidden" id="id" name="id" value="<?php echo $row['id_tmp'] ?>" >
                            <input type="hidden" id="precio" name="precio" value="<?php echo  $row['Ar_precioVenta'] ?>" >
                            <th colspan="1"><input type="number" class="car" min="1" id="cantidad" name="cantidad" value= "<?php echo $cantidad?>"  pattern="^[0-9]+" onchange="this.form.submit().location.reload()"></th>
                        </form>
                        <td><?php echo '<img height="100" width="100" src="data:image/jpeg;base64,' . base64_encode($img) . '"/>'; ?></td>
                        <td><?php echo $row['Ar_nombre'] ?></td>
                        <td><?php echo $row['Ar_descripcion'] ?></td>
                        <td><?php echo $row['Ar_precioVenta'] ?></td>
                        <td><?php echo "$".floatval($cantidad*$row['Ar_precioVenta']) ?></td>
                        <td> <?php
                                $link2 = "../shop/shop.php?action=carrito&eliminar=" . $row['id_tmp'];
                                ?>
                            <a href="<?php echo $link2 ?>" class="btn" onlick="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
                <a href="shop.php?action=checkout" class="btn btn-primary botonh mx-auto buton">
                    CHECKOUT
                </a>
    </div>