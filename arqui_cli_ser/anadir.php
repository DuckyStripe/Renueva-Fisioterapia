<?php
include("conexion.php");
$con = conectar();
if (mysqli_connect_errno()){
    echo "Fallo la conexion con MySQL: " . mysqli_connect_error();
}

$nom_prod = $_POST['nom_prod'];
$pes_prod = $_POST['pes_prod'];
$pec_prod = $_POST['pec_prod'];
$tip_prod = $_POST['tip_prod'];
$des_prod = $_POST['des_prod'];

$sql = "INSERT INTO `productos_cafe` (`IDProducto`, `NombreProducto`, `ContenidoNeto`, `PrecioProducto`, `TipoProducto`, `DescripcionProducto`) VALUES (NULL, '$nom_prod', '$pes_prod', '$pec_prod', '$tip_prod', '$des_prod')";
$query = mysqli_query($con, $sql);
if ($query) {
    header("Location: admin.php");
} else {
    echo "El id ya no es valido";
}

 ?>
