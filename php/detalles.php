<?php
require 'conexion.php';
if (isset($_POST['estado']) AND isset($_POST['idventa'])) {
    $idventa=$_POST['idventa'];
    $estado = $_POST['estado'];
    $esta = "UPDATE pedido SET estado ='$estado' WHERE idventa=$idventa ";
    $Cestado = mysqli_query($connect, $esta);
    echo '<script> alert("Estado actualizado"); window.location.href="../views/shop/admin.php?action=pedidos"; </script>';
}else{
    echo '<script> alert("Fallo al actualizar); window.location.href="../views/shop/admin.php?action=pedidos"; </script>';
}

?>