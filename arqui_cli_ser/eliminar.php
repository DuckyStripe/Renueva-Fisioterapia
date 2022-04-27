<?php
include("conexion.php");
$con = conectar();
if (mysqli_connect_errno()){
    echo "Fallo la conexion con MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];
$sql = "DELETE FROM productos_cafe WHERE IDProducto = $id";
$query = mysqli_query($con, $sql);
if ($query) {
    header("Location: admin.php");
} else {
    echo "El id ya no es valido";
}

?>
