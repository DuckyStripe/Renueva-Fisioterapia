<?php
$nombre = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
try {
  $con = mysqli_connect("localhost",$nombre, $contrasena,"doble_capa");
} catch (\Exception $e) {
  echo "<br>Fallo la conexion con MySQL: " . $e . "<br>";
  header("Location: login.html");
}
?>
