<?php
require 'conexion.php';
$id=$_POST['id'];
//Preguntar si s considerable hacer esto
$query1="SET FOREIGN_KEY_CHECKS = 0;";
$query = "DELETE FROM articulod WHERE Ar_id=$id";
$consulta1 = mysqli_query($connect, $query1);
$consulta = mysqli_query($connect, $query);

if($consulta){
    echo '<script> alert("Eliminación exitosa"); window.location.href="../views/shop/admin.php?action=productos"; </script>';
}else{
    echo '<script> alert("Fallo en la eliminación."); window.location.href="../views/shop/admin.php?action=productos"; </script>';
}

?>